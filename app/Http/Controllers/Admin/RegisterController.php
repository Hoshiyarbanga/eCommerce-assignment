<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\UserVerificationEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Carbon\Carbon;

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
        $user['remember_token'] = Str::random(40);
        $users = User::create($user);
        $users->roles()->attach('2');
        Mail::to($request->email)->send(new UserVerificationEmail($users));
        return redirect()->route('admin-login');
    }
    public function verifyUser($token){
        $user = User::where('remember_token',$token)->first();
        if(!$user){
            abort(419);
        }
        $user->update([
         'status'=>'active',
         'email_verified_at'=> Carbon::now(),
         'remember_token'=>null,
        ]);
    }
}
