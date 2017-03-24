<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopProductImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_product_images', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shop_produtc_id')->unsigned()->index();
            $table->foreign('shop_produtc_id')->references('id')->on('shop_products')->onDelete('CASCADE');
			$table->string('name_image');
			$table->smallInteger('position')->default(0)->index();
			$table->boolean('status')->default(1);
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
        Schema::dropIfExists('shop_product_images');
    }
}
