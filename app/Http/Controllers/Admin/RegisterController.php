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
            SendMail::dispatch($users)->delay(now()->addMinutes(1));
            CheckRememberToken::dispatch($users)->delay(now()->addMinutes(59));
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
                abort(419);
            }
            $user->update([
                'status' => 'active',
                'email_verified_at' => Carbon::now(),
                'remember_token' => null,
            ]);
        } catch (Exception $e) {
            return abort(401);
        }
    }
}
