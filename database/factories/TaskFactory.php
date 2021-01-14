<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Task;
use Faker\Generator as Faker;

$factory->define(Task::class, function (Faker $faker) {
    return [
        'title' => $faker->realText(20),
        'detail' => $faker->realText(100),
        'due_date' => $faker->datetime($min = 'now', $timezone = date_default_timezone_get())
    ];
});
