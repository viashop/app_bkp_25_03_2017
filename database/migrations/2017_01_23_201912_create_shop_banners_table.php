<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_banners', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shop_id')->unsigned()->index();
            $table->foreign('shop_id')->references('id')->on('shops')->onDelete('CASCADE');
			$table->enum('active', array('False','True'))->nullable()->default('True');
			$table->string('name');
			$table->string('path')->nullable();
			$table->string('local_publication');
			$table->string('page_publication');
			$table->string('link')->nullable();
			$table->enum('target', array('_blank'))->nullable();
			$table->text('title')->nullable();
			$table->text('map_image')->nullable();
			$table->boolean('position')->default(0);
            $table->timestamps();
			$table->unique(['shop_id','name','local_publication'], 'shop_banners_Unique');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_banners');
    }
}
