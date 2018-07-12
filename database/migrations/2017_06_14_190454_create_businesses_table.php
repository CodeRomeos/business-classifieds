<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('businesses', function (Blueprint $table) {
			$table->increments('id');
			$table->string('businessid')->unique();
            $table->integer('user_id')->unsigned();
            $table->string('title');
            $table->longText('body')->nullable();
            $table->string('image')->nullable();
            $table->string('contacts', 20)->nullable();
            $table->string('city', 50)->nullable();
            $table->json('urls')->nullable();
            $table->longText('address')->nullable();
            $table->string('emails', 60)->nullable();
            $table->boolean('is_active')->default(false);
			$table->boolean('is_approved')->default(false);
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
        Schema::dropIfExists('businesses');
    }
}
