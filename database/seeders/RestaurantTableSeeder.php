<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class RestaurantTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $faker = Faker::create('it_IT');
        for ($i = 0; $i < 25; $i++) {
            $newRestaurant = new Restaurant();
            $newRestaurant->address = $faker->streetAddress();
            $newRestaurant->VAT_no = $faker->vat();
            $newRestaurant->name = $faker->company();
            $newRestaurant->slug = Str::slug($newRestaurant->name);
            $newRestaurant->description = $faker->randomElement(
                [
                    "Oasi gastronomica nel cuore di Roma, dove sapori autentici e un'atmosfera raffinata creano un'esperienza culinaria indimenticabile.",
                    "Ristorante incantevole nel centro storico di Roma, celebre per la sua cucina innovativa e l'ospitalità impeccabile, perfetto per ogni occasione.",
                    "Gusto e tradizione si incontrano in questo ristorante nel cuore di Roma, offrendo piatti prelibati e un ambiente elegante che invita al relax e alla convivialità.",
                    "Una gemma culinaria nel cuore di Roma, dove ogni piatto è una celebrazione di sapori freschi e autentici, accompagnato da un servizio attento e cortese.",
                    "Scopri un'oasi di gusto nel centro storico di Roma, dove la qualità degli ingredienti e l'arte culinaria si incontrano per creare esperienze gustative indimenticabili.",
                    "Ristorante rinomato nel centro di Roma, famoso per la sua cucina sofisticata e l'atmosfera elegante, ideale per cene romantiche e incontri d'affari.",
                    "Esperienza gastronomica di classe nel cuore di Roma, dove la passione per la buona cucina si riflette in ogni piatto, in un ambiente accogliente e raffinato.",
                    "Un angolo di paradiso per gli amanti del buon cibo a Roma, dove ogni boccone è un viaggio tra sapori autentici e presentazioni artistiche.",
                    "Ristorante affascinante nel centro storico di Roma, dove la tradizione culinaria si unisce all'innovazione per offrire esperienze gastronomiche memorabili, da gustare con calma.",
                    "Eleganza e gusto si fondono in questo ristorante di Roma, dove ogni dettaglio è curato con passione per garantire una cena indimenticabile, nel cuore della città eterna.",
                ]
            );
            $newRestaurant->save();
        }
    }
}
