<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopCancelAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_cancel_accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shop_id')->unsigned()->index();
            $table->foreign('shop_id')->references('id')->on('shops')->onDelete('CASCADE');
			$table->integer('user_id')->unsigned()->index();
			$table->boolean('status')->nullable();
			$table->enum('cause', ['estou_migrando_para_outra_plataforma','estou_desistindo_de_ter_loja_virtual'])->nullable();
			$table->text('suggestion')->nullable();
			$table->date('date_remove')->nullable();
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
        Schema::dropIfExists('shop_cancel_accounts');
    }
}
