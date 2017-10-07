<?php

use Faker\Generator as Faker;

//Factory for customers
$factory->define(App\Customer::class, function (Faker $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret')
    ];
});

//Factory for Users
$factory->define(App\User::class, function (Faker $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'is_admin' => true,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10)
    ];
});

$factory->define(App\Product::class, function (Faker $faker) {
    static $password;

    return [
        'category_id' => $faker->randomDigit,
        'name' => $faker->word,
        'description' => $faker->text($maxNbChars = 200),
        'price' => $faker->randomDigit,
        'stock' => $faker->randomDigit,
        'image_url' => $faker->imageUrl($width = 640, $height = 480)

    ];
});
