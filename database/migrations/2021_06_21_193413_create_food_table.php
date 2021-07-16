<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('category_id');
            $table->string('nameAm');
            $table->string('nameEn');
            $table->longText('ingredientsAm');
            $table->longText('ingredientsEn');
            $table->longText('processAm');
            $table->longText('processEn');
            $table->string('image')->nullable();
            $table->string('foodTime');
            $table->string('recommend');
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
        Schema::dropIfExists('food');
    }
}
