<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function profile(){
        $user = User::where('id',Auth::user()->id)->first();
        return view('admin.auth.profile')->with(compact('user'));
    }
    public function update(Request $request, $id){
        $user = User::where('id',$id)->first();
        $user->update([
            'name'=>$request->name,
            'phone'=>$request->phone,
            'email'=>$request->email,
        ]);
        return redirect()->back();
    }
}
