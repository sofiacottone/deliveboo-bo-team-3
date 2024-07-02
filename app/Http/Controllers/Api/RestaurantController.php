<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::with('user', 'dishes', 'categories')->get();

        return response()->json([
            'success' => true,
            'results' => $restaurants
        ]);
    }

    public function show($slug)
    {
        $restaurant = Restaurant::where('slug', '=', $slug)->with('user', 'dishes', 'categories')->first();

        if ($restaurant) {
            $data = [
                'success' => true,
                'results' => $restaurant
            ];
        } else {
            $data = [
                'success' => false,
                'error' => 'Nessun ristorante trovato con questo slug'
            ];
        }

        return response()->json($data);
    }
}
