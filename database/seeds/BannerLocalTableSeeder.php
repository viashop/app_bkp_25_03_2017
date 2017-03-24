<?php

use Illuminate\Database\Seeder;
use App\Models\BannerLocal as s;

class BannerLocalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        s::truncate();
        s::create(['name' => 'Somente na página inicial', 'page_publish' => 'home']);
        s::create(['name' => 'Em todas as categorias', 'page_publish' => 'category']);
        s::create(['name' => 'Em todas as marcas', 'page_publish' => 'brand']);
        s::create(['name' => 'Em todos os produtos', 'page_publish' => 'product']);
        s::create(['name' => 'Na página de busca', 'page_publish' => 'search']);
        s::create(['name' => 'Nas páginas de conteúdo', 'page_publish' => 'page']);
        s::create(['name' => 'Em todas as páginas', 'page_publish' => 'all']);
    }
}
