<?php

use Illuminate\Database\Seeder;
use App\Models\BanksConfiguration as s;

class BanksConfigurationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        s::truncate();
        s::create(['number_bank' => '104', 'code_operation' => 1, 'name_operation' => 'Conta Corrente de Pessoa Física']);
        s::create(['number_bank' => '104', 'code_operation' => 2, 'name_operation' => 'Conta Simples de Pessoa Física']);
        s::create(['number_bank' => '104', 'code_operation' => 3, 'name_operation' => 'Conta Corrente de Pessoa Jurídica']);
        s::create(['number_bank' => '104', 'code_operation' => 6, 'name_operation' => 'Entidades Públicas']);
        s::create(['number_bank' => '104', 'code_operation' => 7, 'name_operation' => 'Depósitos Instituições Financeiras']);
        s::create(['number_bank' => '104', 'code_operation' => 13, 'name_operation' => 'Poupança de Pessoa Física']);
        s::create(['number_bank' => '104', 'code_operation' => 22, 'name_operation' => 'Poupança de Pessoa Jurídica']);
        s::create(['number_bank' => '104', 'code_operation' => 28, 'name_operation' => 'Poupança de Crédito Imobiliário']);
        s::create(['number_bank' => '104', 'code_operation' => 43, 'name_operation' => 'Depósitos Lotéricos']);
    }
}
