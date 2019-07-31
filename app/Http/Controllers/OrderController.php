<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Dish;
use App\Resturant;
use App\Http\Requests\CreateOrderRequest;
use App\Http\Requests\UpdateOrderRequest;

class OrderController extends Controller
{
    public function index()
    {
        $order = Order::paginate();

        return $order;
    }

    public function store(CreateOrderRequest $request)
    {
        $inputs = $request->only('delivery_address');
        $dishes = $request->dishes;

        $order = Order::create($inputs);
        $order->dishes()->attach($dishes);

        $order->load('dishes');

        return $order;
    }

    public function show(Order $order)
    {
        $order->load('dishes');
        return $order;
    }

    public function update(Order $order, UpdateOrderRequest $request)
    {
        $inputs = $request->only('delivery_address');
        $order->update($inputs);
        $dishes = $request->dishes;
        $order->dishes()->sync($dishes);

        $order->load('dishes');
        return $order;
    }

    public function destroy(Order $order)
    {
        $order->delete();

        return reponse()->json(['message' => 'Success']);
    }
}

