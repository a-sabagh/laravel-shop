<?php

use Illuminate\Database\Seeder;

class CourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Course',20)->create()->each(function($course){
            echo "\n" . $course->title . " Was Created";
        });
    }
}
