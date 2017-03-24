<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shop_id')->unsigned()->index();
            $table->foreign('shop_id')->references('id')->on('shops')->onDelete('CASCADE');
			$table->integer('payment_plan_id')->unsigned()->index()->default(1);
			$table->integer('shop_invoice_reference_id')->unsigned()->index()->nullable();
			$table->integer('payment_invoice_situation_id')->unsigned()->index()->nullable();
			$table->decimal('value', 10, 3)->nullable();
			$table->decimal('discount', 10, 3)->nullable();
			$table->char('date_day', 2)->nullable();
			$table->date('date_month_begin')->nullable();
			$table->date('date_month_end')->nullable();
			$table->string('periodicity')->nullable();
			$table->string('token')->nullable();
			$table->boolean('status')->default(0);
			$table->enum('invoice_type', array('AUTOMATIC','MANUAL'))->nullable();
            $table->timestamps();
			$table->unique(['shop_id','shop_invoice_reference_id'], 'shop_invoice_Unique');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_invoices');
    }
}
