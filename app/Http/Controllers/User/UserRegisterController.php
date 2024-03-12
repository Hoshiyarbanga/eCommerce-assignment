<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserRegisterController extends Controller
{
    public function register()
    {
        return view('user.registration');
    }
    public function store(Request $request)
    {
        $user = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        User::Create($user);
        return redirect()->route('user-login');
    }
}
