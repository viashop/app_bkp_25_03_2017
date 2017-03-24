<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_customers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shop_id')->unsigned()->index();
            $table->foreign('shop_id')->references('id')->on('shops')->onDelete('CASCADE');
			$table->integer('shop_customer_group_id')->nullable()->unsigned();
			$table->enum('type_registration', array('PF','PJ'))->nullable();
			$table->string('email')->nullable();
			$table->string('password')->nullable();
			$table->boolean('active')->default(0);
			$table->string('verification_token')->nullable();
			$table->boolean('registered_via_oauth')->default(0);
			$table->string('remember_token')->nullable();
			$table->boolean('receive_offer_shop')->nullable();
			$table->boolean('receive_offer_shopping')->nullable();
			$table->unique(['shop_id','email'], 'shop_customers_email_UNIQUE');
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
        Schema::dropIfExists('shop_customers');
    }
}
