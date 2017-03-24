<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Role::class, function () {
    return [
        'name' => str_slug(str_random(10), '_'),
        'description' => str_random(10)
    ];
});
