<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThematicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thematics', function (Blueprint $table) {
            $table->id();
            $table->string('name',100);
            $table->tinyInteger('status');
            $table->timestamps();
            $table->date('end_date')->nullable();
            $table->date('start_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('thematics');
    }
}
