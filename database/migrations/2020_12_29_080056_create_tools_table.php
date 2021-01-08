<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tools', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tool');
            $table->timestamps();
            //recipeテーブルと連動削除設定 foreign；外部DBのテーブルと連動。recipeテーブルのidカラムを参照するテーブルのrecipe_id
            $table->foreign('recipe_id')->references('id')->on('recipes')
            //カスケード削除
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tools');
    }
}
