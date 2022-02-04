<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampaignsLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaigns_leads', function (Blueprint $table) {
            $table->id();
            $table->integer('rejection');
            $table->integer('sale_status');
            $table->date('sending_date');
            $table->foreignId('lead_id')->constrained('leads');
            $table->foreignId('campaign_id')->constrained('campaigns');
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
        Schema::dropIfExists('campaigns_leads');
    }
}
