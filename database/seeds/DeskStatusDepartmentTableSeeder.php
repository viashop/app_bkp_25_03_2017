<?php

use Illuminate\Database\Seeder;
use App\Models\DeskStatusDepartment as s;

class DeskStatusDepartmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        s::truncate();
        s::create(['name' => 'Novo']);
        s::create(['name' => 'Aguardando resposta']);
        s::create(['name' => 'Reaberto']);
        s::create(['name' => 'Fechado']);
    }
}
