<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Dish;

class Order extends Model
{
    protected $appends = ['totalPrice'];

    protected $fillable = [
        'delivery_address'
    ];

    public function dishes()
    {
        return $this->belongsToMany(Dish::class);
    }

    public function getTotalPriceAttribute()
    {
        return (int) $this->dishes()->sum('price');
    }
}
