<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopCustomerAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_customer_addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shop_customer_id')->unsigned()->index();
            $table->foreign('shop_customer_id')->references('id')->on('shop_customers')->onDelete('CASCADE');
			$table->integer('state_id')->unsigned()->index();
			$table->integer('city_id')->unsigned()->index();
			$table->string('address')->nullable();
			$table->string('code_postal')->nullable();
			$table->string('neighborhood')->nullable();
			$table->string('number')->nullable();
			$table->string('complement')->nullable();
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
        Schema::dropIfExists('shop_customer_addresses');
    }
}
