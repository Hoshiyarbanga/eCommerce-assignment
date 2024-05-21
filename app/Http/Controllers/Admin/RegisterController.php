<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\UserVerificationEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Jobs\Ab;
use App\Jobs\CheckRememberToken;
use App\Jobs\ProcessPodcast;
use App\Jobs\SendMail;
use Exception;

class RegisterController extends Controller
{
    public function register()
    {
            return view('admin.register');
    }

    public function store(Request $request)
    {
        try {
            $user = $request->validate([
                'name' => 'required',
                'phone' => 'required',
                'email' => 'required',
                'password' => 'required',
            ]);     
            $user['remember_token'] = Str::random(40);
            $users = User::create($user);
            $users->roles()->attach('2');
            SendMail::dispatch($users)->delay(now()->addSeconds(5));
            CheckRememberToken::dispatch($users)->delay(now()->addMinutes(2));
            return redirect()->route('admin-login');
        } catch (Exception $e) {
            return abort(401);
        }
    }
    public function verifyUser($token)
    {
        try {
            $user = User::where('remember_token', $token)->first();
            if (!$user) {
                return view('auth.regenerateToken');
            }
            $user->update([
                'status' => 'active',
                'email_verified_at' => Carbon::now(),
                'remember_token' => null,
            ]);
            return redirect()->route('admin-login')->with('success','Account verified Please login');
        } catch (Exception $e) {
            return abort(401);
        }
    }

    public function regenrateVerificationLink(Request $request){
           try{
            $users = User::where('email', $request->email)->first();    
            $users->update([
                'remember_token' =>  $user['remember_token'] = Str::random(40),
            ]);
            SendMail::dispatch($users)->delay(now()->addSeconds(5));
            return redirect()->back()->with('success','Link sent Successfully chek Email Again');
        }catch(Exception $e){
            abort(402);
        }
    } 
}
