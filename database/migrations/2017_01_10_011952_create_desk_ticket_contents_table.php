<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeskTicketContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('desk_ticket_contents', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('desk_ticket_id')->unsigned()->index();
            $table->foreign('desk_ticket_id')->references('id')->on('desk_tickets')->onDelete('CASCADE');
            $table->integer('user_id')->unsigned()->index();
            $table->integer('desk_department_id')->unsigned()->index();
            $table->string('subjetc')->nullable();
            $table->text('message')->nullable();
            $table->string('ip')->nullable();
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
        Schema::dropIfExists('desk_ticket_contents');
    }
}
