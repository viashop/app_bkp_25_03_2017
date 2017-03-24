<?php

use Illuminate\Database\Seeder;
use App\Models\ConfigCorreios as s;

class ConfigCorreiosTableSeeder extends Seeder
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
                'code' => $arr['code'],
                'config_shipping_id' => $arr['config_shipping_id'],
                'contract_agreement' => $arr['contract_agreement'],
                'service' => $arr['service'],
                'name' => $arr['name'],
                'default' => $arr['default']
            ]);
        }
    }

    public function array_data()
    {
        return array(
          array('code' => '40010','config_shipping_id' => '1','contract_agreement' => 'False','service' => 'SEDEX Varejo','name' => 'SEDEX','default' => 'True'),
          array('code' => '40045','config_shipping_id' => '1','contract_agreement' => 'False','service' => 'SEDEX a Cobrar Varejo','name' => 'SEDEX','default' => 'False'),
          array('code' => '40096','config_shipping_id' => '1','contract_agreement' => 'True','service' => 'SEDEX com Contrato','name' => 'SEDEX','default' => 'False'),
          array('code' => '40290','config_shipping_id' => '1','contract_agreement' => 'False','service' => 'SEDEX Hoje Varejo','name' => 'SEDEX','default' => 'False'),
          array('code' => '40436','config_shipping_id' => '1','contract_agreement' => 'True','service' => 'SEDEX com Contrato','name' => 'SEDEX','default' => 'False'),
          array('code' => '40444','config_shipping_id' => '1','contract_agreement' => 'True','service' => 'SEDEX com Contrato','name' => 'SEDEX','default' => 'False'),
          array('code' => '41068','config_shipping_id' => '2','contract_agreement' => 'True','service' => 'PAC com Contrato','name' => 'PAC','default' => 'False'),
          array('code' => '41106','config_shipping_id' => '2','contract_agreement' => 'False','service' => 'PAC Varejo','name' => 'PAC','default' => 'True'),
          array('code' => '81019','config_shipping_id' => '3','contract_agreement' => 'True','service' => 'e-SEDEX com Contrato','name' => 'e-SEDEX','default' => 'True')
        );
    }
}
