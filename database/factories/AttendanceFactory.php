<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\attendance;
use Faker\Generator as Faker;



$factory->define(attendance::class, function (Faker $faker) {
    

   return [
    'status' => $faker->randomElement($array = array ('Late','Absent','Present')),
    'date' => $faker->dateTimeInInterval($startDate = 'now', $interval = '+ 10 days', $timezone = null) ,
    'student_id' => 1 ,
];  
});
