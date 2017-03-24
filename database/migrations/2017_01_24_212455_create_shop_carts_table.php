<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_carts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shop_id')->unsigned()->index();
            $table->foreign('shop_id')->references('id')->on('shops')->onDelete('CASCADE');
            $table->integer('shop_customer_id')->unsigned()->index();
            $table->foreign('shop_customer_id')->references('id')->on('shop_customers')->onDelete('CASCADE');
            $table->integer('config_shipping_id')->unsigned()->index();
            $table->integer('shop_coupon_id')->unsigned()->index();
			$table->string('cookie_session_id')->nullable()->unique('session_id_Unique');
            $table->decimal('price_shipping')->nullable();
			$table->string('code_postal')->nullable();
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
        Schema::dropIfExists('shop_carts');
    }
}
