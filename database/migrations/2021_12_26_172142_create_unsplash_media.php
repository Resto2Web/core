<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnsplashMedia extends Migration
{
    public function up()
    {
        Schema::create('unsplash_media', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->morphs('model');
            $table->string('unsplash_id')->nullable();
            $table->string('regular_url')->nullable();
            $table->string('small_url')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('unsplash_media');
    }
}
