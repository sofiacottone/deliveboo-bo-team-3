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

        // verify if 'categories' exists, is an array and is not empty
        if ($request->has('categories') && is_array($request->categories) && count($request->categories) > 0) {
            $categories = $request->input('categories');
            $categoriesCount = count($categories);

            $query->whereHas('categories', function ($q) use ($categories) {
                $q->whereIn('slug', $categories);
            }, '=', $categoriesCount);
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
