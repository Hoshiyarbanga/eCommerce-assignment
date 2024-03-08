<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

class UserLoginController extends Controller
{
    public function login()
    {
        return view('user.login');
    }

    public function verify(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credendials = $request->only('email', 'password');
        if (Auth::attempt($credendials)) {
            return redirect()->intended( $request->URL );
        } else {
            return redirect()->back()->with('Error', 'Email/Password is incorrect');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('user-login');
    }
}
