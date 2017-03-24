<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopCustomerOauthTwitterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_customer_oauth_twitter', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('shop_customer_id')->unsigned()->index();
            $table->foreign('shop_customer_id')->references('id')->on('shop_customers')->onDelete('CASCADE');
			$table->string('auth_twitter')->nullable();
			$table->string('auth_name')->nullable();
			$table->string('auth_picture')->nullable();
			$table->string('auth_biography')->nullable();
			$table->string('auth_location')->nullable();
			$table->string('auth_site')->nullable();
			$table->string('auth_url_twitter')->nullable();
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
        Schema::dropIfExists('shop_customer_oauth_twitters');
    }
}
