<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Resume\ResumeEducation;
use Faker\Generator as Faker;

$factory->define(ResumeEducation::class, function (Faker $faker) {
    $dateOut = $faker->date($format = 'Y-m-d', $max = 'now');
    return [
        'course' => $faker->jobTitle(),
        'establishment' => $faker->company(),
        'course_resume' => $faker->text($maxNbChars = 200),
        'date_in' => $faker->date($format = 'Y-m-d', $max = $dateOut),
        'date_out' => $dateOut,
    ];
});
