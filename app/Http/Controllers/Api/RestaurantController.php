<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index(Request $request)
    {
        // add possibility to filter results
        $query = Restaurant::with('dishes', 'categories');

        if ($request->has('category')) {
            $category = $request->input('category');

            $query->whereHas('categories', function ($q) use ($category) {
                $q->where('slug', $category);
            });
        }

        $restaurants = $query->get();

        return response()->json([
            'success' => true,
            'results' => $restaurants
        ]);
    }

    public function show($slug)
    {
        $restaurant = Restaurant::where('slug', '=', $slug)->with('dishes', 'categories')->first();

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
