<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopShippingRoadCarriersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_shipping_road_carriers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shop_id')->unsigned()->index();
            $table->foreign('shop_id')->references('id')->on('shops')->onDelete('CASCADE');
            $table->integer('config_shipping_id')->default(200)->index();
			$table->string('region');
			$table->string('code_postal_begin');
			$table->string('code_postal_end');
			$table->decimal('peso_begin', 10, 3);
			$table->decimal('peso_end', 10, 3);
			$table->decimal('price', 10, 3);
			$table->smallInteger('delivery_deadline');
			$table->decimal('ad_valorem', 10, 3)->nullable();
			$table->decimal('kg_additional', 10, 3)->nullable();
            $table->timestamps();
            /** $table->unique(['shop_id','region','code_postal_begin','code_postal_end','peso_begin','peso_end'], 'carriers_band_Unique') **/

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_shipping_road_carriers');
    }
}
