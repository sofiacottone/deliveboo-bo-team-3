<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dish;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $dishes = $user->restaurant->dishes;
        return view('admin.dishes.index', compact('dishes'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dishes.create');
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
                'name' => 'required|max:250|min:5',
                'price' => 'required|max:999|min:1',
                'image' => 'nullable|image',
                'description' => 'nullable|max:5000|min:10'
            ], );

        $formdata = $request->all();
        if($request->hasFile('image')){
            $img_path = Storage::disk('public')->put('dish_image', $formdata['image']);
            $formdata['image'] = $img_path;
        }
        $newDish = new Dish();
        $newDish->fill($formdata);
        $newDish->slug = Str::slug($newDish->name, '-');
        $user = auth()->user();
        $newDish->restaurant_id = $user->restaurant->id;
        $newDish->save();
        return redirect()->route('admin.menu.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dish = Dish::find($id);
        return view('admin.dishes.show', compact('dish'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dish = Dish::find($id);
        return view('admin.dishes.edit', compact('dish'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dish = Dish::find($id);
        $request->validate(
            [
                'name' => [
                    'required',
                    'max:250', 
                    'min:5',
                ],
                'price' => 'required|max:999|min:1',
                'image' => 'nullable|image',
                'description' => 'nullable|max:5000|min:10',
            ], 

            [
                'name.required' => "Il campo 'Nome del piatto' è richiesto",
                'name.min' => "Il 'Nome del piatto' deve avere almeno 5 caratteri",
                'name.max' => "Il 'Nome del piatto' può avere massimo 250 caratteri",
                'price.required' => "Il campo 'prezzo' è richiesto",
                'price.max' => "Il campo 'prezzo' può avere un valore di massimo €999",
                'price.min' => "Il campo 'prezzo' deve avere almeno il valore di €1",
                'image.image' => "Il campo 'immagine' deve essere un file immagine",
                'description.min' => "Il campo 'Descrizione' può rimanere vuoto o deve avere minimo 10 caratteri",
                'description.max' => "Il campo 'Descrizione' può avere massimo 5000 caratteri",
            ]
        );
        
        $formdata = $request->all();
        if ($request->hasFile('image')) {
            // Rimuovi la vecchia immagine se esiste
            if ($dish->image) {
                Storage::delete($dish->image);
            }
            $img_path = Storage::disk('public')->put('dish_image', $formdata['image']);
            $formdata['image'] = $img_path;
        } 

        $dish->update($formdata);
       
        return redirect()->route('admin.menu.show', $dish->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
