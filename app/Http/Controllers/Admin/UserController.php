<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Exception;
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
        try {
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
            return redirect()->back()->with('Success',  __('messages.flash.create', ['var' => 'User']));
        } catch (Exception $e) {
            return abort(401);
        }
    }

    public function edit($id)
    {
        $user = User::where('id', $id)->first();
        // dd($user);
        $roles = Role::get();
        $user_role = $user->roles;
        return view('admin.pages.users.edit')->with(compact('user', 'roles', 'user_role'));
    }


    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $request->validate([
                'name' => 'required',
                'phone' => 'required',
                'email' => 'required',
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
                'commission'=> $request->commission,
            ]);
            $roles = $request->input('role');
            if (!empty($roles)) {
                $user->roles()->attach($roles);
            }
            DB::commit();
            return redirect()->route('view-users')->with('Update',  __('messages.flash.update', ['var' => 'User']));
        } catch (Exception $e) {
            DB::rollBack();
            return abort(402);
        }
    }

    public function delete($id)
    {
        try{
        DB::table('users')->where('id', $id)->delete();
        return redirect()->back()->with('delete',  __('messages.flash.delete', ['var' => 'User']));
        }catch(Exception $e){
            return view('errors.error.424');
        }
    }
    public function updateStatus(Request $request, $id)
    {
        $status = User::where('id', $id)->first();
        $status->update([
            'status' => $request->status,
        ]);
        $records = User::selectRaw('TIMESTAMPDIFF(SECOND, updated_at, created_at) AS time_difference_seconds')->get();
        dd($records);
        return redirect()->back()->with('success',  __('messages.flash.update', ['var' => 'Order']));
    }
}
