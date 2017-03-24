<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopCustomerDatasetPhysicalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_customer_dataset_physicals', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('shop_customer_id')->unsigned()->index();
            $table->foreign('shop_customer_id')->references('id')->on('shop_customers')->onDelete('CASCADE');
			$table->integer('gender_id')->nullable();
			$table->string('name')->nullable();
			$table->string('cpf')->nullable();
			$table->date('birth_date')->nullable();
			$table->string('phone_contact')->nullable();
			$table->string('phone_cell')->nullable();
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
        Schema::dropIfExists('shop_customer_dataset_physicals');
    }
}
