<?php

use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 一旦中身を削除する
        DB::table('settings')->delete();
 
        DB::table('settings')->insert([
            'id' => 1,
            'nickname' => 'ユーザーネーム',
            'gender' => '女性',
            'age' => '20-29歳',
            'aim' => '健康維持',
        ]);
    }
}
