<?php

use Illuminate\Database\Seeder;
// use App\Restaurant;
use App\Dish;
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
          for ($i = 0; $i < 10; $i++ ) {

            $newDish = new Dish();

            $newDish->name = $faker->word();
            $newDish->category = $faker->words(2);
            $newDish->ingredients = $faker->words(10);
            $newDish->description = $faker->paragraph();
            $newDish->path_img = $faker->imageUrl(640, 480);
            $newDish->price = $faker->randomFloat(2,0,999);
            $newDish->slug = Str::slug($newDish->name, '-');
            $newDish->gluten = $faker->boolean();
            $newDish->available = $faker->boolean();

            $newDish->save();
        }
    }
}
