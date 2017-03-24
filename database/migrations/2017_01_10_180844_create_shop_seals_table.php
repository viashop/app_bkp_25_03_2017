<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopSealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_seals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shop_id')->unsigned()->index();
            $table->foreign('shop_id')->references('id')->on('shops')->onDelete('CASCADE');
            $table->text('seal_ebit')->nullable();
			$table->text('banner_ebit')->nullable();
			$table->enum('seal_google_safe', array('off','on'))->default('off');
			$table->enum('seal_norton_secured', array('off','on'))->default('off');
			$table->enum('seal_seomaster', array('off','on'))->default('on');
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
        Schema::dropIfExists('shop_seals');
    }
}
