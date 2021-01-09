<?php

use Illuminate\Database\Seeder;

class Shopping_listsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 一旦中身を削除する
        DB::table('shopping_lists')->delete();
 
        DB::table('shopping_lists')->insert([
            'shop_id' => 2,
            'productname' => '卵８パック',
            'amount' => 180,
            'num' => 1,
            'amounttotal' => 180,
            'genre' => '乳製品',
        ]);
        DB::table('shopping_lists')->insert([
            'shop_id' => 1,
            'productname' => '板チョコレート',
            'amount' => 100,
            'num' => 2,
            'amounttotal' => 200,
            'genre' => '嗜好品',
          ]);
          DB::table('shopping_lists')->insert([
            'shop_id' => 1,
            'productname' => '生クリーム',
            'amount' => 280,
            'num' => 1,
            'amounttotal' => 280,
            'genre' => '乳製品',
            'memo' => '豆乳ホイップクリームでも可',
          ]);
    
    }
}
