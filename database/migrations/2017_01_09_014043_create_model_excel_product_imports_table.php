<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModelExcelProductImportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('model_excel_product_imports', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sku', 45)->nullable();
			$table->string('parent_sku', 45)->nullable();
			$table->string('active', 45)->nullable();
			$table->string('condition', 45);
			$table->string('name', 128);
			$table->string('description')->nullable();
			$table->string('availability_when_no_to_manage_stock', 128)->nullable();
			$table->string('manage_inventory', 128)->nullable();
			$table->smallInteger('quantity')->nullable();
			$table->smallInteger('availability_two_products_in_stock')->nullable();
			$table->smallInteger('availability_when_end_products_in_stock')->nullable();
			$table->decimal('price_cost', 10)->nullable();
			$table->decimal('price_for_sale', 10)->nullable();
			$table->decimal('promotional_price', 10)->nullable();
			$table->string('category_level_1', 128)->nullable();
			$table->string('category_level_2', 128)->nullable();
			$table->string('category_level_3', 128)->nullable();
			$table->string('brand', 128)->nullable();
			$table->decimal('peso_kg', 10, 3)->nullable();
			$table->smallInteger('height_cm')->nullable();
			$table->smallInteger('width_cm')->nullable();
			$table->smallInteger('length_cm')->nullable();
			$table->string('link_to_the_main_photo', 128)->nullable();
			$table->string('link_to_additional_photo_1', 128)->nullable();
			$table->string('link_to_additional_photo_2', 128)->nullable();
			$table->string('link_to_additional_photo_3', 128)->nullable();
			$table->string('url_old_product', 128)->nullable();
			$table->string('video_link_on_youtube', 128)->nullable();
			$table->string('size_of_tenis', 128)->nullable();
			$table->string('product_with_a_color', 128)->nullable();
			$table->string('helmet_size', 128)->nullable();
			$table->string('size_of_calca', 128)->nullable();
			$table->string('product_with_two_colors', 128)->nullable();
			$table->string('voltage', 128)->nullable();
			$table->string('shirt_size', 128)->nullable();
			$table->string('ring_alliance_size', 128)->nullable();
			$table->string('genre', 128)->nullable();
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
        Schema::dropIfExists('model_excel_product_imports');
    }
}
