<?php

namespace Tests\Feature\Spa;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;

use App\Business;

class ListingTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_business_listings_data()
    {
		$business1 = factory(Business::class)->create([
			'businessid' => '65454',
            'title' => 'First Business',
            'body' => 'First Body'
		]);

		$business2 = factory(Business::class)->create([
			'businessid' => '654554',
            'title' => 'Second Business',
            'body' => 'Second Body'
        ]);

        $response = $this->json('get', '/spa/businesses');

        $response
			->assertStatus(200)
			->assertJson([
				'data' => [
					'businesses' => [
						['businessid' => '65454', 'title' => 'First Business', 'body' => 'First Body'],
						['businessid' => '654554', 'title' => 'Second Business', 'body' => 'Second Body']
					]
				],
				'pagination' => ['count' => 2, 'total' => 2, 'perPage' => 8, 'currentPage' => 1]
			])
			->assertSeeInOrder([
				$business1->businessid,
				$business2->businessid,
			])
            ->assertJsonStructure([
				'data' => ['businesses'],
				'pagination'
			]);
	}

	public function test_single_business_data()
	{
		factory(Business::class)->create([
			'businessid' => '65454',
            'title' => 'Business Title',
            'body' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit.'
		]);

		$response = $this->json('GET', '/spa/businesses/65454');

		$response
			->assertStatus(200)
			->assertJson([
				'data' => [
					'businessid' => '65454',
					'title' => 'Business Title',
					'body' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit.'
				]
			])
            ->assertJsonStructure(['data']);

	}
}
