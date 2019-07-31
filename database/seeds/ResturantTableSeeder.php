<?php

use Illuminate\Database\Seeder;
use App\Resturant;
use App\Dish;

class ResturantTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Resturant::class, 10)->create()->each(function ($resturant) {
            $resturant->dishes()->createMany(factory(Dish::class, 10)->make()->toArray());
        });
    }
}
