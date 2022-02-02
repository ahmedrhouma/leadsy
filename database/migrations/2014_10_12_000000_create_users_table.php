<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('username',100);
            $table->string('email')->unique();
            $table->tinyInteger('profile');
            $table->tinyInteger('account_id');
            $table->tinyInteger('role');
            $table->char('language',2);
            $table->string('timezone',64);
            $table->string('browser',255);
            $table->string('ip_address',64);
            $table->dateTime('last_auth');
            $table->string('photo',64);
            $table->tinyInteger('status');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->string('password');
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
