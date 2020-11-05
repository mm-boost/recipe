<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShoppingListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shopping_lists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('productname');    //商品名を保存するカラム
            $table->string('amount')->nullable();  //金額を保存するカラム
            $table->string('num')->nullable();  // 品数を保存するカラム
            $table->string('amounttotal')->nullable();  //合計金額を保存するカラム
            $table->string('genre');    //分類を保存するカラム
            $table->string('retailer')->nullable();  //購入先を保存するカラム
            $table->string('favorite')->default(false);  // お気に入りか否かを保存するカラム.デフォルト値を設定。
            $table->string('image_path')->nullable();  // 画像のパスを保存するカラム
            $table->string('memo')->nullable();  //メモを保存するカラム

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */

    public function down()
    {
        Schema::table('shopping_lists', function (Blueprint $table) {
            $table->dropColumn('amount');
            $table->dropColumn('num');
            $table->dropColumn('amounttotal');
            $table->dropColumn('retailer');
            $table->dropColumn('image_path');
            $table->dropColumn('memo');
        });
    }
}
    