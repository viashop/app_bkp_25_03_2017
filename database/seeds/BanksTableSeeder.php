<?php

use Illuminate\Database\Seeder;
use App\Models\Bank as s;

class BanksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        s::truncate();
        s::create(['number' => '001', 'name' => 'Banco do Brasil', 'logo' => 'banco-bb-logo']);
        s::create(['number' => '341', 'name' => 'Banco Itaú', 'logo' => 'banco-itau-logo']);
        s::create(['number' => '237', 'name' => 'Bradesco', 'logo' => 'banco-bradesco-logo']);
        s::create(['number' => '104', 'name' => 'Caixa Econômica', 'logo' => 'banco-caixa-logo']);
        s::create(['number' => '477', 'name' => 'CitiBank', 'logo' => 'banco-citi-logo']);
        s::create(['number' => '399', 'name' => 'HSBC', 'logo' => 'banco-hsbc-logo']);
        s::create(['number' => '033', 'name' => 'Santander', 'logo' => 'banco-santander-logo']);
        s::create(['number' => '756', 'name' => 'SICOOB', 'logo' => 'banco-sicoob-logo']);
        s::create(['number' => '748', 'name' => 'SICREDI', 'logo' => 'banco-sicredi-logo']);
    }
}
