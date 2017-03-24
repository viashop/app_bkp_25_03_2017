<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopPaymentDepositSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_payment_deposit_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shop_id')->unsigned()->index();
            $table->foreign('shop_id')->references('id')->on('shops')->onDelete('CASCADE');
            $table->integer('shop_payment_deposit_id')->unsigned()->index();
            $table->foreign('shop_payment_deposit_id')->references('id')->on('shop_payment_deposits')->onDelete('CASCADE');
            $table->smallInteger('number_bank_default')->nullable();
			$table->enum('active', array('False','True'))->default('False');
			$table->string('agency')->nullable();
			$table->string('number_account')->nullable();
			$table->smallInteger('operation')->nullable();
			$table->string('savings_account')->nullable();
			$table->string('cpf_cnpj')->nullable();
			$table->string('favored')->nullable();
            $table->timestamps();
			$table->unique(['shop_id','shop_payment_deposit_id','number_bank_default'], 'payment_deposit_settings_Unique');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_payment_deposit_settings');
    }
}
