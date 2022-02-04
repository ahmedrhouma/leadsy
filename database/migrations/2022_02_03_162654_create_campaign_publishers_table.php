<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampaignPublishersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaign_publishers', function (Blueprint $table) {
            $table->id();
            $table->decimal('buying_price');
            $table->unsignedTinyInteger('status');
            $table->date('start_date');
            $table->date('end_date');
            $table->foreignId('publisher_id')->constrained('publishers');
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
        Schema::dropIfExists('campaign_publishers');
    }
}
