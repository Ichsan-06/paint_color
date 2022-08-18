<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    // Login
    public function login(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|string',
            'password' => 'required|string'
        ]);

        if (auth()->attempt(['username' => $request->input('username'), 'password' => $request->input('password')])) {
            return redirect()->route('home');
        }

        return redirect()->back()->withErrors('error', 'Invalid credentials');
    }

    // Logout
    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }
}
