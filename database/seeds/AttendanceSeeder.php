<?php

use Illuminate\Database\Seeder;
use App\attendance;
use App\students;
use App\classes;
use App\section;


class AttendanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    //     $faker = Faker\Factory::create();

    //     for ($i = 1; $i <= 6; $i++){
    //         $period = new DatePeriod(
    //             new DateTime('now'),
    //             new DateInterval('P1D'),
    //             new DateTime('2021-1-23')
    //     );
    //     $a = array();

    //     foreach ($period as $key => $value) {
    //         // echo $value->format('Y-m-d')."\n" ;
    //         //    array_push($a, $value->format('Y-m-d'));
    //         attendance::create([
    //             'status' => $faker->randomElement($array = array ('Late','Absent','Present')),
    //             'date' => $value->format('Y-m-d') ,
    //             'student_id' => $j ,
    //             'section_id' => $j,
    //         ]);
    //         }
    //     }

     }

}