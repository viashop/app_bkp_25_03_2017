<?php

use Illuminate\Database\Seeder;
use App\Models\DeskStatusUser as s;

class DeskStatusUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        s::truncate();
        s::create(['name' => 'Enviado']);
        s::create(['name' => 'Resposta do atendente']);
        s::create(['name' => 'Resposta do cliente']);
        s::create(['name' => 'Reaberto']);
        s::create(['name' => 'Fechado']);
    }
}
