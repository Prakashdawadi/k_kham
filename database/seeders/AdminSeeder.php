<?php

namespace Database\Seeders;
use App\Models\Admin;
use Hash;

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
        	'name'    => 'prakash',
        	'email'   => 'prakash.dawadi2@gmail.com',
        	'password'=> Hash::make('admin'),
        	'role'    => 'Super Admin',
        	'status'  => 'active',
        ];

        $admin = Admin::create($data);

        $admin_info = [
        	'name'    => 'admin',
        	'email'   => 'admin123@gmail.com',
        	'password'=> Hash::make('admin'),
        	'role'    => 'Admin',
        	'status'  => 'active',
        ];

        $admin = Admin::create($admin_info);
    }
}
