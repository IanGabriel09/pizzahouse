<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash; // For hashing passwords
use Illuminate\Support\Facades\Log; // Import Log facade


class AuthController extends Controller
{
    public function login(Request $request) 
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $user = User::where('email', $validated['email'])->first();

        if ($user && Hash::check($validated['password'], $user->password)) {
            $request->session()->put('loginEmail', $user->email);

            Log::info('User logged in successfully.', [
                'emailInput' => $validated['email'],
                'registeredEmail' => $user->email
            ]);


            return redirect()->route('dashboard');
        } else {
            Log::warning('Invalid login attempt.', [
                'emailInput' => $validated['email'],
                'timestamp' => now()
            ]);

            return back()->withErrors(['message' => 'Invalid email or password!']);
        }
    }

    public function logout(Request $request)
    {
        // Remove the session 'loginEmail'
        $request->session()->forget('loginEmail');

        return redirect()->route('login');
    }
}
