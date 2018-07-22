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
            $table->longText('body')->nullable()->default(null);
            $table->string('image')->nullable();
            $table->longText('contacts')->nullable()->default(null);
            $table->string('city', 50)->nullable()->default(null);
            $table->longText('urls')->nullable()->default(null);
            $table->longText('address')->nullable()->default(null);
            $table->longText('emails')->nullable()->default(null);
            $table->boolean('is_active', 1)->nullable()->default(null);
            $table->timestamp('approved_at')->nullable()->default(null);
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
