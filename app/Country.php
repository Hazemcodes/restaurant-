<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\City;

class Country extends Model
{
    protected $fillable = [
      'name'
    ];

    public function cities()
    {
        return $this->hasMany(City::class);
    }

    public function getNameAttribute($value)
    {
        return ucwords($value);
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucwords($value);
    }
}
