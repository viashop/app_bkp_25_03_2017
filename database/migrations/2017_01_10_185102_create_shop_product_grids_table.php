<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopProductGridsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_product_grids', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('shop_grid_id')->unsigned()->index();
            $table->foreign('shop_grid_id')->references('id')->on('shop_grids')->onDelete('CASCADE');
			$table->integer('shop_product_id')->unsigned()->index();
            $table->foreign('shop_product_id')->references('id')->on('shop_products')->onDelete('CASCADE');
            $table->timestamps();
            $table->unique(['shop_grid_id','shop_product_id'], 'product_grids_Unique');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_product_grids');
    }
}
