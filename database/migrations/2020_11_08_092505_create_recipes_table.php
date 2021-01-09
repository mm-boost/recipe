<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipes', function (Blueprint $table) { //ここのテーブル名の記述は重要。間違えば、間違った名前がデータベースに記述される
            $table->bigIncrements('id')->unique();
            $table->integer('category_id');
            $table->integer('tool_id');  
            $table->integer('keyword_id'); 
            $table->string('menu');   //メニュー名を保存するカラム
            $table->integer('people');  //人数を保存するカラム
            $table->integer('foodname_id')->nullable();  //材料名を保存するカラム
            $table->integer('foodnum_id')->nullable(); //数量を保存するカラム
            $table->integer('unit_id')->nullable();  //単位を保存するカラム
            $table->string('howto')->nullable();  //作り方を保存するカラム
            $table->string('image_path')->nullable(); //画像のパスを保存するカラム
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
        Schema::dropIfExists('recipes');
    }
}