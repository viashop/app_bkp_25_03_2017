<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopShippingPersonalliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_shipping_personallies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shop_id')->unsigned()->index();
            $table->foreign('shop_id')->references('id')->on('shops')->onDelete('CASCADE');
            $table->integer('config_shipping_id')->default(300)->index();
            $table->string('region')->nullable();
			$table->string('code_postal_begin')->nullable();
			$table->string('code_postal_end')->nullable();
            $table->timestamps();
			$table->unique(['shop_id','config_shipping_id','region','code_postal_begin','code_postal_end'], 'personallies_config_shipping_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_shipping_personallies');
    }
}
