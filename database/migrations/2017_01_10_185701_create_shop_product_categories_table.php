<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopProductCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_product_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shop_product_id')->unsigned()->index();
            $table->foreign('shop_product_id')->references('id')->on('shop_products')->onDelete('CASCADE');
			$table->integer('category_id')->unsigned()->index();
			$table->enum('category_primary', array('True'))->nullable();
			$table->enum('category_secondary', array('True'))->nullable();
			$table->integer('parent_id')->unsigned()->default(0);
			$table->integer('position')->unsigned()->default(0);
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
        Schema::dropIfExists('shop_product_categories');
    }
}
