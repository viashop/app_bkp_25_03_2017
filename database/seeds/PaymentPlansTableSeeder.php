<?php

use Illuminate\Database\Seeder;
use App\Models\PaymentPlan as s;

class PaymentPlansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        s::truncate();

        foreach ($this->array_data() as $arr) {

            s::create([

                'price' => $arr['price'],
                'of_price' => $arr['of_price'],
                'per_price' => $arr['per_price'],
                'status' => $arr['status'],
                'products' => $arr['products'],
                'visits' => $arr['visits'],
                'email' => $arr['email'],
                'traffic' => $arr['traffic'],
                'bytes' => $arr['bytes'],
                'commission' => $arr['commission'],
                'active' => $arr['active'],
                'discount' => $arr['discount'],
                'price_per_product' => $arr['price_per_product'],
                'price_per_gb' => $arr['price_per_gb'],
                'team_support' => $arr['team_support'],
                'team_marketing' => $arr['team_marketing']

            ]);

        }

    }

    public function array_data()
    {
        return [
           ['price' => '0.00','of_price' => NULL,'per_price' => NULL,'status' => '1','products' => '50','visits' => '5000','email' => NULL,'traffic' => '2','bytes' => '2147483648','commission' => '0','active' => '1','discount' => NULL,'price_per_product' => NULL,'price_per_gb' => NULL,'team_support' => 'N','team_marketing' => 'N'],
           ['price' => '47.00','of_price' => '47.00','per_price' => '37.00','status' => '1','products' => '100','visits' => '10000','email' => NULL,'traffic' => '4','bytes' => '4294967296','commission' => '0','active' => '1','discount' => '15.00','price_per_product' => '0.30','price_per_gb' => '11.70','team_support' => 'S','team_marketing' => 'N'],
           ['price' => '97.00','of_price' => '97.00','per_price' => '87.00','status' => '1','products' => '200','visits' => '20000','email' => NULL,'traffic' => '8','bytes' => '8589934592','commission' => '0','active' => '1','discount' => '15.00','price_per_product' => '0.30','price_per_gb' => '11.60','team_support' => 'S','team_marketing' => 'N'],
           ['price' => '197.00','of_price' => '197.00','per_price' => '167.00','status' => '1','products' => '300','visits' => '30000','email' => NULL,'traffic' => '16','bytes' => '17179869184','commission' => '0','active' => '1','discount' => '15.00','price_per_product' => '0.30','price_per_gb' => '11.50','team_support' => 'S','team_marketing' => 'N'],
           ['price' => '397.00','of_price' => '397.00','per_price' => '367.00','status' => '1','products' => 'ilimitado','visits' => 'ilimitado','email' => NULL,'traffic' => '32','bytes' => '34359738368','commission' => '0','active' => '1','discount' => '15.00','price_per_product' => '0.30','price_per_gb' => '11.40','team_support' => 'S','team_marketing' => 'S'],
           ['price' => '747.00','of_price' => '747.00','per_price' => '697.00','status' => '1','products' => 'ilimitado','visits' => 'ilimitado','email' => NULL,'traffic' => '64','bytes' => '68719476736','commission' => '0','active' => '1','discount' => '10.00','price_per_product' => '0.30','price_per_gb' => '11.30','team_support' => 'S','team_marketing' => 'S'],
           ['price' => '1397.00','of_price' => '1397.00','per_price' => '1347.00','status' => '1','products' => 'ilimitado','visits' => 'ilimitado','email' => NULL,'traffic' => '128','bytes' => '137438953472','commission' => '0','active' => '1','discount' => '7.00','price_per_product' => '0.30','price_per_gb' => '11.00','team_support' => 'S','team_marketing' => 'S'],
           ['price' => '2467.00','of_price' => '2497.00','per_price' => '2297.00','status' => '1','products' => 'ilimitado','visits' => 'ilimitado','email' => NULL,'traffic' => '256','bytes' => '274877906944','commission' => '0','active' => '1','discount' => '5.00','price_per_product' => '0.30','price_per_gb' => '10.00','team_support' => 'S','team_marketing' => 'S'],
           ['price' => '4697.00','of_price' => '4697.00','per_price' => '4497.00','status' => '1','products' => 'ilimitado','visits' => 'ilimitado','email' => NULL,'traffic' => '512','bytes' => '549755813888','commission' => '0','active' => '1','discount' => '5.00','price_per_product' => '0.30','price_per_gb' => '9.00','team_support' => 'S','team_marketing' => 'S'],
           ['price' => '7997.00','of_price' => '7997.00','per_price' => '7497.00','status' => '1','products' => 'ilimitado','visits' => 'ilimitado','email' => NULL,'traffic' => '1024','bytes' => '1099511627776','commission' => '0','active' => '1','discount' => '5.00','price_per_product' => '0.30','price_per_gb' => '8.00','team_support' => 'S','team_marketing' => 'S'],
        ];

    }

}
