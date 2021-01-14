<?php

use Illuminate\Database\Seeder;
use App\students;

class StudentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\students::class, 5)->create();
    }
}
