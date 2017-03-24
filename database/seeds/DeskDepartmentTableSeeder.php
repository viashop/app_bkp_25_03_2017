<?php

use Illuminate\Database\Seeder;
use App\Models\DeskDepartment as s;

class DeskDepartmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        s::truncate();
        s::create(['name' => 'Suporte', 'email' => 'suporte@vialoja.com.br']);
        s::create(['name' => 'Comercial', 'email' => 'comercial@vialoja.com.br']);
        s::create(['name' => 'Financeiro', 'email' => 'financeiro@vialoja.com.br']);
    }
}
