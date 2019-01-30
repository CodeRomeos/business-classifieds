<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use App\Role;

abstract class TestCase extends BaseTestCase
{
	use CreatesApplication, RefreshDatabase, DatabaseMigrations, WithFaker;

	public function setUp()
    {
		parent::setUp();
        Artisan::call('db:seed');
	}
	public function createAdvertiser()
	{
		$role = Role::byName('advertiser')->first();
        $user_data = [
            'name' => $this->faker->name,
            'role_id' => $role->id,
            'email' => $this->faker->unique()->safeEmail,
            'password' => Hash::make('123'),
            'verification_code' => sha1(time() . str_random(10))
        ];
        $user = factory(\App\User::class)->create($user_data);
		$this->assertTrue($user->isAdvertiser);
		return $user;
	}

}
