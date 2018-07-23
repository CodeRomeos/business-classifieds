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
        	'name' => 'Super Admin',
        	'email' => 'admin@admin.com',
        	'password' => bcrypt('admin@123'),
        	'verification_code'	=> sha1(time() . str_random(10)),
        	'verified_at' => \Carbon\Carbon::now(),
        	'is_super_admin' => true,
        	'created_at' => \Carbon\Carbon::now()
        ]);

        DB::table('users')->insert([
            'id' => '2',
        	'role_id' => '2',
        	'name' => 'Advertiser User',
        	'email' => 'advertiser@user.com',
        	'password' => bcrypt('advertiser@123'),
        	'verification_code'	=> sha1(time() . str_random(10)),
        	'verified_at' => \Carbon\Carbon::now(),
        	'created_at' => \Carbon\Carbon::now()
		]);

		DB::table('users')->insert([
            'id' => '3',
        	'role_id' => '3',
        	'name' => 'Editor User',
        	'email' => 'editor@user.com',
        	'password' => bcrypt('editor@123'),
        	'verification_code'	=> sha1(time() . str_random(10)),
        	'verified_at' => \Carbon\Carbon::now(),
        	'created_at' => \Carbon\Carbon::now()
        ]);

        DB::table('users')->insert([
            'id' => '4',
        	'role_id' => '4',
        	'name' => 'Subscriber User',
        	'email' => 'subscriber@user.com',
        	'password' => bcrypt('subscriber@123'),
        	'verification_code'	=> sha1(time() . str_random(10)),
        	'verified_at' => \Carbon\Carbon::now(),
        	'created_at' => \Carbon\Carbon::now()
        ]);
    }
}
