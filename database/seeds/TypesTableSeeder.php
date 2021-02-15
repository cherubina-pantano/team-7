<?php

use Illuminate\Database\Seeder;
use App\Type;
use Faker\Generator as Faker;


class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++ ) {
            $newType = new Type();

            $newType->type = $faker->word();

            $newType->save();
        }
    }
}
