<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Country;
use App\Resturant;

class City extends Model
{
    protected $fillable = [
        'name','country_id'
     ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function resturants()
    {
        return $this->hasMany(Resturant::class);
    }
}
