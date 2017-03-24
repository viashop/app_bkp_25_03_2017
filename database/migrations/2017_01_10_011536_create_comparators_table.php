<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComparatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comparators', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('url')->nullable();
            $table->string('img');
            $table->enum('active', ['True', 'False'])->default('True');
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
        Schema::dropIfExists('comparators');
    }
}
