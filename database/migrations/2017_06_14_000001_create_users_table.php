<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('role_id');
            $table->foreign('role_id')->references('id')->on('roles');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');

            $table->longText('about')->nullable()->default(null);
            $table->string('image')->nullable()->default(null);
            $table->string('mobile')->nullable()->default(null);
            $table->string('street')->nullable()->default(null);
            $table->string('pincode')->nullable()->default(null);
            $table->string('city')->nullable()->default(null);
            $table->string('state')->nullable()->default(null);
            $table->longText('social_links')->nullable()->default(null);

            $table->string('verification_code')->unique();
            $table->timestamp('verified_at')->nullable()->default(null);
            $table->timestamp('blocked_at')->nullable()->default(null);
            $table->timestamp('last_login')->nullable()->default(null);
            $table->boolean('is_super_admin')->default(0);
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
