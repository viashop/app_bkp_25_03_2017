<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeskTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('desk_tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shop_id')->unsigned()->index();
            $table->integer('user_id')->unsigned()->index();
            $table->integer('priority_id')->unsigned()->index();
            $table->integer('department_id')->unsigned()->index();
            $table->integer('status_department_id')->unsigned()->index();
            $table->integer('status_user_id')->unsigned()->index();
            $table->boolean('read_department');
            $table->boolean('read_user');
            $table->boolean('last_action');
            $table->timestamp('last_action_timestamp');
            $table->string('hash');
            $table->string('ip');
            $table->boolean('deleted')->default(0);
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
        Schema::dropIfExists('desk_tickets');
    }
}
