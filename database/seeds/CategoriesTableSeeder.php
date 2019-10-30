<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Category::class, 3)->create()->each(function ($faker) {
            //создаем студентов и сразу связываем ч-з фабрику
            factory(\App\Category::class, 10)->create([
                'title' => $faker->word,
            ]);
        });
    }
}
