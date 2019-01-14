<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Client::class, function (Faker $faker) {
    return [
        'name'   => $faker->name,
        'mother_name' => $faker->name,
        'document'   => $faker->numerify('###########'),
        'contract_type'   => 'CAIXA',
        'birth_date'   => $faker->date(),
        'telephone'   => $faker->numerify('#########'),
        'email'   => $faker->unique()->email,
        'status'   => 'ATIVO',
    ];

});
