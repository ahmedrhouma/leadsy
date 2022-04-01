<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->string('name',100);
            $table->string('countries');
            $table->integer('leads_volume');
            $table->integer('leads_vmax');
            $table->decimal('selling_price');
            $table->foreignId('thematic_id')->constrained('thematics');
            $table->foreignId('leads_type_id')->constrained('leads_types');
            $table->foreignId('cost_type_id')->constrained('cost_types');
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
        Schema::dropIfExists('offers');
    }
}
