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
            $table->integer('role_id')->unsigned()->default('2');
            $table->string('name');
            $table->string('email', 100)->unique();
            $table->string('password');
            $table->string('phone')->nullable();
            $table->longText('address')->nullable();
            $table->boolean('is_blocked')->default(false);
            $table->timestamp('verified_at')->nullable()->default(null);
            $table->boolean('is_super_admin')->default(false);
            $table->rememberToken();
            $table->softDeletes();
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
        Schema::dropIfExists('users');
    }
}
