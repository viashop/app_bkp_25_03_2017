<?php

use App\Models\Bank;

$factory->define(Bank::class, function (Faker\Generator $faker) {
    return [
        'number' => $faker->randomNumber(3),
        'name' => $faker->name,
        'logo' => str_random(10),
        'status' => 0,
    ];
});
