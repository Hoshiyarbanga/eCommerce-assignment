<?php

namespace App\Http\Controllers;

use App\Mail\ForgetPasswordEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ForgetPasswordController extends Controller
{
    public function index(){
        return view('forgot-password');
    }

    public function verify_user(Request $request){
        $user = User::where('email', $request->email)->first();
        if(!$user){
         return redirect()->back()->with('error' , 'User not exist');
        }
        $token = Str::random(40);
        DB::table('password_reset_tokens')->insert([
         'email'=>$request->email,
         'token'=> $token,
         'created_at'=> now(),
        ]);
        $formData = [
         'token'=>$token,
         'user'=> $user,
        ];
        Mail::to($request->email)->send(new ForgetPasswordEmail($formData));
        return redirect()->back()->with('success', ' Gmail sent Sucessfully');
    }

    public function reset_password($token){
        $token = DB::table('password_reset_tokens')->where('token', $token)->first();
        if (!$token) {
            return abort(498);
        }
        $tokenString = $token->token;
        $escapedToken = htmlspecialchars($tokenString);
       return view('reset-password')->with(compact('escapedToken'));
    }

    public function update_password(Request $request){
        $token = DB::table('password_reset_tokens')->where('token', $request->token)->first();
        $email= $token->email;
        $user= User::where('email',$email)->first();
        $user->update([
            'password'=>$request->password,
        ]);
        $token = DB::table('password_reset_tokens')->where('token', $request->token)->delete();
        return redirect()->route('user-login');
    }
}
