<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopShippingMotoboysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_shipping_motoboys', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shop_id')->unsigned()->index();
            $table->foreign('shop_id')->references('id')->on('shops')->onDelete('CASCADE');
            $table->integer('config_shipping_id')->default(100)->index();
			$table->integer('limit_peso');
			$table->string('region');
			$table->string('code_postal_begin');
			$table->string('code_postal_end');
			$table->integer('delivery_deadline');
			$table->decimal('price', 10,2);
			$table->timestamps();
			$table->unique(['shop_id','config_shipping_id','region','limit_peso','code_postal_begin','code_postal_end'], 'motoboys_config_shipping_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_shipping_motoboys');
    }
}
