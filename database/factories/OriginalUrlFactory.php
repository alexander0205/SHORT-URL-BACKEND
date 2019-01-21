<?php

use Faker\Generator as Faker;

$factory->define(App\OriginalUrl::class, function (Faker $faker) {
    return [
        'url' =>$faker->url
    ];
});
