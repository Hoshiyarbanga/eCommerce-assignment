<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    
    public function verify(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credendials = $request->only('email', 'password');
        if (Auth::attempt($credendials)){
            $user = Auth::user();
            if($user->status === 'inactive'){
                Auth::logout();
                return redirect()->back()->with('Error', 'Your accound is not verified yet please check mail and verify first');
            }else if($user->status === 'block'){
                Auth::logout();
                return redirect()->back()->with('Error', 'Your accound is blocked pls contact admin');
            }
            if ($user->hasRole('admin', 'vander')) {
                return redirect()->route('view-dashboard');
            } else {
                Auth::logout();
                return redirect()->back()->with('Error', 'You are not able to access to Login Here');
            }
        } else {
            return redirect()->back()->with('Error', 'Email/Password is incorrect');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin-login');
    } 
}
