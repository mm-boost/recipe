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
        $this->call([
            RecipesTableSeeder::class,
            CategoriesTableSeeder::class,
            ToolsTableSeeder::class,
            KeywordsTableSeeder::class,
            FoodsTableSeeder::class,
            Shopping_listsTableSeeder::class,
            ShopsTableSeeder::class,
        ]);
    }
}
