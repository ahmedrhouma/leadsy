<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('gender')->nullable();
            $table->string('first_name',100);
            $table->string('last_name',100)->nullable();
            $table->string('email',128)->nullable();
            $table->string('phone_number',32)->nullable();
            $table->char('country',2)->nullable();
            $table->char('language',2)->nullable();
            $table->unsignedTinyInteger('source');
            $table->integer('source_id');
            $table->dateTime('subscription_date');
            $table->tinyInteger('status');
            $table->foreignId('publisher_id')->constrained('publishers');
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
        Schema::dropIfExists('leads');
    }
}
