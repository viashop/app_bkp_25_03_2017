<?php

use Illuminate\Database\Seeder;
use App\Models\SubdomainNotAllowed as s;

class SubdomainNotAllowedsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        s::truncate();
        s::create(['name' => 'labs']);
        s::create(['name' => 'ajuda']);
        s::create(['name' => 'accounts']);
        s::create(['name' => 'account']);
        s::create(['name' => 'panel']);
        s::create(['name' => 'control']);
        s::create(['name' => 'painel']);
        s::create(['name' => 'shopping']);
        s::create(['name' => 'suporte']);
        s::create(['name' => 'loja']);
        s::create(['name' => 'webmail']);
        s::create(['name' => 'forum']);
        s::create(['name' => 'lojas']);
        s::create(['name' => 'blog']);
        s::create(['name' => 'blogs']);
        s::create(['name' => 'templates']);
        s::create(['name' => 'template']);
        s::create(['name' => 'atendimento']);
        s::create(['name' => 'atendimentos']);
        s::create(['name' => 'sac']);
        s::create(['name' => 'ticket']);
        s::create(['name' => 'tickets']);
        s::create(['name' => 'conta']);
        s::create(['name' => 'news']);
        s::create(['name' => 'newsletter']);
        s::create(['name' => 'mkt']);
        s::create(['name' => 'marketing']);
        s::create(['name' => 'sistema']);
        s::create(['name' => 'sistemas']);
        s::create(['name' => 'app']);
        s::create(['name' => 'apps']);
        s::create(['name' => 'mobile']);
        s::create(['name' => 'm']);
        s::create(['name' => 'layouts']);
        s::create(['name' => 'layout']);
        s::create(['name' => 'admin']);
        s::create(['name' => 'login']);
        s::create(['name' => 'email']);
        s::create(['name' => 'contas']);
        s::create(['name' => 'loja-exemplo']);
        s::create(['name' => 'loja-modelo']);
        s::create(['name' => 'lojamodelo']);
        s::create(['name' => 'loja-teste']);
        s::create(['name' => 'teste']);
        s::create(['name' => 'store']);
        s::create(['name' => 'stores']);
        s::create(['name' => 'wiki']);
        s::create(['name' => 'contato']);
        s::create(['name' => 'contatos']);
        s::create(['name' => 'backoffice']);
        s::create(['name' => 'backoffices']);
        s::create(['name' => 'info']);
        s::create(['name' => 'infos']);
        s::create(['name' => 'noticia']);
        s::create(['name' => 'noticias']);
    }
}
