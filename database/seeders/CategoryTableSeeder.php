<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = config('categories');

        foreach ($categories as $category) {
            $newCategory = new Category();
            $newCategory->fill($category);
            $newCategory->slug = Str::slug($newCategory->name);
            $newCategory->save();
        }
    }
}
