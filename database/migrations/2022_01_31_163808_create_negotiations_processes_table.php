<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNegotiationsProcessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('negotiations_processes', function (Blueprint $table) {
            $table->id();
            $table->decimal('selling_price');
            $table->decimal('buying_price');
            $table->tinyInteger('status');
            $table->date('start_date');
            $table->date('end_date');
            $table->foreignId('negotiation_id')->constrained('negotiations');
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
        Schema::dropIfExists('negotiations_processes');
    }
}
