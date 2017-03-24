<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopShippingCustomRegionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_shipping_custom_regions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shop_shipping_custom_id')->unsigned()->index();
            $table->foreign('shop_shipping_custom_id', 'shop_shipping_custom_regions_foreign_fk_1')->references('id')->on('shop_shipping_customs')->onDelete('CASCADE');
			$table->string('pais')->nullable();
			$table->string('name');
			$table->decimal('ad_valorem', 10,3)->nullable();
			$table->decimal('kg_additional', 10,3)->nullable();
            $table->timestamps();
			$table->unique(['shop_shipping_custom_id','name'], 'regions_name_Unique');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_shipping_custom_regions');
    }
}
