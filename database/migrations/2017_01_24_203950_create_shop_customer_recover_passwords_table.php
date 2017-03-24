<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopCustomerRecoverPasswordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_customer_recover_passwords', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('shop_customer_id')->unsigned()->index();
            $table->foreign('shop_customer_id')->references('id')->on('shop_customers')->onDelete('CASCADE');
			$table->string('hash');
			$table->boolean('status')->default(0);
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
        Schema::dropIfExists('shop_customer_recover_passwords');
    }
}
