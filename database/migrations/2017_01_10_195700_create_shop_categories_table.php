<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shop_id')->unsigned()->index();
            $table->foreign('shop_id')->references('id')->on('shops')->onDelete('CASCADE');
			$table->integer('config_activities_id')->unsigned()->default(0);
			$table->integer('category_parent_id')->unsigned()->default(0)->index();
			$table->enum('active', array('False','True'))->default('True');
			$table->string('name');
			$table->string('alias')->nullable();
			$table->string('url')->nullable();
			$table->text('description_full')->nullable();
			$table->string('title')->nullable();
			$table->string('description')->nullable();
			$table->integer('position')->unsigned()->default(0)->index();
			$table->integer('nleft')->unsigned()->default(0)->index();
			$table->integer('nright')->unsigned()->index();
			$table->boolean('is_root_category')->default(0);
			$table->timestamps();
			$table->unique(['shop_id','name'], 'categories_name_Unique');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_categories');
    }
}
