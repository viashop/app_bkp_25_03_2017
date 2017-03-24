<?php

use Illuminate\Database\Seeder;
use App\Models\ResourceFreeShipping as s;

class ResourceFreeShippingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        s::truncate();
        s::create(['region' => 'Sul', 'name' => 'sul']);
        s::create(['region' => 'Sudeste', 'name' => 'sudeste']);
        s::create(['region' => 'Centro-Oeste', 'name' => 'centro_oeste']);
        s::create(['region' => 'Nordeste', 'name' => 'nordeste']);
        s::create(['region' => 'Norte', 'name' => 'norte']);
    }
}
