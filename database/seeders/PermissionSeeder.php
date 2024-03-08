<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // user
        $permission = Permission::create(['name'=>'view users','slug'=>'view-users','group'=>'User']);
        $permission = Permission::create(['name'=>'create user','slug'=>'create-user','group'=>'User']);
        $permission = Permission::create(['name'=>'update user','slug'=>'update-user','group'=>'User']);
        $permission = Permission::create(['name'=>'delete user','slug'=>'delete-user','group'=>'User']);

        //category
        $permission = Permission::create(['name'=>'category view','slug'=>'view-category','group'=>'Category']);
        $permission = Permission::create(['name'=>'category create','slug'=>'create-category','group'=>'Category']);
        $permission = Permission::create(['name'=>'category update','slug'=>'update-category','group'=>'Category']);
        $permission = Permission::create(['name'=>'category delete','slug'=>'delete-category','group'=>'Category']);
        //users
     
        //roles
        $permission = Permission::create(['name'=>'view role','slug'=>'view-role','group'=>'Role']);
        $permission = Permission::create(['name'=>'create view','slug'=>'create-role','group'=>'Role']);
        $permission = Permission::create(['name'=>'update role','slug'=>'update-role','group'=>'Role']);
        $permission = Permission::create(['name'=>'delete role','slug'=>'delete-role','group'=>'Role']);
        //products
        $permission = Permission::create(['name'=>'view products','slug'=>'view-products','group'=>'Product']);
        $permission = Permission::create(['name'=>'create product','slug'=>'create-product','group'=>'Product']);
        $permission = Permission::create(['name'=>'update product','slug'=>'update-product','group'=>'Product']);
        $permission = Permission::create(['name'=>'delete product','slug'=>'delete-product','group'=>'Product']);
        //orsers
        
        //subcategory
        $permission = Permission::create(['name'=>'sub-category view','slug'=>'view-sub-category','group'=>'Sub-category']);
        $permission = Permission::create(['name'=>'sub-category create','slug'=>'create-sub-category','group'=>'Sub-category']);
        $permission = Permission::create(['name'=>'sub-category update','slug'=>'update-sub-category','group'=>'Sub-category']);
        $permission = Permission::create(['name'=>'sub-category delete','slug'=>'delete-sub-category','group'=>'Sub-category']);

        $role = Role::first();
        $permissions = Permission::get();
        $role->permissions()->attach($permissions);
    }
}
