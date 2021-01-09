<?php

use Illuminate\Database\Seeder;
use App\Keyword;

class KeywordsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('keywords')->delete();
        $keywords = ['お手軽','作り置き','低糖質・高タンパク','節約','その他'];
        foreach($keywords as $keyword){
            Keyword::create(["keyword"=>$keyword]);
        }    
    }
}
