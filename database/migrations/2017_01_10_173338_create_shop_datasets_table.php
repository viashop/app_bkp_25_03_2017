<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopDatasetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_datasets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shop_id')->unsigned()->index();
            $table->foreign('shop_id')->references('id')->on('shops')->onDelete('CASCADE');
			$table->string('name');
			$table->text('description')->nullable();
			$table->string('name_razao_social')->nullable();
			$table->string('name_responsible')->nullable();
			$table->string('cnpj')->nullable();
			$table->string('cpf')->nullable();
			$table->string('email')->nullable();
			$table->string('phone')->nullable();
			$table->string('logo')->nullable();
			$table->string('logo_socials')->nullable();
			$table->string('favicon')->nullable();
			$table->string('background')->nullable();
			$table->enum('shop_type', array('loja','catalogo_sem_preco','catalogo_com_preco','orcamento_com_preco','orcamento_sem_preco'))->nullable()->default('loja');
			$table->enum('copy_data', array('True','False'))->nullable()->default('False');
			$table->integer('active')->default(1);
			$table->enum('enable_mobile', array('False','True'))->nullable()->default('True');
			$table->enum('maintenance', array('False','True'))->nullable()->default('False');
			$table->integer('mumber_order')->nullable()->default(0);
			$table->integer('minimum_order_number')->nullable();
			$table->decimal('order_value_minimo', 10)->nullable();
			$table->enum('value_restricted_product', array('False','True'))->nullable()->default('False');
			$table->enum('manage_customer', array('False','True'))->nullable()->default('False');
			$table->enum('commnets_products', array('False','True'))->nullable()->default('True');
			$table->string('blog')->nullable();
			$table->enum('domain_preference', array('off_www','on_www','undefined'))->nullable()->default('undefined');
			$table->enum('activate_new_plans', array('N','S'))->nullable()->default('N');
			$table->enum('account_canceled', array('False','True'))->nullable()->default('False')->comment('Ativa o cancelamento de conta');
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
        Schema::dropIfExists('shop_datasets');
    }
}
