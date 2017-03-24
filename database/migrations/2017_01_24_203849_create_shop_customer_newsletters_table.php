<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopCustomerNewslettersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_customer_newsletters', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shop_id')->unsigned()->index();
            $table->foreign('shop_id')->references('id')->on('shops')->onDelete('CASCADE');
			$table->integer('shop_customer_id')->unsigned()->index();
            $table->foreign('shop_customer_id')->references('id')->on('shop_customers')->onDelete('CASCADE');
			$table->boolean('status')->nullable();
			$table->dateTime('timestamp')->nullable();
            $table->timestamps();
			$table->unique(['shop_customer_id','shop_id'], 'shop_customer_newsletters_UNIQUE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_customer_newsletters');
    }
}
