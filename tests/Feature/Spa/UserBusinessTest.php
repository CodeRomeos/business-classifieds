<?php

namespace Tests\Feature\Spa;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

use App\Business;


class UserBusinessTest extends TestCase
{
	use WithFaker;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_business_not_created()
    {
        $user = $this->createAdvertiser();

		$response = $this->actingAs($user)
						->get('/spa/user/business');

		$response->assertStatus(200)
			->assertJson(['notCreated' => 'Business not created!']);
	}

	public function create_business()
	{
        $user = $this->createAdvertiser();

        $business = [];
        $response = $this->actingAs($user)
                        ->post('/spa/user/business/create', []);
	}

	public function test_user_business_service_create()
	{
		$user = $this->createAdvertiser();
		$business = factory(Business::class)->create(['user_id' => $user->id]);

		$image = UploadedFile::fake()->image('image.jpg');

		$response = $this->actingAs($user)
						->json('POST', route('spa.user.business.createService', ['businessId' => $business->id]), [
							'name' => ''
						])
						->assertStatus(422);

		$response = $this->actingAs($user)
						->post(route('spa.user.business.createService', ['businessId' => $business->id]), [
							'name' => 'Test',
							'description' => 'Test description',
							'image' => $image
						])
						->assertStatus(200);
	}
}
