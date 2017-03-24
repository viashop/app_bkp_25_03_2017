<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('config_activities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
			$table->text('description')->nullable();
            $table->text('image')->nullable();
			$table->text('slug')->nullable();
			$table->text('icon')->nullable();		
			$table->string('link_rewrite')->nullable();
			$table->string('meta_title')->nullable();
			$table->string('meta_keywords')->nullable();
			$table->string('meta_description')->nullable();
			$table->boolean('active')->default(1);
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
        Schema::dropIfExists('config_activities');
    }
}
