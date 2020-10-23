<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lists=['Hakkımızda', 'Kariyer', 'Vizyonumuz', 'Misyonumuz'];
        $count = 0;

        foreach ($lists as $list) {
            $count++;
            DB::table('pages')->insert([
                'title'=>$list,
                'image'=>'https://images.app.goo.gl/69dqC6A1vT7k5hrx6',
                'content'=>"sdfjksdhf hsdjkfhsdjkhf sdhfjkhsdjfk hdsjkf hjkdshf jksdhfj khsdk hf",
                'slug'=>Str::slug($list,"-"),
                'order'=>$count,
                'created_at'=>now(),
                'updated_at'=>now()
            ]);
        }
    }
}
