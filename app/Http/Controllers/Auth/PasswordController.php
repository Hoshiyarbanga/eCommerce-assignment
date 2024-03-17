<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    public function index(){
        $user = User::where('id',Auth::user()->id)->first();
        return view('admin.auth.change-password')->with(compact('user'));
    }

    public function update(Request $request , $id){
        $user = User::where('id',$id)->first();
        if (!Hash::check($request->oldPassword, $user->password)) {
            return redirect()->back()->with(['failed' => 'The old password is incorrect.']);
        }
        $user->update([
            'password'=>$request->newPassword,
        ]);
        return redirect()->back()->with('success','Password change Successflly');
    }
}
