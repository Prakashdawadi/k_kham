<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Hash;


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        

        $admin = Admin::create([
            'name'    => 'prakash',
            'email'   => 'prakash.dawadi2@gmail.com',
            'password'=> Hash::make('admin'),
            'role'    => 'Super Admin',
            'status'  => 'active',
        ]);


        $admin_info = Admin::create([
            'name'    => 'admin',
            'email'   => 'admin123@gmail.com',
            'password'=> Hash::make('admin'),
            'role'    => 'Admin',
            'status'  => 'active',
        ]);
    }
}
