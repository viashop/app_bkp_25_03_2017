<?php

use Illuminate\Database\Seeder;
use App\Models\ShopType as s;

class ShopTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        s::truncate();
        s::create(['title' => 'Para venda de produtos', 'value' => 'loja']);
        s::create(['title' => 'Como um catálogo sem apresentar o preço dos produtos', 'value' => 'catalogo_sem_preco']);
        s::create(['title' => 'Como um catálogo, apresentando o preço dos produtos', 'value' => 'catalogo_com_preco']);
        s::create(['title' => 'Como um catálogo com preço para solicitação de orçamento', 'value' => 'orcamento_com_preco']);
        s::create(['title' => 'Como um catálogo sem preço para solicitação de orçamento', 'value' => 'orcamento_sem_preco']);
    }
}
