<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopProductVariationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_product_variations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shop_produtc_id')->unsigned()->index();
            $table->foreign('shop_produtc_id')->references('id')->on('shop_products')->onDelete('CASCADE');
			$table->integer('shop_grid_id')->unsigned()->index();
            $table->foreign('shop_grid_id')->references('id')->on('shop_grids')->onDelete('CASCADE');
			$table->integer('shop_grid_variation_id')->unsigned()->index();
            $table->foreign('shop_grid_variation_id')->references('id')->on('shop_grid_variations')->onDelete('CASCADE');
			$table->string('name');
			$table->enum('color', array('False','True'))->default('False');
			$table->timestamps();
			$table->unique(['shop_grid_id','shop_grid_variation_id','shop_produtc_id'], 'product_variations_Unique');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_product_variations');
    }
}
