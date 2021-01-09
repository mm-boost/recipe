<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // 各テーブルへのデータの流し込みを呼び出す
        // $this->call(UsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(ToolsTableSeeder::class);
        $this->call(KeywordsTableSeeder::class);
        $this->call(FoodsTableSeeder::class);
        $this->call(RecipesTableSeeder::class);
        $this->call(FoodsTableSeeder::class);
        $this->call(Shopping_listsTableSeeder::class);
        $this->call(ShopsTableSeeder::class);
    }
}
