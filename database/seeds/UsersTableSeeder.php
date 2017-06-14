<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        	'id' => 1, 'role_id' => '1', 'name' => 'Admin', 'email' => 'admin@admin.com', 'password' => bcrypt('admin123'),
        	'is_blocked' => false, 'verified_at' => \Carbon\Carbon::now(), 'is_super_admin' => true
        	]);

        User::create([
        	'id' => 2, 'role_id' => '2', 'name' => 'John Doe', 'email' => 'johndoe@users.com', 'password' => bcrypt('123456'),
        	'is_blocked' => false, 'verified_at' => \Carbon\Carbon::now(), 'is_super_admin' => false
        	]);
    }
}
