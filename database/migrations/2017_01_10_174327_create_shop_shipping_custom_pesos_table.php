<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopShippingCustomPesosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_shipping_custom_pesos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shop_id')->unsigned()->index();
            $table->foreign('shop_id')->references('id')->on('shops')->onDelete('CASCADE');
			$table->integer('shop_shipping_custom_id')->unsigned()->index();
            $table->foreign('shop_shipping_custom_id', 'shop_shipping_custom_pesos_fk_1')->references('id')->on('shop_shipping_customs')->onDelete('CASCADE');
			$table->integer('shop_shipping_custom_region_id')->unsigned()->index();
            $table->foreign('shop_shipping_custom_region_id', 'shop_shipping_custom_pesos_fk_2')->references('id')->on('shop_shipping_custom_regions')->onDelete('CASCADE');
			$table->decimal('peso_begin', 10, 3);
			$table->decimal('peso_end', 10, 3);
			$table->decimal('price', 10, 3);
            $table->timestamps();
			$table->unique(['shop_id','shop_shipping_custom_id','peso_begin','peso_end'], 'custom_pesos_band_peso_Unique');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_shipping_custom_pesos');
    }
}
