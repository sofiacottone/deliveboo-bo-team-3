<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $faker = Faker::create('it_IT');
        // for ($i = 0; $i < 5; $i++) {
        //     $newOrder = new Order();
        //     $newOrder->price = $faker->randomFloat(2, 10, 100);
        //     $newOrder->address = $faker->streetAddress();
        //     $newOrder->phone_number = $faker->phoneNumber();
        //     $newOrder->full_name = $faker->name();
        //     $slug = Str::slug($newOrder->full_name, '.');
        //     $newOrder->email = $slug . '@mail.it';
        //     $newOrder->save();
        // }
    }
}
