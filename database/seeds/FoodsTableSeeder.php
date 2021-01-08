<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
          'foodname' => 'サバ缶',
          'foodnum' => 1,
          'unit' => '缶',
          'recipe_id' => 1
        ]);
 
        DB::table('foods')->insert([
            'foodname' => '卵',
            'foodnum' => 2,
            'unit' => '個',
            'recipe_id' => 2
        ]);

        DB::table('foods')->insert([
            'foodname' => '大根',
            'foodnum' => 0.5,
            'unit' => '本',
            'recipe_id' => 1
          ]);
        
        DB::table('foods')->insert([
            'foodname' => 'すりごま',
            'foodnum' => 5,
            'unit' => 'cc',
            'recipe_id' => 2
        ]);

  
    }
}
