<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::get();
        return view('admin.pages.roles.index')->with(compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::get();
        return view('admin.pages.roles.create')->with(compact('permissions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100|unique:roles',
            'slug' => 'required',
        ]);
        $role = Role::create(['name' => $request->name, 'slug' => $request->slug]);
        $permissions = $request->input('permissions');
        if (!empty($permissions)) {
            $role->permissions()->attach($permissions);
        }
        return redirect()->back()->with('Success', 'Role Created Successfully');
    }

    public function edit($id)
    {
        $role = Role::where('slug', $id)->first();
        $permissions = Permission::get();
        $role_permissions = $role->permissions;
        return view('admin.pages.roles.edit')->with(compact('permissions', 'role', 'role_permissions'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
        ]);
        $role = Role::where('id', $id)->first();
        $permissions = Permission::get();
        foreach ($role as $a) {
            DB::table('role_permissions')->where('role_id', $id)->delete();
        }
        $role->update([
            'name' => $request->name,
            'slug' => $request->slug,
        ]);
        $permissions = $request->input('permissions');
        if (!empty($permissions)) {
            $role->permissions()->attach($permissions);
        }

        return redirect()->route('view-role')->with('update', 'Role Updated Successfully');
    }

    public function delete($id)
    {
        $role = Role::where('id', $id)->first();
        foreach ($role as $a) {
            DB::table('role_permissions')->where('role_id', $id)->delete();
        }
        DB::table('roles')->where('id', $id)->delete();
        return redirect()->route('view-role')->with('delete', 'Role Deleted Successully');
    }
}
