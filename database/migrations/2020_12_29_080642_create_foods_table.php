<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foods', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->bigInteger('recipe_id')->unsigned();
            $table->string('foodname')->nullable();
            $table->string('foodnum')->nullable();
            $table->string('unit')->nullable();
            $table->timestamps();
            //recipeテーブルと連動削除設定 foreign；外部DBのテーブルと連動。recipeテーブルのidカラムを参照するfoodテーブルのrecipe_id
            $table->foreign('recipe_id')->references('id')->on('recipes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('foods');
    }
}
