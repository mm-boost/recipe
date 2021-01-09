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
            $table->integer('shop_id');  //新しい購入先を保存するカラム integer=整数型
            $table->string('productname');    //商品名を保存するカラム
            $table->string('amount')->nullable();  //金額を保存するカラム
            $table->string('num')->nullable();  // 品数を保存するカラム
            $table->string('amounttotal')->nullable();  //合計金額を保存するカラム
            $table->string('genre')->nullable();    //分類を保存するカラム
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
        Schema::dropIfExists('shopping_lists');
    }
}
    