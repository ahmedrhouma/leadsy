<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampaignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaigns', function (Blueprint $table) {
            $table->id();
            $table->string('name',100);
            $table->string('countries');
            $table->integer('leads_volume');
            $table->mediumInteger('leads_vmax');
            $table->decimal('cost_amount');
            $table->decimal('fee');
            $table->decimal('selling_price');
            $table->tinyInteger('status');
            $table->foreignId('advertiser_id')->constrained('advertisers');
            $table->foreignId('thematic_id')->constrained('thematics');
            $table->foreignId('leads_type_id')->constrained('leads_types');
            $table->foreignId('cost_type_id')->constrained('cost_types');
            $table->date('start_date');
            $table->date('end_date');
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
        Schema::dropIfExists('campaigns');
    }
}
