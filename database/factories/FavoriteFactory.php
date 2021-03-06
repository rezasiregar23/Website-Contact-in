<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Favorite::class, function (Faker $faker) {
    return [
        'name' => $faker('name'),
        'no_handphone' => $faker('no_handphone')
    ];
});
