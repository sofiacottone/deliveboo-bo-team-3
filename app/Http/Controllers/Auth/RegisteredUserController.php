<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Restaurant;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $categories = Category::all();
        return view('auth.register', compact('categories'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // validate data 
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'address' => 'required|min:5|max:250',
            'VAT_no' => 'required|min:11|max:13|unique:restaurants',
            'restaurant_name' => 'required|min:2',
            'description' => 'nullable|min:5',
            'image' => 'nullable|image',
            'categories' => 'required|exists:categories,id'
        ],
        [
            'name.required' => "Il campo 'Nome del piatto' è richiesto",
            'name.max' => "Il 'Nome del piatto' può avere massimo 250 caratteri",
            'address.required' => "Il campo 'indirizzo' è richiesto",
            'price.max' => "Il campo 'indirizzo' può avere massimo 250 caratteri",
            'price.min' => "Il campo 'indirizzo' può avere minimo 5 caratteri",
            'VAT_no.required' => "Il campo 'VAT no' è richiesto",
            'VAT_no.max' => "Il campo 'Partita Iva' può avere massimo 13 caratteri",
            'VAT_no.min' => "Il campo 'Partita Iva' può avere minimo 11 caratteri",
            'restaurant_name.required' => "Il campo 'Nome del ristorante' è richiesto",
            'restaurant_name.min' => "Il campo 'Nome del ristorante' può avere minimo 2 caratteri",
            'image.image' => "Il campo 'immagine' deve essere un file immagine",
            'description.min' => "Il campo 'Descrizione' può rimanere vuoto o deve avere minimo 5 caratteri",
            'categories.required' => "Inserisci una o più categorie",
        ]);

        // create new user 
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $formData = $request->all();
        if ($request->hasFile('image')) {
            $img_path = Storage::disk('public')->put('restaurant_image', $formData['image']);
            $formData['image'] = $img_path;
        }
        // create new restaurant 
        $newRestaurant = new Restaurant();
        $newRestaurant->fill($formData);
        $newRestaurant->slug = Str::slug($newRestaurant->restaurant_name, '-');
        $newRestaurant->user_id = $user->id;
        $newRestaurant->save();

        // add relationship
        if ($request->has('categories')) {
            $newRestaurant->categories()->attach($formData['categories']);
        }

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
