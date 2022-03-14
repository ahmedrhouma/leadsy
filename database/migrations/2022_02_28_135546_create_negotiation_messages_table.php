<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNegotiationMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('negotiation_messages', function (Blueprint $table) {
            $table->id();
            $table->text('message_content');
            $table->unsignedTinyInteger('message_status');
            $table->unsignedTinyInteger('pinned')->nullable();
            $table->dateTime('message_sent');
            $table->dateTime('message_read')->nullable();
            $table->foreignId('negotiation_id')->constrained('negotiations');
            $table->foreignId('sender_id')->constrained('users');
            $table->foreignId('receiver_id')->constrained('users');
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('negotiation_messages');
    }
}
