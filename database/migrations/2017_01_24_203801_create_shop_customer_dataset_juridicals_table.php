<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopCustomerDatasetJuridicalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_customer_dataset_juridicals', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('shop_customer_id')->unsigned()->index();
            $table->foreign('shop_customer_id')->references('id')->on('shop_customers')->onDelete('CASCADE');
			$table->integer('gender_id')->default(3);
			$table->string('name', 128);
			$table->string('cnpj', 32)->nullable();
			$table->string('property_name', 128)->nullable();
			$table->string('inscription_state', 45)->nullable();
			$table->string('responsible', 128)->nullable();
			$table->enum('information_tributary', array('contributor_icms','not_contributor','free_of_state_registration'))->nullable();
			$table->string('phone_contact', 32)->nullable();
			$table->string('phone_cell', 32)->nullable();
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
        Schema::dropIfExists('shop_customer_dataset_juridicals');
    }
}
