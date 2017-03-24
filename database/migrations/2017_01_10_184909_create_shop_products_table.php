<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shop_id')->unsigned()->index();
            $table->foreign('shop_id')->references('id')->on('shops')->onDelete('CASCADE');
            $table->integer('brand_id')->unsigned()->index();
			$table->integer('parente_id')->unsigned()->index()->default(0);
			$table->enum('status_parente_id', array('False','True'))->default('True');
			$table->enum('type', array('attribute','normal'))->nullable();
			$table->enum('active', array('False','True'))->default('True')->index();
			$table->enum('trash', array('True','False'))->default('False');
			$table->date('date_trash')->nullable();
			$table->enum('used', array('False','True'))->default('False');
			$table->enum('featured', array('False','True'))->default('False');
			$table->string('name')->index();
			$table->string('alias')->nullable();
			$table->string('url')->nullable();
			$table->string('sku')->nullable();
			$table->string('ncm')->nullable();
			$table->enum('price_on_request', array('True'))->nullable();
			$table->decimal('price_cost', 10,3)->nullable()->index();
			$table->decimal('price_full', 10,3)->nullable()->index();
			$table->decimal('price_promotional', 10,3)->nullable()->index();
			$table->string('search_brand')->nullable();
			$table->string('search_category')->nullable();
			$table->string('url_video_youtube')->nullable();
			$table->text('description_full')->nullable();
			$table->string('title')->nullable();
			$table->string('description')->nullable();
			$table->decimal('peso', 10, 3)->nullable();
			$table->integer('height')->nullable();
			$table->integer('width')->nullable();
			$table->integer('length')->nullable();
			$table->enum('managed', array('False','True'))->default('False')->index();
			$table->integer('situation_in_stock')->nullable();
			$table->integer('quantity')->nullable();
			$table->integer('reserved')->default(0);
			$table->integer('total_sold')->default(0);
			$table->integer('situation_without_stock')->nullable();
			$table->enum('rename_image', array('False','True'))->default('False');
			$table->enum('type_import_xls', array('insert','update'))->nullable();
			$table->enum('product_sex_shop', array('False','True'))->default('False');
			$table->string('product_key')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->unique(['shop_id','sku'], 'products_sku_Unique');
        });

        \DB::statement('ALTER TABLE shop_products ADD FULLTEXT full_name(name)');
        \DB::statement('ALTER TABLE shop_products ADD FULLTEXT full_name_description(name, description_full)');
        \DB::statement('ALTER TABLE shop_products ADD FULLTEXT full_use_search_internal_app(name, description_full, url, sku)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_products');
    }
}
