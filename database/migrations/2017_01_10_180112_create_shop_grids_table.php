<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopGridsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_grids', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shop_id')->unsigned()->nullable()->index();
            $table->foreign('shop_id')->references('id')->on('shops')->onDelete('CASCADE');
			$table->string('name');
			$table->string('type')->nullable();
			$table->boolean('default_platform')->default(0);
			$table->timestamps();
			$table->unique(['shop_id','name'], 'shop_grids_name_Unique');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_grids');
    }
}
