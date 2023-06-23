<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblMultiLanguages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('multi_languages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('type');
            $table->integer('object_id');
            $table->string('lang_code');
            $table->string('name');
            $table->text('desc');
            $table->mediumText('content');
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
        Schema::dropIfExists('multi_languages');
    }
}
