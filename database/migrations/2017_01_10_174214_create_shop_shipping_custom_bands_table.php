<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopShippingCustomBandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_shipping_custom_bands', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shop_id')->unsigned()->index();
            $table->foreign('shop_id')->references('id')->on('shops')->onDelete('CASCADE');
            $table->integer('shop_shipping_custom_id')->nullable()->index();
            $table->integer('shop_shipping_custom_regions_id')->nullable()->index();
			$table->string('code_postal_begin');
			$table->string('code_postal_end');
			$table->smallInteger('delivery_time');
            $table->timestamps();
			$table->unique(['shop_shipping_custom_id','shop_shipping_custom_regions_id','code_postal_begin','code_postal_end'], 'bands_code_postal_Unique');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_shipping_custom_bands');
    }
}
