<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Applicant;
use Faker\Generator as Faker;

$factory->define(Applicant::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'middle_name' => $faker->firstName,
        'age' => $faker->numberBetween($min = 18, $max = 25),
        'details' => $faker->word,
    ];
});
// $applicants = factory(\App\Applicant::class, 100)->make();
