<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopCartProductDescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_cart_product_descriptions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shop_cart_id')->unsigned()->index();
            $table->foreign('shop_cart_id')->references('id')->on('shop_carts')->onDelete('CASCADE');
            $table->integer('shop_product_id')->unsigned()->index();
            $table->foreign('shop_product_id')->references('id')->on('shop_products')->onDelete('CASCADE');
			$table->decimal('price', 10, 3)->nullable();
			$table->smallInteger('quantity')->nullable();
			$table->string('session_id')->nullable();
			$table->integer('status')->nullable();
			$table->string('key')->nullable();
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
        Schema::dropIfExists('shop_cart_product_descriptions');
    }
}
