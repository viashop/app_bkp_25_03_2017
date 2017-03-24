<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('config_payments', function (Blueprint $table) {
            $table->increments('id');
			$table->string('name', 45);
			$table->string('logo', 45);
			$table->string('id_for', 45);
			$table->char('slug', 45);
			$table->enum('checked', array('checked="checked"'))->nullable();
			$table->boolean('active_wizard')->nullable();
			$table->boolean('active')->default(1);
			$table->enum('card_visa', array('none','greycheck'))->default('greycheck');
			$table->enum('card_master_card', array('none','greycheck'))->default('greycheck');
			$table->enum('card_hipercard', array('none','greycheck'))->nullable();
			$table->enum('bank_itau', array('none','greycheck'))->default('greycheck');
			$table->enum('bank_bradesco', array('none','greycheck'))->default('greycheck');
			$table->enum('bank_bb', array('none','greycheck'))->default('greycheck');
			$table->enum('bill', array('none','greycheck'))->default('greycheck');
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
        Schema::dropIfExists('config_payments');
    }
}
