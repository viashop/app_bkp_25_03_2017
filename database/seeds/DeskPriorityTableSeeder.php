<?php

use Illuminate\Database\Seeder;
use App\Models\DeskPriority as s;

class DeskPriorityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        s::truncate();
        s::create(['name' => 'Baixa']);
        s::create(['name' => 'Média']);
        s::create(['name' => 'Alta']);
    }
}
