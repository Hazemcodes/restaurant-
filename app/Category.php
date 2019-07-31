<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Dish;

class Category extends Model
{
    protected $fillable = [
        'name'
    ];

    public function dishes()
    {
        return $this->belongsToMany(Dish::class);
    }
}
