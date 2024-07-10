<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $restaurant = $user->restaurant;
        $orders = Order::whereHas('dishes', function ($q) use ($restaurant) {
            $q->where('restaurant_id', $restaurant->id);
        })->orderBy('created_at', 'desc')->get();
        return view('admin.orders.index', compact('orders'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::where('id', $id)->firstOrFail();
        return view('admin.orders.show', compact('order'));
    }

    /**
     * Display the details of the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function orderDetails($id)
    {
        $order = Order::with(['dishes' => function ($q) {
            $q->withPivot('quantity');
        }])->findOrFail($id);

        return view('admin.orders.order-details', compact('order'));
    }
}
