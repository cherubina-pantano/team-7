<?php

use Illuminate\Database\Seeder;
use App\Dish;
use App\Restaurant;
use Illuminate\Support\Str;
use Faker\Generator as Faker;


class DishesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        // $dishes = Dish::all();
        $restaurants = Restaurant::all();

        foreach ($restaurants as $restaurant) {
             $newDish = new Dish();

             $newDish->restaurant_id = $restaurant->id;
             $newDish->name = $faker->word();
             $newDish->category=$faker->word(2);
             $newDish->ingredients=$faker->word(10);
             $newDish->description=$faker->paragraphs(2, true);
             $newDish->path_img=$faker->imageUrl(640, 480);
             $newDish->price = $faker->randomFloat(2, 0, 999);
             $newDish->gluten = $faker->boolean();
             $newDish->available = $faker->boolean();
             $newDish->slug = Str::slug($newDish->name, '-');

             $newDish->save();
        };

    }
}
