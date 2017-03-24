<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopSlugsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_slugs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shop_id')->unsigned()->index();
            $table->foreign('shop_id')->references('id')->on('shops')->onDelete('CASCADE');
			$table->integer('shop_category_id')->unsigned()->index();
            $table->foreign('shop_category_id')->references('id')->on('shop_categories')->onDelete('CASCADE');
			$table->integer('shop_product_id')->unsigned()->index();
            $table->foreign('shop_product_id')->references('id')->on('shop_products')->onDelete('CASCADE');
			$table->string('base_url')->nullable();
			$table->string('url');
            $table->unique(['shop_id','url'], 'shop_slugs_Unique');
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
        Schema::dropIfExists('shop_slugs');
    }
}
