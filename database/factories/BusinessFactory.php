<?php

use Faker\Generator as Faker;
use App\City;

$cities = City::all()->toArray();
$factory->define(App\Business::class, function (Faker $faker) use($cities) {
    return [
        'businessid' => $faker->unique()->randomNumber(5),
        'user_id' => 2,
        'title' => $faker->company,
		'body' => $faker->paragraph,
		'slug' => str_slug($faker->company.microtime()),
        // 'image' => '/storage/uploads/images/businesses/'.$faker->unique()->image(public_path('storage/uploads/images/businesses'), 640, 480, 'business', false),
        'image' => $faker->imageUrl(640, 480, 'business'),
        'contacts' => json_encode([$faker->phoneNumber, $faker->phoneNumber]),
        'address' => $faker->address,
        'emails' => json_encode([$faker->safeEmail, $faker->safeEmail]),
        'is_active' => true,
        'approved_at' => \Carbon\Carbon::now()
    ];
});

$factory->state(App\Business::class, 'services', function ($faker) {
    return [];
});

$factory->afterCreatingState(App\Business::class, 'services', function($business, $faker) {
    $business->services()->save(factory(App\Service::class)->create());
});

$factory->afterCreating(App\Business::class, function($business, $faker) use($cities) {
	$business->cities()->attach([array_random($cities)['id'], array_random($cities)['id']]);
});
