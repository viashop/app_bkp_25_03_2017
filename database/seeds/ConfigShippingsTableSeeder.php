<?php

use Illuminate\Database\Seeder;
use App\Models\ConfigShipping as s;

class ConfigShippingsTableSeeder extends Seeder
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
                
                'id' => $arr['id'],
                'title' => $arr['title'],
                'logo' => $arr['logo'],
                'id_js' => $arr['id_js'],
                'checked' => $arr['checked'],
                'configuration' => $arr['configuration'],
                'active' => $arr['active'],
                'slug' => $arr['slug']

            ]);

        }

    }

    public function array_data()
    {
        return array(
          array('id' => '1','title' => 'SEDEX','logo' => 'sedex-logo.png','id_js' => 'sedex','checked' => 'checked="checked"','configuration' => NULL,'active' => '1','slug' => 'sedex'),
          array('id' => '2','title' => 'PAC','logo' => 'pac-logo.png','id_js' => 'pac','checked' => 'checked="checked"','configuration' => NULL,'active' => '1','slug' => 'pac'),
          array('id' => '3','title' => 'e-SEDEX','logo' => 'e_sedex-logo.png','id_js' => 'e_sedex','checked' => NULL,'configuration' => 'precisa_configuracao','active' => '1','slug' => 'e-sedex'),
          array('id' => '100','title' => 'Motoboy','logo' => 'motoboy-logo.png','id_js' => 'motoboy','checked' => NULL,'configuration' => 'precisa_configuracao','active' => '1','slug' => 'motoboy'),
          array('id' => '200','title' => 'Transportadora','logo' => 'transportadora-logo.png','id_js' => 'transportadora','checked' => NULL,'configuration' => 'precisa_configuracao','active' => '1','slug' => 'transportadora'),
          array('id' => '300','title' => 'Retirar pessoalmente','logo' => 'retirar_pessoalmente-logo.png','id_js' => 'pessoalmente','checked' => NULL,'configuration' => 'precisa_configuracao','active' => '1','slug' => 'pessoalmente'),
          array('id' => '400','title' => 'Frete Fixo','logo' => NULL,'id_js' => NULL,'checked' => NULL,'configuration' => NULL,'active' => '0','slug' => NULL),
          array('id' => '500','title' => 'Frete Grátis (CUPOM)','logo' => NULL,'id_js' => NULL,'checked' => NULL,'configuration' => NULL,'active' => '0','slug' => NULL)
        );
    }
}
