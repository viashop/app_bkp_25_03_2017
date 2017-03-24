<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopPaymentFacilitatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_payment_facilitators', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shop_id')->unsigned()->index();
            $table->foreign('shop_id')->references('id')->on('shops')->onDelete('CASCADE');
            $table->integer('config_payment_id')->nullable()->index();
			$table->integer('shop_payment_id')->unsigned()->index();
            $table->foreign('shop_payment_id')->references('id')->on('shop_payments')->onDelete('CASCADE');
			$table->string('user')->nullable();
			$table->string('token')->nullable();
			$table->decimal('minimum_acceptable_value', 10)->nullable();
			$table->decimal('minimum_acceptable_parcel', 10)->nullable();
			$table->enum('show_parcelation', array('on'))->nullable();
			$table->smallInteger('maximum_parcels')->nullable();
			$table->smallInteger('parcels_without_interest')->nullable();
			$table->enum('li_msg', array('on'))->nullable();
            $table->timestamps();
			$table->unique(['shop_id','shop_payment_id','config_payment_id'], 'payment_facilitators_Unique');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_payment_facilitators');
    }
}
