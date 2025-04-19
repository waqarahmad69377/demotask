<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function login(Request $request)
    {
        // Handle login logic
        return view('auth.login');
    }
    public function register(Request $request)
    {
        // Handle registration logic
        return view('auth.register');
    }

    public function storeUser(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|string|min:8',
        ]);

        // Create a new user instance
        $user = new User();
        $full_name = $request->input('first_name') . ' ' . $request->input('last_name');
        $user->name = $full_name;
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();
        // Optionally, you can log the user in after registration
        // Auth::login($user);
        // Redirect to a desired location after registration
        return redirect()->route('login')->with('success', 'Registration successful. Please log in.');
    }


    public function loginAttempt(Request $request)
    {
        // Handle login attempt logic
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // Check if the user exists and the password is correct
        $user = User::where('email', $request->input('email'))->first();

        if ($user && Hash::check($request->input('password'), $user->password)) {
            $remember_me = $request->input('remember_me', false);
            // remember value is 1 or 0 in string
            // Convert to boolean

            if ($remember_me == '1' || $remember_me == 'true') {
                $remember_me = true;
            } else {
                $remember_me = false;
            }
            Auth::attempt([
                'email' => $request->input('email'),
                'password' => $request->input('password'),
            ], $remember_me);

            return redirect()->route('dashboard')->with('success', 'Login successful.');
        }

        return redirect()->back()->withErrors(['email' => 'Invalid credentials.']);
    }
    public function logout(Request $request)
    {
        // Handle logout logic
        Auth::logout();
        return redirect()->route('login')->with('success', 'Logged out successfully.');
    }
}
