<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopPaymentDepositsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_payment_deposits', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shop_id')->unsigned()->index();
            $table->foreign('shop_id')->references('id')->on('shops')->onDelete('CASCADE');
            $table->integer('config_payment_id')->unsigned()->index();
			$table->integer('shop_payment_id')->unsigned()->index();
            $table->foreign('shop_payment_id')->references('id')->on('shop_payments')->onDelete('CASCADE');
            $table->string('email_checking_copy')->nullable();
			$table->enum('discount', array('on'))->nullable();
			$table->decimal('discount_value', 10,3)->nullable();
			$table->text('information_complement')->nullable();
			$table->enum('apply_to_total', array('on'))->nullable();
            $table->timestamps();
			$table->unique(['shop_id','config_payment_id','shop_payment_id'], 'payment_deposits_Unique');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_payment_deposits');
    }
}
