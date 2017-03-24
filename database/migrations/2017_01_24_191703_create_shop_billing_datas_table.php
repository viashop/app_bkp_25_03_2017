<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopBillingDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_billing_datas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shop_id')->unsigned()->index();
            $table->foreign('shop_id')->references('id')->on('shops')->onDelete('CASCADE');
			$table->enum('type', array('PF','PJ'))->nullable();
			$table->string('email_electronic_invoice')->nullable();
			$table->string('responsible_name')->nullable();
			$table->string('social_name')->nullable();
			$table->string('cpf', 45)->nullable();
			$table->string('cnpj', 45)->nullable();
			$table->string('phone_contact', 32)->nullable();
			$table->string('phone_cell', 32)->nullable();
			$table->string('address')->nullable();
			$table->string('complement')->nullable();
			$table->string('neighborhood')->nullable();
			$table->string('code_postal', 10)->nullable();
			$table->integer('state_id')->nullable();
			$table->integer('city_id')->nullable();
			$table->string('payment_form')->nullable();
			$table->string('number_card')->nullable();
			$table->string('name_card')->nullable();
			$table->string('cvv_card')->nullable();
			$table->smallInteger('month_expiration_card')->nullable();
			$table->smallInteger('year_expiration_card')->nullable();
			$table->boolean('edit_card')->nullable();
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
        Schema::dropIfExists('shop_billing_datas');
    }
}
