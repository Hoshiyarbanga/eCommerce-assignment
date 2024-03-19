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
            $user = Auth::user();
            if($user->status === 'inactive'){
                Auth::logout();
                return redirect()->back()->with('Error', 'Your accound is not verified yet please check mail and verify first');
            }else if($user->status === 'block'){
                Auth::logout();
                return redirect()->back()->with('Error', 'Your accound is blocked pls contact admin');
            }
            return redirect()->intended( $request->URL );
        }
        return redirect()->back()->with('Error', 'Email/Password is incorrect');
        
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('user-login');
    }
}
