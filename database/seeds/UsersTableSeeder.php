<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'id' => '1',
        	'role_id' => '1',
        	'name' => 'NewsPiq Admin',
        	'email' => 'admin@admin.com',
        	'password' => bcrypt('admin@123'),
        	'verification_code'	=> sha1(time() . str_random(10)),
        	'verified_at' => \Carbon\Carbon::now(),
        	'is_super_admin' => true,
        	'created_at' => \Carbon\Carbon::now()
        ]);

        DB::table('users')->insert([
        	'role_id' => '2',
        	'name' => 'Author User',
        	'email' => 'author@user.com',
        	'password' => bcrypt('author@123'),
        	'verification_code'	=> sha1(time() . str_random(10)),
        	'verified_at' => \Carbon\Carbon::now(),
        	'created_at' => \Carbon\Carbon::now()
        ]);

        DB::table('users')->insert([
        	'role_id' => '3',
        	'name' => 'Subscriber User',
        	'email' => 'subscriber@user.com',
        	'password' => bcrypt('subscriber@123'),
        	'verification_code'	=> sha1(time() . str_random(10)),
        	'verified_at' => \Carbon\Carbon::now(),
        	'created_at' => \Carbon\Carbon::now()
        ]);
    }
}
