<?php

use Illuminate\Database\Seeder;
use App\Category;
class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->delete();
        $categories = ['和食','洋食','中華','肉料理','野菜料理','デザート','ドリンク','アジア料理','ヨーロッパ料理','その他'];
        foreach($categories as $category){
            Category::create(["category"=>$category]);
        }    
     }
}
