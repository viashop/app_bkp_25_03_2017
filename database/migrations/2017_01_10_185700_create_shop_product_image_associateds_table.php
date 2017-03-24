    <?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopProductImageAssociatedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_product_image_associateds', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shop_product_image_id')->unsigned()->index();
            $table->foreign('shop_product_image_id')->references('id')->on('shop_product_images')->onDelete('CASCADE');
            $table->integer('shop_product_id')->unsigned()->index();
            $table->foreign('shop_product_id')->references('id')->on('shop_products')->onDelete('CASCADE');
            $table->integer('shop_product_variation_id')->unsigned()->index();
            $table->foreign('shop_product_variation_id')->references('id')->on('shop_product_variations')->onDelete('CASCADE');
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
        Schema::dropIfExists('shop_product_associateds');
    }
}
