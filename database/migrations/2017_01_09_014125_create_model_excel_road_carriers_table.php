<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModelExcelRoadCarriersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('model_excel_road_carriers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('region', 128);
			$table->char('cep_begin', 9);
			$table->char('cep_end', 9);
			$table->decimal('peso_begin', 10, 3);
			$table->decimal('peso_end', 10, 3);
			$table->decimal('value', 10);
			$table->boolean('delivery_time');
			$table->decimal('ad_valorem', 10)->nullable();
			$table->decimal('kg_additional', 10)->nullable();
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
        Schema::dropIfExists('model_excel_road_carriers');
    }
}
