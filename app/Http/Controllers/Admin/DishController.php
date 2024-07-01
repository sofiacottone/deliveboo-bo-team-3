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
            ],
        );

        $formdata = $request->all();
        if ($request->hasFile('image')) {
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
    public function show($slug)
    {
        $dish = Dish::where('slug', $slug)->firstOrFail();
        return view('admin.dishes.show', compact('dish'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Dish $dish)
    {
        // $dish = Dish::find($slug);

        return view('admin.dishes.edit', compact('dish'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dish $dish)
    {

        $request->validate(
            [
                'name' => 'required|max:250|min:5',
                'price' => 'required|max:999|min:1',
                'image' => 'nullable|image',
                'description' => 'nullable|max:5000|min:10',
            ],

            [
                'name.required' => "Il campo 'Nome del piatto' è richiesto",
                'name.max' => "Il 'Nome del piatto' può avere massimo 250 caratteri",
                'name.min' => "Il 'Nome del piatto' deve avere almeno 5 caratteri",
                'price.required' => "Il campo 'prezzo' è richiesto",
                'price.max' => "Il campo 'prezzo' può avere un valore di massimo €999",
                'price.min' => "Il campo 'prezzo' deve avere almeno il valore di €1",
                'image.image' => "Il campo 'immagine' deve essere un file immagine",
                'description.min' => "Il campo 'Descrizione' può rimanere vuoto o deve avere minimo 10 caratteri",
                'description.max' => "Il campo 'Descrizione' può avere massimo 5000 caratteri",
            ]
        );

        $formData = $request->all();
        // $this->validation($formData);

        if ($request->hasFile('image')) {
            // Rimuovi la vecchia immagine se esiste
            if ($dish->image) {
                Storage::delete($dish->image);
            }
            $img_path = Storage::disk('public')->put('dish_image', $formData['image']);
            $formData['image'] = $img_path;
        }
        $dish->slug = Str::slug($formData['name'], '-');
        $dish->update($formData);

        return redirect()->route('admin.menu.show', ['dish' => $dish->slug]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dish = Dish::findOrFail($id);
        $dish->delete();
        return redirect()->route('admin.menu.index');
    }

    /**
     * Display a listing of the deleted resources.
     *
     * @return \Illuminate\Http\Response
     */
    public function deleted()
    {
        $dishes = Dish::onlyTrashed()->get();

        return view('admin.dishes.deleted', compact('dishes'));
    }

    /**
     * Restore a specified soft deleted resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        $dish = Dish::where('id', $id)->withTrashed();
        $dish->restore();

        return redirect()->route('admin.menu.index');
    }

    /**
     * Permanently delete a specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function forceDelete($id)
    {
        $dish = Dish::where('id', $id)->withTrashed();
        $dish->forceDelete();

        return redirect()->route('admin.menu.index');
    }
}
