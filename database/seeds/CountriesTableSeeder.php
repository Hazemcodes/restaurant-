<?php

use App\Country;
use App\Category;
use App\City;
use App\Resturant;
use App\Dish;
use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Country::class, 10)->create()->each(function ($country) {
            $country->cities()->createMany(factory(City::class, 10)->make()->toArray())->each(function ($city) {
                $city->resturants()->createMany(factory(Resturant::class, 10)->make()->toArray())->each(function ($resturant) {
                    $resturant->dishes()->createMany(factory(Dish::class, 10)->make()->toArray())->each(function ($dish) {
                        $ids = Category::inRandomOrder()->take(3)->get()->pluck('id')->toArray();
                        $dish->categories()->attach($ids);
                    });
                });
            });
        });
    }
}