<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Resume\ResumeExperience;
use Faker\Generator as Faker;

$factory->define(ResumeExperience::class, function (Faker $faker) {
    $dateOut = $faker->date($format = 'Y-m-d', $max = 'now');
    return [
        'job_title' => $faker->jobTitle(),
        'company' => $faker->company(),
        'job_resume' => $faker->text($maxNbChars = 200),
        'date_in' => $faker->date($format = 'Y-m-d', $max = $dateOut),
        'date_out' => $dateOut,
    ];
});
