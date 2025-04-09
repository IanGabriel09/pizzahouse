<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\DeliveryDriver;
use App\Mail\OrderCompleteMail;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public function fetchOrders() {
        $orders = Order::where('order_confirmation', 'confirmed')->get();
    
        return view('_admin.dashboard', compact('orders'));
    }
    
    public function fetchSpecificOrder($id) {
        $order = Order::findOrFail($id);
        $drivers = DeliveryDriver::all();  // Fetch all drivers
    
        // Pass both the order and the drivers to the view
        return view('_admin.show_order', compact('order', 'drivers'));
    }

    public function completeOrder(Request $request, $id)
    {
        // Validate the request data (driver_id)
        $request->validate([
            'driver_id' => 'required',  
        ]);

        $order = Order::findOrFail($id);
        $driver = DeliveryDriver::findOrFail($request->input('driver_id'));

        // Update the delivery_driver field
        $order->delivery_driver = $driver->name;
        $order->order_confirmation = 'completed';  // Optional: mark the order as completed
        $order->save();

        Mail::to($order->email)->send(new OrderCompleteMail($order));

        // Redirect back with a success message
        return redirect()->route('dashboard')->with('success', 'Delivery driver assigned and order completed successfully!');

    }
    
}
