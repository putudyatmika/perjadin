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
            $table->string('name',254);
            $table->string('username',50)->unique();
            $table->string('email',254)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('user_level')->nullable()->default(1);
            $table->boolean('pengelola')->nullable()->default(0);
            $table->string('user_unitkerja', 5)->nullable();
            $table->dateTime('lastlogin')->nullable();
            $table->string('lastip', 20)->nullable();
            $table->string('file_profile',254)->nullable();
            $table->rememberToken();
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
