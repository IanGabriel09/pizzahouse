<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Mail\OrderConfirmationMail;
use App\Mail\OrderNotifAdminMail;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function order(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'contact' => 'required|string|max:15',
            'pizza_type' => 'required|string|max:255',
            'pizza_size' => 'required|string|max:255',
            'crust_type' => 'required|string|max:255',
            'toppings' => 'nullable|array',  
            'total_price' => 'required|numeric|min:0',
        ]);
    
        $token = $this->generateToken();
    
        $validated['order_confirmation'] = $token;
    
        if (isset($validated['toppings']) && is_array($validated['toppings'])) {
            $validated['toppings'] = json_encode($validated['toppings']);
        }
    
        try {
            // Create Order
            $order = Order::create($validated);
    
            // Check if the order is created successfully and has an ID
            if (!$order || !$order->id) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Order could not be created. Please try again later.'
                ]);
            }
    
            // Send confirmation email with the confirmation link
            Mail::to($validated['email'])->send(new OrderConfirmationMail($token));
    
            // Return success response with message
            return response()->json([
                'status' => 'success',
                'message' => 'Your order was placed successfully, please confirm your order in your email to proceed.'
            ]);
        } catch (\Exception $e) {
            // Log the error message for debugging
            \Log::error("Order Creation Error: " . $e->getMessage());
    
            // Return error response
            return response()->json([
                'status' => 'error',
                'message' => 'There was an internal server error. Please try again.'
            ]);
        }
    }

    public function confirmOrder($token)
    {
        try {
            $order = Order::where('order_confirmation', $token)->first();

            if (!$order) {
                return redirect()->route('order.error')->with('message', 'A problem occured while verifying your order. Please try again');
            }

            $order->order_confirmation = 'confirmed';
            $order->save();

            // Send order data to admin
            Mail::to('akalikayn0900@gmail.com')->send(new OrderNotifAdminMail($order));

            return redirect()->route('order.success')->with('message', 'Your order has been successfully confirmed.');
        } catch (\Exception $e) {
            // Log the error message for debugging
            \Log::error("Order Confirmation Error: " . $e->getMessage());
            
            return redirect()->route('order.error')->with('message', 'Internal server error. Please try again at a later time.');
        }
    }
    
    

    // Private Functions below
    private function generateToken()
    {
        $randomString = str()->random(6);

        return 'TKID-' . $randomString;
    }
}
