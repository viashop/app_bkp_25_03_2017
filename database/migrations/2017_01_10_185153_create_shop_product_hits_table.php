<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopProductHitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_product_hits', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shop_id')->unsigned()->index();
            $table->foreign('shop_id')->references('id')->on('shops')->onDelete('CASCADE');
            $table->integer('shop_product_id')->unsigned()->index();
            $table->foreign('shop_product_id')->references('id')->on('shop_products')->onDelete('CASCADE');
			$table->integer('hits')->default(0)->index();
            $table->timestamps();
            $table->unique(['shop_product_id','shop_id'], 'shop_product_hits_Unique');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_product_hits');
    }
}
