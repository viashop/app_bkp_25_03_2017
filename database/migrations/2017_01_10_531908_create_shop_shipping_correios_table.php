<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopShippingCorreiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_shipping_correios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shop_id')->unsigned()->index();
            $table->foreign('shop_id')->references('id')->on('shops')->onDelete('CASCADE');
			$table->integer('config_shipping_id')->unsigned()->index();
			$table->enum('active', array('False','True'))->default('True');
			$table->string('code_postal_origin');
			$table->integer('deadline_additional')->nullable();
			$table->enum('rate_type', array('porcentagem','fixo'))->default('fixo');
			$table->decimal('rate_price', 10)->nullable();
			$table->enum('with_contract', array('False','True'))->default('False');
			$table->integer('code_service');
			$table->string('code')->nullable();
			$table->string('password')->nullable();
			$table->enum('own_hand', array('N','S'))->default('N');
			$table->enum('declared_value', array('N','S'))->default('N');
			$table->enum('notice_receipt', array('N','S'))->default('N');
			$table->unique(['shop_id','config_shipping_id'], 'shop_shipping_correios_UNIQUE');
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
        Schema::dropIfExists('shop_shipping_correios');
    }
}
