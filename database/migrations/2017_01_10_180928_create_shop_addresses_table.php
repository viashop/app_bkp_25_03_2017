<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shop_id')->unsigned()->index();
            $table->foreign('shop_id')->references('id')->on('shops')->onDelete('CASCADE');
			$table->integer('state_id')->unsigned()->index();
			$table->integer('city_id')->unsigned()->index();
			$table->string('address');
			$table->string('code_postal')->nullable();
			$table->string('neighborhood')->nullable();
			$table->string('number')->nullable();
			$table->string('complement')->nullable();
			$table->enum('show_address', array('False','True'))->default('True');
			$table->text('others')->nullable();
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
        Schema::dropIfExists('shop_addresses');
    }
}
