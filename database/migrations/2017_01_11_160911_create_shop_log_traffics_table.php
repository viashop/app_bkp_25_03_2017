<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopLogTrafficsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_log_traffics', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shop_id')->unsigned()->index();
            $table->foreign('shop_id')->references('id')->on('shops')->onDelete('CASCADE');
			$table->integer('bytes')->nullable();
			$table->string('http_referer')->nullable();
			$table->string('http_user_agent')->nullable();
			$table->string('url')->nullable();
			$table->string('ip')->nullable();
			$table->string('timestamp')->nullable();
			$table->timestamps();
			$table->unique(['shop_id','http_user_agent','timestamp','url'], 'log_traffics_time_unique');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_log_traffics');
    }
}
