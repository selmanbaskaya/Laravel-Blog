<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 20; $i++) {
            $title = $faker->sentence(6);
            DB::table('articles')->insert([
                'category_id'=>rand(1, 5),
                'title'=>$title,
                'image'=>$faker->imageUrl('800', '400', 'cats', true, ''),
                'content'=>$faker->paragraph(6),
                'slug'=>str_slug($title),
                'created_at'=>$faker->dateTime($max = 'now'),
                'updated_at'=>now()
            ]);
        }
    }
}
