<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblNews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id');
            $table->string('name');
            $table->text('desc');
            $table->mediumText('content');
            $table->string('image');
            $table->integer('display_order');
            $table->smallInteger('status');
            $table->string('options');
            $table->integer('count_view');
            $table->integer('date_created');
            $table->integer('date_updated');
            $table->string('seo_name');
            $table->string('tags');
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
        Schema::dropIfExists('news');
    }
}
