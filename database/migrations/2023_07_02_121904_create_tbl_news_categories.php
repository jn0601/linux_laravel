<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblNewsCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id');
            $table->string('root_id');
            $table->string('name');
            $table->text('desc');
            $table->mediumText('content');
            $table->smallInteger('level');
            $table->integer('display_order');
            $table->string('image');
            $table->smallInteger('representative');
            $table->smallInteger('status');
            $table->smallInteger('display_menu');
            $table->integer('date_created');
            $table->string('seo_name');
            $table->string('meta_title');
            $table->text('meta_desc');
            $table->text('meta_keyword');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news_categories');
    }
}
