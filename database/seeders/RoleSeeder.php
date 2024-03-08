<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::create(['name' => 'admin','slug'=>'admin']);
        $vander = Role::create(['name' => 'vander','slug'=>'vander']);
        $user = Role::create(['name' => 'user','slug'=>'user']);

        $users = User::first();
        $users->roles()->attach($admin);
        
    }
}
