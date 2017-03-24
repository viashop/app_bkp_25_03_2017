<?php

use Illuminate\Database\Seeder;
use App\Models\ConfigPayment as s;

class ConfigPaymentsTableSeeder extends Seeder
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
                'name' => $arr['name'],
                'logo' => $arr['logo'],
                'id_for' => $arr['id_for'],
                'slug' => $arr['slug'],
                'checked' => $arr['checked'],
                'active_wizard' => $arr['active_wizard'],
                'active' => $arr['active'],
                'card_visa' => $arr['card_visa'],
                'card_master_card' => $arr['card_master_card'],
                'card_hipercard' => $arr['card_hipercard'],
                'bank_itau' => $arr['bank_itau'],
                'bank_bradesco' => $arr['bank_bradesco'],
                'bank_bb' => $arr['bank_bb'],
                'bill' => $arr['bill'],

            ]);
        }
    }

    public function array_data()
    {
        return [
            ['name' => 'MercadoPago','logo' => 'mercado_pago-logo.png','id_for' => 'mercadopago','slug' => 'pagamento_mercado_pago','checked' => NULL,'active_wizard' => '1','active' => '1','card_visa' => 'greycheck','card_master_card' => 'greycheck','card_hipercard' => 'none','bank_itau' => 'greycheck','bank_bradesco' => 'greycheck','bank_bb' => 'greycheck','bill' => 'greycheck'],
            ['name' => 'PagSeguro','logo' => 'pagseguro-logo.png','id_for' => 'pagseguro','slug' => 'pagamento_pagseguro','checked' => NULL,'active_wizard' => '1','active' => '1','card_visa' => 'greycheck','card_master_card' => 'greycheck','card_hipercard' => 'greycheck','bank_itau' => 'greycheck','bank_bradesco' => 'greycheck','bank_bb' => 'greycheck','bill' => 'greycheck'],
            ['name' => 'Bcash','logo' => 'bcash-logo.png','id_for' => 'pagamentodigital','slug' => 'pagamento_pagamento_digital','checked' => 'checked="checked"','active_wizard' => '1','active' => '1','card_visa' => 'greycheck','card_master_card' => 'greycheck','card_hipercard' => 'greycheck','bank_itau' => 'greycheck','bank_bradesco' => 'greycheck','bank_bb' => 'greycheck','bill' => 'greycheck'],
            ['name' => 'PayPal','logo' => 'paypal-logo.png','id_for' => 'paypal','slug' => 'pagamento_paypal','checked' => NULL,'active_wizard' => '1','active' => '1','card_visa' => 'greycheck','card_master_card' => 'greycheck','card_hipercard' => 'none','bank_itau' => 'none','bank_bradesco' => 'none','bank_bb' => 'none','bill' => 'none'],
            ['name' => 'Depósito Bancário','logo' => 'deposito-logo.png','id_for' => 'deposito','slug' => 'pagamento_deposito','checked' => NULL,'active_wizard' => '1','active' => '1','card_visa' => 'none','card_master_card' => 'none','card_hipercard' => 'none','bank_itau' => 'none','bank_bradesco' => 'none','bank_bb' => 'none','bill' => 'none'],
            ['name' => 'Boleto Bancário','logo' => 'boleto-logo.png','id_for' => 'boleto','slug' => 'pagamento_boleto','checked' => NULL,'active_wizard' => '0','active' => '0','card_visa' => 'none','card_master_card' => 'none','card_hipercard' => 'none','bank_itau' => 'none','bank_bradesco' => 'none','bank_bb' => 'none','bill' => 'none'],
        ];
    }
}
