<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories=['Python', 'PHP - Laravel', 'Makine Öğrenmesi', 'Veri Yapıları', 'İşletim Sistemleri'];

        foreach ($categories as $category) {
            DB::table('categories')->insert([
                'name'=>$category,
                'slug'=>Str::slug($category,"-")
            ]);
        }
    }
}
