<?php

use Illuminate\Database\Seeder;

class ShopsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shops')->delete();
        DB::unprepared("ALTER TABLE shops AUTO_INCREMENT = 1 ");
 
        DB::table('shops')->insert([
          'name' => 'イオン',
        ]);
        DB::table('shops')->insert([
          'name' => 'いなげや',
        ]);
      }
}
