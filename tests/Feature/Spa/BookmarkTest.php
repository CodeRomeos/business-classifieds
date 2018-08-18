<?php

namespace Tests\Feature\Spa;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use App\Role;

class BookmarkTest extends TestCase
{
    use WithFaker;

    public function test_user_business_bookmark_action()
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
        $this->assertTrue(!$user->isAdmin);

        $business = factory(\App\Business::class)->create([
			'businessid' => '65454',
            'title' => 'First Business',
            'body' => 'First Body'
        ]);

        $response = $this->actingAs($user)
            ->post('/spa/user/bookmarks/'.$business->id);

        $response
            ->assertStatus(200)
            ->assertJson(['bookmark' => true]);

        $response = $this->actingAs($user)
            ->post('/spa/user/bookmarks/'.$business->id);

        $response
            ->assertStatus(200)
            ->assertJson(['bookmark' => false]);


    }

    public function test_user_bookmarks_list()
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
        $this->assertTrue(!$user->isAdmin);

        $business1 = factory(\App\Business::class)->create([
			'businessid' => '65454',
            'title' => 'First Business',
            'body' => 'First Body'
        ]);

        $business2 = factory(\App\Business::class)->create([
			'businessid' => '89798745',
            'title' => 'Second Business',
            'body' => 'Second Body'
        ]);

        $response = $this->actingAs($user)
            ->post('/spa/user/bookmarks/'.$business1->id);

        $response
            ->assertStatus(200)
            ->assertJson(['bookmark' => true]);

        $response = $this->actingAs($user)
            ->post('/spa/user/bookmarks/'.$business2->id);

        $response
            ->assertStatus(200)
            ->assertJson(['bookmark' => true]);

        $response = $this->actingAs($user)
            ->get('/spa/user/bookmarks')
            ->assertStatus(200)
            ->assertJsonStructure(['data' => [
                ['id', 'businessid', 'title', 'body', 'image', 'contacts', 'city', 'address', 'emails'],
                ['id', 'businessid', 'title', 'body', 'image', 'contacts', 'city', 'address', 'emails']
            ]]);
    }
}
