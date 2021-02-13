<?php

use Illuminate\Database\Seeder;
use App\Restaurant;

use Faker\Generator as Faker;



class RestaurantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        //popoliamo la tabella
        //$restaurants =Restaurant::all();

        for ($i = 0; $i < 5; $i++) {
            //crea istanza
            $restaurants = new Restaurant();

            //set dati colonne
            $restaurants->name = $faker->paragraphs(1, true);
            $restaurants->address = $faker->paragraphs(1, true);
           

            //salvataggio dati
            $restaurants->save();

            /* $restaurants =Restaurant::all();

            foreach ($restaurants as $restaurant) {
                // creazione instanza
            $newRestaurant= new Restaurant();
                // set valori colonne
            $newRestaurant->name = $faker->sentences(2);
            $newRestaurant->address = $faker->sentences(2);
                // salvataggio
            $newRestaurant->save(); */
        }
    }
}
