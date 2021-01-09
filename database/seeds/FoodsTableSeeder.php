<?php

use Illuminate\Database\Seeder;

class FoodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 一旦中身を削除する
        DB::table('foods')->delete();

        DB::table('foods')->insert([
            'foodname' => '卵',
            'foodnum' => 2,
            'unit' => '個',
            'recipe_id' => 1
          ]);
          DB::table('foods')->insert([
            'foodname' => '醤油',
            'unit' => '適量',
            'recipe_id' => 1
          ]);
          DB::table('foods')->insert([
            'foodname' => 'ごま油',
            'unit' => '適量',
            'recipe_id' => 1
          ]);
          DB::table('foods')->insert([
            'foodname' => 'チョコレート',
            'foodnum' => 200,
            'unit' => 'g',
            'recipe_id' => 2
          ]);
          DB::table('foods')->insert([
            'foodname' => '生クリーム',
            'foodnum' => 100,
            'unit' => 'cc',
            'recipe_id' => 2
          ]);
          DB::table('foods')->insert([
            'foodname' => 'ココアパウダー',
            'unit' => '適量',
            'recipe_id' => 2
          ]);

    }
}
