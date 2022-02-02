<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublishersCostTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publishers_cost_types', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('status');
            $table->foreignId('publisher_id')->constrained('publishers');
            $table->foreignId('thematic_id')->constrained('thematics');
            $table->foreignId('cost_type_id')->constrained('cost_types');
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
        Schema::dropIfExists('publishers_cost_types');
    }
}
