<?php

use Faker\Generator as Faker;

$factory->define(App\Business::class, function (Faker $faker) {
    return [
        'businessid' => $faker->unique()->randomNumber(5),
        'user_id' => 2,
        'title' => $faker->company,
        'body' => $faker->paragraph,
        'image' => '/storage/uploads/images/businesses/'.$faker->unique()->image(public_path('storage/uploads/images/businesses'), 640, 480, 'business', false),
        'contacts' => json_encode([$faker->phoneNumber, $faker->phoneNumber]),
        'city' => $faker->city,
        'address' => $faker->address,
        'emails' => json_encode([$faker->safeEmail, $faker->safeEmail]),
        'is_active' => true,
        'approved_at' => \Carbon\Carbon::now()
    ];
});
