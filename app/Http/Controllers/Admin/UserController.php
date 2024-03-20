<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $users = User::get();
        return view('admin.pages.users.index')->with(compact('users'));
    }

    public function create()
    {
        $roles = Role::get();
        return view('admin.pages.users.create')->with(compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        $user = User::create(['name' => $request->name, 'phone' => $request->phone, 'email' => $request->email, 'password' => $request->password]);
        $roles = $request->input('role');
        if (!empty($roles)) {
            $user->roles()->attach($roles);
        }
        return redirect()->back()->with('Success',  __('messages.flash.create', ['var' => 'User' ]));
    }

    public function edit($id)
    {
        $user = User::where('id', $id)->first();
        $roles = Role::get();
        $user_role = $user->roles;
        return view('admin.pages.users.edit')->with(compact('user', 'roles', 'user_role'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'status' => 'required',
        ]);
        $user = User::where('id', $id)->first();
        $roles = Role::get();
        foreach ($user as $a) {
            DB::table('user_role')->where('user_id', $id)->delete();
        }
        $user->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'status' =>$request->status,
        ]);
        $roles = $request->input('role');
        if (!empty($roles)) {
            $user->roles()->attach($roles);
        }
        return redirect()->route('view-users')->with('Update',  __('messages.flash.update', ['var' => 'User' ]));
    }

    public function delete($id)
    {
        DB::table('users')->where('id', $id)->delete();
        return redirect()->back()->with('delete',  __('messages.flash.delete', ['var' => 'User' ]));
    }
    public function updateStatus(Request $request, $id)
    {
      $status = User::where('id', $id)->first();
      $status->update([
        'status' => $request->status,
      ]);
      return redirect()->back()->with('success',  __('messages.flash.update', ['var' => 'Order' ]));
    }
}
