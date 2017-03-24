<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigCorreiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('config_correios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('code')->unsigned()->unique();
			$table->integer('config_shipping_id');
			$table->enum('contract_agreement', array('False','True'));
			$table->string('service', 45);
			$table->string('name', 45);
			$table->enum('default', array('False','True'))->default('False');
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
        Schema::dropIfExists('config_correios');
    }
}
