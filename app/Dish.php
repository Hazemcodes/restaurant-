<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Order;
use App\Resturant;
use App\Category;

class Dish extends Model
{
    protected $fillable = [
        'name', 'resturant_id', 'description', 'price',
     ];

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function resturant()
    {
        return $this->belongsTo(Resturant::class);
    }
}
