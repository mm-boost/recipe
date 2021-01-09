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
        DB::unprepared("ALTER TABLE recipes AUTO_INCREMENT = 1 ");
 
        DB::table('recipes')->insert([
          'id' => 1,
          'category_id' => 1,
          'tool_id' => 4,
          'keyword_id' => 4,
          'menu' => '和風卵焼き',
          'people' => 2,
          'howto' => "１、卵をボールに入れ、調味料を混ぜる\n２、フライパンに油をひき、卵液を薄くのばす"
        ]);

        DB::table('recipes')->insert([
          'id' => 2,
          'category_id' => 6,
          'tool_id' => 2,
          'keyword_id' => 1,
          'menu' => '生チョコレート',
          'people' => 1,
          'howto' => "１、耐熱ボールにチョコを割り入れ、生クリームを加え混ぜる\n2、電子レンジで加熱。600W約1分が目安\n3、チョコが溶けたらお好みの容器にラップをしきチョコを流し入れる\n4、冷蔵庫で冷やす。目安は約３時間\n5、一口サイズに切る。お好みでココアパウダーをまぶしてもよし"
        ]);
    }
}
