<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopSocialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_socials', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shop_id')->unsigned()->index();
            $table->foreign('shop_id')->references('id')->on('shops')->onDelete('CASCADE');
			$table->string('facebook')->nullable();
			$table->string('twitter')->nullable();
			$table->string('pinterest')->nullable();
			$table->string('instagram')->nullable();
			$table->string('google_plus')->nullable();
			$table->string('youtube')->nullable();
			$table->string('skype', 45)->nullable();
			$table->string('whatsapp', 45)->nullable();
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
        Schema::dropIfExists('shop_socials');
    }
}
