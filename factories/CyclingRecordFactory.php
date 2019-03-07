<?php

use Faker\Generator as Faker;
use App\Models\User;
use Carbon\Carbon;

$factory->define(App\Models\CyclingRecord::class, function (Faker $faker, $attributes = []) {
    return [
        'id' => $faker->unique()->bothify('?????#####?????#####'),
        'user_id' => $attributes['user_id'] ?? factory(User::class)->create()->id,
        'start_date' => $faker->datetime,
        'end_date' => $faker->datetime,
        'moving_time' => $faker->numberBetween(600, 18000),
        'distance' => $faker->randomFloat(2, 500, 100000),
        'calories' => $faker->randomNumber(4),
        'max_speed' => $faker->randomFloat(2, 5, 50),
        'average_speed' => $faker->randomFloat(2, 5, 50),
        'elevation_gain' => $faker->randomFloat(2, 5, 5000),
        'elevation_high' => $faker->randomFloat(2, 5, 5000),
        'elevation_low' => $faker->randomFloat(2, 5, 1000),
        'sensors' => json_encode([])
    ];
});
