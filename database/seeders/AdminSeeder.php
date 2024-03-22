<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name'=>'admin',
            'email'=>'admin@gmail.com',
            'phone'=>'9882314579',
            'password' => bcrypt('admin123'),
            'status'=>'active',
        ]);

        $vander = User::create([
            'name'=>'vander',
            'email'=>'vander@gmail.com',
            'phone'=>'9882314579',
            'password' => bcrypt('vander123'),
            'status'=>'active',
        ]);

        $user = User::create([
            'name'=>'user',
            'email'=>'user@gmail.com',
            'phone'=>'9882314579',
            'password' => bcrypt('user123'),
            'status'=>'active',
        ]);
    }
}
