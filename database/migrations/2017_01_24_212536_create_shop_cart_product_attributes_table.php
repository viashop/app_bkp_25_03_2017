<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopCartProductAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_cart_product_attributes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shop_cart_product_description_id')->unsigned()->index('cart_shop_product_description_id_index');
            $table->foreign('shop_cart_product_description_id', 'shop_cart_product_attributes_fk_1')->references('id')->on('shop_cart_product_descriptions')->onDelete('CASCADE');
            $table->integer('shop_product_id')->unsigned()->index('cart_shop_product_id_index');
            $table->foreign('shop_product_id', 'shop_cart_product_attributes_fk_2')->references('id')->on('shop_products')->onDelete('CASCADE');
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
        Schema::dropIfExists('shop_cart_product_attributes');
    }
}
