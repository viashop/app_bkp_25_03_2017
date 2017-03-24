<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopLogVisitationUrlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_log_visitation_urls', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shop_log_visitation_id')->unsigned()->index();
            $table->foreign('shop_log_visitation_id')->references('id')->on('shop_log_visitations')->onDelete('CASCADE');
			$table->string('url')->nullable();
			$table->string('referer')->nullable();
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
        Schema::dropIfExists('shop_log_visitation_urls');
    }
}
