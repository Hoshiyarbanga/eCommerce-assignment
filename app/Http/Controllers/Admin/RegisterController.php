<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register()
    {
        return view('admin.register');
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
        return redirect()->route('admin-login');
    }
}
