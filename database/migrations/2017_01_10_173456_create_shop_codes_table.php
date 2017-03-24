<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_codes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shop_id')->unsigned()->index();
            $table->foreign('shop_id')->references('id')->on('shops')->onDelete('CASCADE');
			$table->string('description');
			$table->enum('local_publication', array('footer','header'))->default('footer');
			$table->enum('type', array('javascript','html','css'))->default('html');
			$table->string('page_publication');
			$table->text('content');
			$table->boolean('active')->default(1);
			$table->integer('time')->nullable();
			$table->boolean('audit')->default(0);
			$table->dateTime('audit_date')->nullable();
			$table->boolean('disapproved')->default(0);
			$table->enum('edit_basic', array('header','footer'))->nullable();
            $table->timestamps();
            $table->unique(['shop_id','description'], 'codes_description_UNIQUE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_codes');
    }
}
