<?php

use Illuminate\Database\Seeder;
use App\Models\Comparator as s;

    class ComparatorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        s::truncate();
        s::create(['name' => 'Buscapé', 'url' => 'http://negocios.buscapecompany.com.br', 'img' => 'buscape.png']);
        s::create(['name' => 'Shopping UOL', 'url' => '', 'img' => 'shoppinguol.png', 'active' => 'False']);
        s::create(['name' => 'Google Merchant', 'url' => 'http://www.google.com.br/merchants', 'img' => 'googlemerchant.png']);
        s::create(['name' => 'MuccaShop', 'url' => 'http://www.muccashop.com.br/anuncie', 'img' => 'muccashop.png']);
    }
}
