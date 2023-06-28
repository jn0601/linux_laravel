<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->string('name');
            $table->text('desc');
            $table->mediumText('content');
            $table->string('image');
            $table->double('price');
            $table->double('price_sale');
            $table->integer('count_view');
            $table->integer('display_order');
            $table->smallInteger('options');
            $table->smallInteger('status');
            $table->smallInteger('display_menu');
            $table->integer('date_created');
            $table->string('seo_name');
            $table->string('tags');
            $table->string('meta_title');
            $table->text('meta_desc');
            $table->text('meta_keyword');
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
