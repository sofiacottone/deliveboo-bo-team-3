<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $formData = $request->all();

        // save data
        $newOrder = new Order();
        $newOrder->fill($formData);
        $newOrder->save();

        if ($request->has('dishes')) {
            foreach ($request->dishes as $dish) {
                $newOrder->dishes()->attach($dish['id'], ['quantity' => $dish['quantity']]);
            }
        }

        // TODO! add validation

        // success response
        return response()->json([
            'success' => true
        ]);
    }
}
