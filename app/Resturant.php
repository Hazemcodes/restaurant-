<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\City;
use App\Dish;

class Resturant extends Model
{
    protected $fillable = [
        'name','city_id', 'address',' description', 'phone'
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function dishes()
    {
        return $this->hasMany(Dish::class);
    }
}
