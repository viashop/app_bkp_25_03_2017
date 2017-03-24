<?php

use Illuminate\Database\Seeder;
use App\Models\ModelExcelRoadCarrier as ModelExcel;

class ModelExcelRoadCarrierTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        foreach ($this->array_data() as $arr) {

            $data = [

                'region' => $arr['region'],
                'cep_begin' => $arr['cep_begin'],
                'cep_end' => $arr['cep_end'],
                'peso_begin' => $arr['peso_begin'],
                'peso_end' => $arr['peso_end'],
                'value' => $arr['value'],
                'delivery_time' => $arr['delivery_time'],
                'ad_valorem' => $arr['ad_valorem'],
                'kg_additional' => $arr['kg_additional'],

            ];

            if (ModelExcel::where('cep_begin', '=', $arr['cep_begin'])->where('cep_end', '=', $arr['cep_end'])->where('peso_begin', '=', $arr['peso_begin'])->where('peso_end', '=', $arr['peso_end'])->count()) {
                $permission = ModelExcel::where('cep_begin', '=', $arr['cep_begin'])->where('cep_end', '=', $arr['cep_end'])->where('peso_begin', '=', $arr['peso_begin'])->where('peso_end', '=', $arr['peso_end'])->first();
                $permission->update($data);
            } else {
                ModelExcel::create($data);
            }

        }

    }

    public function array_data()
    {

        return  [
            ['region' => 'SAO PAULO - CAPITAL','cep_begin' => '01000-001','cep_end' => '05999-999','peso_begin' => '0.000','peso_end' => '1.000','value' => '22.70','delivery_time' => '7','ad_valorem' => '1.00','kg_additional' => '1.72'],
            ['region' => 'SAO PAULO - CAPITAL','cep_begin' => '01000-001','cep_end' => '05999-999','peso_begin' => '1.000','peso_end' => '2.000','value' => '26.81','delivery_time' => '7','ad_valorem' => NULL,'kg_additional' => NULL],
            ['region' => 'SAO PAULO - CAPITAL','cep_begin' => '01000-001','cep_end' => '05999-999','peso_begin' => '2.000','peso_end' => '3.000','value' => '28.96','delivery_time' => '7','ad_valorem' => NULL,'kg_additional' => NULL],
            ['region' => 'SAO PAULO - CAPITAL','cep_begin' => '01000-001','cep_end' => '05999-999','peso_begin' => '3.000','peso_end' => '4.000','value' => '30.85','delivery_time' => '7','ad_valorem' => NULL,'kg_additional' => NULL],
            ['region' => 'SAO PAULO - CAPITAL','cep_begin' => '01000-001','cep_end' => '05999-999','peso_begin' => '4.000','peso_end' => '5.000','value' => '32.84','delivery_time' => '7','ad_valorem' => NULL,'kg_additional' => NULL],
            ['region' => 'SAO PAULO - CAPITAL','cep_begin' => '01000-001','cep_end' => '05999-999','peso_begin' => '5.000','peso_end' => '10.000','value' => '37.90','delivery_time' => '7','ad_valorem' => NULL,'kg_additional' => NULL],
            ['region' => 'SAO PAULO - CAPITAL','cep_begin' => '01000-001','cep_end' => '05999-999','peso_begin' => '10.000','peso_end' => '15.000','value' => '43.00','delivery_time' => '7','ad_valorem' => NULL,'kg_additional' => NULL],
            ['region' => 'SAO PAULO - CAPITAL','cep_begin' => '01000-001','cep_end' => '05999-999','peso_begin' => '15.000','peso_end' => '30.000','value' => '49.72','delivery_time' => '7','ad_valorem' => NULL,'kg_additional' => NULL],
            ['region' => 'SAO PAULO - CAPITAL','cep_begin' => '01000-001','cep_end' => '05999-999','peso_begin' => '30.000','peso_end' => '50.000','value' => '52.99','delivery_time' => '7','ad_valorem' => NULL,'kg_additional' => NULL],
            ['region' => 'SAO PAULO - CAPITAL','cep_begin' => '01000-001','cep_end' => '05999-999','peso_begin' => '50.000','peso_end' => '80.000','value' => '55.36','delivery_time' => '7','ad_valorem' => NULL,'kg_additional' => NULL],
            ['region' => 'SAO PAULO - CAPITAL','cep_begin' => '08000-000','cep_end' => '08499-999','peso_begin' => '0.000','peso_end' => '1.000','value' => '22.70','delivery_time' => '7','ad_valorem' => '1.00','kg_additional' => '1.72'],
            ['region' => 'SAO PAULO - CAPITAL','cep_begin' => '08000-000','cep_end' => '08499-999','peso_begin' => '1.000','peso_end' => '2.000','value' => '26.81','delivery_time' => '7','ad_valorem' => NULL,'kg_additional' => NULL],
            ['region' => 'SAO PAULO - CAPITAL','cep_begin' => '08000-000','cep_end' => '08499-999','peso_begin' => '2.000','peso_end' => '3.000','value' => '28.96','delivery_time' => '7','ad_valorem' => NULL,'kg_additional' => NULL],
            ['region' => 'SAO PAULO - CAPITAL','cep_begin' => '08000-000','cep_end' => '08499-999','peso_begin' => '3.000','peso_end' => '4.000','value' => '30.85','delivery_time' => '7','ad_valorem' => NULL,'kg_additional' => NULL],
            ['region' => 'SAO PAULO - CAPITAL','cep_begin' => '08000-000','cep_end' => '08499-999','peso_begin' => '4.000','peso_end' => '5.000','value' => '32.84','delivery_time' => '7','ad_valorem' => NULL,'kg_additional' => NULL],
            ['region' => 'SAO PAULO - CAPITAL','cep_begin' => '08000-000','cep_end' => '08499-999','peso_begin' => '5.000','peso_end' => '10.000','value' => '37.90','delivery_time' => '7','ad_valorem' => NULL,'kg_additional' => NULL],
            ['region' => 'SAO PAULO - CAPITAL','cep_begin' => '08000-000','cep_end' => '08499-999','peso_begin' => '10.000','peso_end' => '15.000','value' => '43.00','delivery_time' => '7','ad_valorem' => NULL,'kg_additional' => NULL],
            ['region' => 'SAO PAULO - CAPITAL','cep_begin' => '08000-000','cep_end' => '08499-999','peso_begin' => '15.000','peso_end' => '30.000','value' => '49.72','delivery_time' => '7','ad_valorem' => NULL,'kg_additional' => NULL],
            ['region' => 'SAO PAULO - CAPITAL','cep_begin' => '08000-000','cep_end' => '08499-999','peso_begin' => '30.000','peso_end' => '50.000','value' => '52.99','delivery_time' => '7','ad_valorem' => NULL,'kg_additional' => NULL],
            ['region' => 'SAO PAULO - CAPITAL','cep_begin' => '08000-000','cep_end' => '08499-999','peso_begin' => '50.000','peso_end' => '80.000','value' => '55.36','delivery_time' => '7','ad_valorem' => NULL,'kg_additional' => NULL],
            ['region' => 'SAO PAULO - CAPITAL','cep_begin' => '08000-000','cep_end' => '08499-999','peso_begin' => '0.000','peso_end' => '1.000','value' => '26.00','delivery_time' => '7','ad_valorem' => NULL,'kg_additional' => NULL],
            ['region' => 'SAO PAULO - INTERIOR','cep_begin' => '01000-000','cep_end' => '19999-999','peso_begin' => '1.000','peso_end' => '2.000','value' => '36.65','delivery_time' => '12','ad_valorem' => '1.49','kg_additional' => '2.50'],
            ['region' => 'SAO PAULO - INTERIOR','cep_begin' => '01000-000','cep_end' => '19999-999','peso_begin' => '2.000','peso_end' => '3.000','value' => '65.56','delivery_time' => '12','ad_valorem' => NULL,'kg_additional' => NULL],
            ['region' => 'SAO PAULO - INTERIOR','cep_begin' => '01000-000','cep_end' => '19999-999','peso_begin' => '3.000','peso_end' => '4.000','value' => '74.00','delivery_time' => '12','ad_valorem' => NULL,'kg_additional' => NULL],
            ['region' => 'SAO PAULO - INTERIOR','cep_begin' => '01000-000','cep_end' => '19999-999','peso_begin' => '4.000','peso_end' => '5.000','value' => '87.00','delivery_time' => '12','ad_valorem' => NULL,'kg_additional' => NULL],
            ['region' => 'SAO PAULO - INTERIOR','cep_begin' => '01000-000','cep_end' => '19999-999','peso_begin' => '5.000','peso_end' => '10.000','value' => '94.00','delivery_time' => '12','ad_valorem' => NULL,'kg_additional' => NULL],
            ['region' => 'SAO PAULO - INTERIOR','cep_begin' => '01000-000','cep_end' => '19999-999','peso_begin' => '10.000','peso_end' => '15.000','value' => '107.50','delivery_time' => '12','ad_valorem' => NULL,'kg_additional' => NULL],
            ['region' => 'SAO PAULO - INTERIOR','cep_begin' => '01000-000','cep_end' => '19999-999','peso_begin' => '15.000','peso_end' => '30.000','value' => '115.60','delivery_time' => '12','ad_valorem' => NULL,'kg_additional' => NULL],
            ['region' => 'SAO PAULO - INTERIOR','cep_begin' => '01000-000','cep_end' => '19999-999','peso_begin' => '30.000','peso_end' => '50.000','value' => '125.00','delivery_time' => '12','ad_valorem' => NULL,'kg_additional' => NULL],
            ['region' => 'SAO PAULO - INTERIOR','cep_begin' => '01000-000','cep_end' => '19999-999','peso_begin' => '50.000','peso_end' => '80.000','value' => '136.00','delivery_time' => '12','ad_valorem' => NULL,'kg_additional' => NULL],
            ['region' => 'SAO PAULO - INTERIOR','cep_begin' => '01000-000','cep_end' => '19999-999','peso_begin' => '90.000','peso_end' => '100.000','value' => '142.56','delivery_time' => '12','ad_valorem' => NULL,'kg_additional' => NULL],
        ];

    }

}
