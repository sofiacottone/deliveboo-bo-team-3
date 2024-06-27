<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RestaurantController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.register-restaurant', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'address' => 'required|min:5|max:250',
                'VAT_no' => 'required|min:11|max:13|unique:restaurants',
                'name' => 'required|min:2',
                'description' => 'nullable|min:5',
                'image' => 'nullable|image|max:512',
                'categories' => 'required|exists:categories,id'
            ]
        );

        $formData = $request->all();

        $newRestaurant = new Restaurant();
        $newRestaurant->fill($formData);
        $newRestaurant->slug = Str::slug($newRestaurant->name, '-');
        dump($newRestaurant);
        $newRestaurant->save();

        // add relationship
        if ($request->has('categories')) {
            $newRestaurant->categories()->attach($formData['categories']);
        }

        return redirect()->route('admin.dashboard');
    }
}
