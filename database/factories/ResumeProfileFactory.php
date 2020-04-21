<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Resume\ResumeProfile;
use Faker\Generator as Faker;

$factory->define(ResumeProfile::class, function (Faker $faker) {
    return [
        'name' => 'Pedro Felipe Dalvy Ramires',
        'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus suscipit accusamus vitae impedit pariatur, quas, provident fugit ducimus eligendi labore aspernatur natus porro aperiam illo officia obcaecati corporis nisi molestias.',
        
    ];
});
