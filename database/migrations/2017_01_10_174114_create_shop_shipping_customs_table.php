<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopShippingCustomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_shipping_customs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shop_id')->unsigned()->index();
            $table->foreign('shop_id')->references('id')->on('shops')->onDelete('CASCADE');
            $table->integer('config_shipping_id')->nullable()->default(400)->index();
            $table->enum('active', array('False','True'))->nullable();
			$table->string('name');
			$table->integer('add_deadline')->nullable();
			$table->enum('rate_type', array('fixe','percentage'))->nullable();
			$table->decimal('rate_value', 10,2);
			$table->string('image')->nullable();
            $table->timestamps();
			$table->unique(['shop_id','name'], 'customs_name_Unique');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_shipping_customs');
    }
}
