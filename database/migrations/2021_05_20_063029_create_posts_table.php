<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->string('titleEn');
            $table->string('titleAm');
            $table->string('image')->nullable();
            $table->longText('descriptionEn');
            $table->longText('descriptionAm');
            $table->string('duration');
            $table->string('audioEn')->nullable();
            $table->string('audioAm')->nullable();
            $table->string('videoEn')->nullable();
            $table->string('videoAm')->nullable();
            $table->string('group');
            $table->timestamps();

            $table->index('category_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
