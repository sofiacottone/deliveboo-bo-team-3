<?php

namespace Database\Seeders;

use App\Models\Dish;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DishTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dishes = config('dishes');

        foreach ($dishes as $dish) {
            $newDish = new Dish();
            $newDish->fill($dish);
            $newDish->slug = Str::slug($newDish->name);
            $newDish->save();
        }
    }
}
