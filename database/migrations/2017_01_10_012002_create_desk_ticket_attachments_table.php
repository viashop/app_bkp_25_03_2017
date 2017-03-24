<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeskTicketAttachmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('desk_ticket_attachments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('desk_ticket_content_id')->unsigned()->index();
            $table->foreign('desk_ticket_content_id')->references('id')->on('desk_ticket_contents')->onDelete('CASCADE');
            $table->string('attachment');
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
        Schema::dropIfExists('desk_ticket_attachments');
    }
}
