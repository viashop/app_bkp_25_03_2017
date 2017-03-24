<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopDomainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_domains', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shop_id')->unsigned()->index();
            $table->foreign('shop_id')->references('id')->on('shops')->onDelete('CASCADE');
			$table->string('domain');
			$table->enum('subdomain_platform', array('False','True'))->default('False');
			$table->dateTime('subdomain_add')->nullable();
			$table->string('domain_ssl')->nullable();
			$table->string('domain_maintenance')->nullable();
			$table->enum('ssl_ativo', array('False','True'))->default('False');
			$table->string('physical_uri')->nullable();
			$table->string('virtual_uri');
			$table->boolean('main')->default(0);
			$table->boolean('ativo')->default(1);
			$table->boolean('add_cpanel')->default(0);
			$table->dateTime('date_add_cpanel')->nullable();
			$table->timestamps();
			$table->unique(['domain','physical_uri','virtual_uri'], 'domain_Unique');
			$table->index(['domain','physical_uri','virtual_uri'], 'full_shop_url');
			$table->index(['domain_ssl','physical_uri','virtual_uri'], 'full_shop_url_ssl');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_domains');
    }
}
