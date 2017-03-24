<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopBrandsTable extends Migration
{
    /**
     * Run the migr ations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_brands', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shop_id')->unsigned()->index();
            $table->foreign('shop_id')->references('id')->on('shops')->onDelete('CASCADE');
			$table->enum('active', array('False','True'))->default('True')->index();
			$table->enum('featured', array('False','True'))->default('False')->index();
			$table->string('name')->nullable();
			$table->string('alias')->nullable();
			$table->string('url')->nullable();
			$table->text('description')->nullable();
			$table->string('logo')->nullable();
            $table->timestamps();
            $table->unique(['shop_id','name'], 'name_brands_UNIQUE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_brands');
    }
}
