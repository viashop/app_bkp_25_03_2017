<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrazilianCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brazilian_cities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->integer('codigo_ibge')->unsigned();
            $table->integer('estado_id')->unsigned()->index();
            $table->integer('populacao_2010');
            $table->string('densidade_demo');
            $table->string('area');
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
        Schema::dropIfExists('brazilian_cities');
    }
}
