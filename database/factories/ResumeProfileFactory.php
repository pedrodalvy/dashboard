<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Resume\ResumeProfile;
use Faker\Generator as Faker;

$factory->define(ResumeProfile::class, function (Faker $faker) {
    return [
        'name' => $faker->name(),
        'description' => $faker->text($maxNbChars = 300),
        'email' => $faker->email(),
        'fone' => '(99) 9 9999-9999',
        'address' => 'Centro, Campo Grande/MS - Brasil',
        'function' => 'Desenvolvedor Full-Stack',
        'pricing' => 3000.00,
        'skills' => 'PHP,HTML,CSS,JavaScript',
    ];
});
