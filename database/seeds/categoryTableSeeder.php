<?php

use Illuminate\Database\Seeder;

class categoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\category',3)->create()->each(function($category){
            echo "\n" . $category->name . " Was Created.";
        });
    }
}
