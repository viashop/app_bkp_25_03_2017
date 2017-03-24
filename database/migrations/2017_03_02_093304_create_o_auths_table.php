<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOAuthsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oauths', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE');
            $table->string('oauth_name');
            $table->string('oauth_slug_icon');
            $table->string('facebook_id')->nullable();
            $table->string('twitter_id')->nullable();
            $table->string('google_id')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('picture')->nullable();
            $table->string('url')->nullable();
            $table->string('biography')->nullable();
            $table->string('location')->nullable();
            $table->string('site')->nullable();
            $table->boolean('active')->nullable();
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
        Schema::dropIfExists('o_auths');
    }
}
