<?php

use Illuminate\Http\Request;

Route::get("/resturants/{resturant}/menu", "ResturantController@menu");

Route::get("/dishes/search", "DishController@search");
  
Route::resource('resturants', 'ResturantController')->only('index', 'store', 'update', 'destroy', 'show');
Route::get('resturants/{resturant}/menu', 'ResturantController@menu');

Route::resource('cities', 'CityController')->only('index', 'store', 'update', 'destroy');

Route::resource('countries', 'CountryController')->only('index', 'store', 'update', 'destroy');

Route::resource('orders', 'OrderController')->only('index', 'show', 'store', 'update', 'destroy');

Route::resource('dishes', 'DishController')->only('index', 'show', 'store', 'update', 'destroy');

Route::resource('categories', 'CategoryController')->only('index', 'store', 'update', 'destroy');