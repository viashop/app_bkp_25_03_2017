<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigShippingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('config_shippings', function (Blueprint $table) {
            $table->increments('id');
			$table->char('title', 30);
			$table->string('logo', 45)->nullable();
			$table->char('id_js', 20)->nullable();
			$table->enum('checked', array('checked="checked"'))->nullable();
			$table->enum('configuration', array('precisa_configuracao'))->nullable();
			$table->boolean('active')->nullable()->default(1);
			$table->string('slug')->nullable();
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
        Schema::dropIfExists('config_shippings');
    }
}
