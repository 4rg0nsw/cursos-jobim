<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Aluno;
use Faker\Generator as Faker;
use phpDocumentor\Reflection\Types\Nullable;

$factory->define(Aluno::class, function (Faker $faker) {

    return [
        'name' => $faker->unique()->word,
        'email' => preg_replace('/@example\..*/', '@domain.com', $faker->unique()->safeEmail),
        'data'  => $faker->dateTimeBetween($startDate = '-10 years', $endDate = 'now'),
        'cursos' => $faker->unique()->word,

    ];
});
