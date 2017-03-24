<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopInvoiceConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_invoice_configs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shop_id')->unsigned()->index();
            $table->foreign('shop_id')->references('id')->on('shops')->onDelete('CASCADE');
			$table->smallInteger('payment_plan_id')->unsigned()->index()->default(1);
			$table->enum('periodicity', array('ANNUAL','SEMESTRAL','QUARTERLY','MONTHLY'))->default('MONTHLY');
			$table->smallInteger('day_month_free')->default(1);
			$table->smallInteger('day_month_pay')->default(1);
			$table->date('validity_begin')->nullable();
			$table->date('validity_end')->nullable();
			$table->date('date_status_invoice_free')->nullable();
			$table->date('date_status_invoice_pay')->nullable();
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
        Schema::dropIfExists('shop_invoice_configs');
    }
}
