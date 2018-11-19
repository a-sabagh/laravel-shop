<?php

use Illuminate\Database\Seeder;

class userTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\User',2)->create()->each(function($user){
            for($i=0;$i<5;$i++){
                $product = $user->products()->create(factory('App\products')->make()->toArray());
                $product->categories()->attach([rand(1,3)]);
            }
        });
    }
}
