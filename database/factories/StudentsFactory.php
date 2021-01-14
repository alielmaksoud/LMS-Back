<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\students;
use Faker\Generator as Faker;


$factory->define(students::class, function (Faker $faker) {
    $first = $faker->firstName;
    $last = $faker->lastName;
    $phone = $faker->regexify('^(03|70|71) \d{6}$');
    $student_id = substr($first, -2) ."-".substr($phone, -2) . substr($last, -2) ;
    $dir =  '/tmp' ;
    $width = '32';
    $height = '32';
    return [
        'first_name' => $first,
        'last_name' => $last,
        'phone' => $phone,
        'email' => $faker->unique()->safeEmail,
        'student_id' => $student_id,
        'section_id' => $faker->numberBetween($min = 1, $max = 3),
        'section_name' => $faker->randomElement($array = array ('a','b','c')),
        'class_id' => $faker->numberBetween($min = 1, $max = 3),
        'class_name' => $faker->randomElement($array = array ('Math','Science','History')),
        'picture' => $faker->image($dir, $width, $height, 'cats', false),
    ];  
});
