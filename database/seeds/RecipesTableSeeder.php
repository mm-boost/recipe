<?php

use Illuminate\Database\Seeder;

class RecipesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 一旦中身を削除する
        DB::table('recipes')->delete();
 
        DB::table('recipes')->insert([
          'menu	' => 'サバ缶の炊き込みご飯'
        ]);
 
        DB::table('campuses')->insert([
          'menu' => 'ごま卵焼き'
        ]);
    }
}
