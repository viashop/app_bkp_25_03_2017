    <?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_coupons', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shop_id')->unsigned()->index();
            $table->foreign('shop_id')->references('id')->on('shops')->onDelete('CASCADE');
            $table->enum('active', array('False','True'))->default('True');
			$table->string('code');
			$table->text('description')->nullable();
			$table->enum('type', array('free_shipping','percentage','fixe'))->nullable();
			$table->decimal('value', 10,3)->nullable();
			$table->decimal('minimum_value', 10,3)->nullable();
			$table->integer('quantity')->default(0);
			$table->enum('cumulative', array('False','True'))->default('False');
			$table->smallInteger('quantity_per_customer')->default(1);
			$table->date('validate')->nullable();
			$table->enum('apply_to_total', array('False','True'))->default('False');
			$table->integer('total_used')->default(0);
			$table->timestamps();
			$table->unique(['shop_id','code'], 'coupons_code_Unique');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_coupons');
    }
}
