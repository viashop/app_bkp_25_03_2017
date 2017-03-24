<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopGridVariationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_grid_variations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shop_grid_id')->unsigned()->index();
            $table->foreign('shop_grid_id')->references('id')->on('shop_grids')->onDelete('CASCADE');
            $table->string('name');
            $table->char('hex', 7)->nullable();
            $table->unique(['shop_grid_id','name'], 'shop_grid_variations_name_Unique');
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
        Schema::dropIfExists('shop_grid_variations');
    }
}
