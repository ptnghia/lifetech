<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User_admin;

class CreateUserAdminsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_admins = [
            [
               'name'=>'Admin User',
               'email'=>'admin@gmail.com',
               'type'=>1,
               'password'=> bcrypt('12345678'),
            ],
            [
               'name'=>'Manager User',
               'email'=>'manager@gmail.com',
               'type'=> 2,
               'password'=> bcrypt('12345678'),
            ],
            [
               'name'=>'User',
               'email'=>'user@gmail.com',
               'type'=>0,
               'password'=> bcrypt('12345678'),
            ],
        ];
    
        foreach ($user_admins as $key => $user_admin) {
            User_admin::create($user_admin);
        }
    }
}
