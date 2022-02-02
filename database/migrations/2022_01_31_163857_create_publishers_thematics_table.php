<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublishersThematicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publishers_thematics', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('status');
            $table->string('countries');
            $table->decimal('unit_price')->nullable();
            $table->decimal('sale_percentage')->nullable();
            $table->foreignId('publisher_id')->constrained('publishers');
            $table->foreignId('thematic_id')->constrained('thematics');
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
        Schema::dropIfExists('publishers_thematics');
    }
}
