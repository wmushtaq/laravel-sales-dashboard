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

$factory->define(App\Sale::class, function (Faker $faker) {
    return [
        'package_id' => function(){
            return App\Package::inRandomOrder()->first()->id;
        },
        'customer_id' => function(){
            return App\Customer::inRandomOrder()->first()->id;
        },
        'created_at' => $faker->dateTimeBetween('-1 years')
    ];
});
