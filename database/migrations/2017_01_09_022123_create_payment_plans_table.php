<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_plans', function (Blueprint $table) {
            $table->increments('id');
			$table->decimal('price', 10)->nullable();
			$table->decimal('of_price', 10)->nullable();
			$table->decimal('per_price', 10)->nullable();
			$table->string('status', 45)->default('1');
			$table->string('products', 45)->nullable();
			$table->string('visits', 45)->nullable();
			$table->string('email', 45)->nullable();
			$table->smallInteger('traffic')->nullable();
			$table->char('bytes', 20)->nullable();
			$table->smallInteger('commission')->default(0);
			$table->boolean('active')->default(1);
			$table->decimal('discount', 10)->nullable();
			$table->decimal('price_per_product', 10)->nullable();
			$table->decimal('price_per_gb', 10)->nullable();
			$table->enum('team_support', array('N','S'))->default('S');
			$table->enum('team_marketing', array('N','S'))->default('S');
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
        Schema::dropIfExists('payment_plans');
    }
}
