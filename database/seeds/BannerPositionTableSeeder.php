<?php

use Illuminate\Database\Seeder;
use App\Models\BannerPosition as s;

class BannerPositionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        s::truncate();
        s::create(['name' => 'Banner Tarja', 'local_publish' => 'tarja', 'position' => 4]);
        s::create(['name' => 'Banner Vitrine', 'local_publish' => 'vitrine', 'position' => 3]);
        s::create(['name' => 'Slider Full Banner', 'local_publish' => 'fullbanner', 'position' => 0]);
        s::create(['name' => 'Mini banner', 'local_publish' => 'minibanner', 'position' => 6]);
        s::create(['name' => 'Banner lateral do Full banner', 'local_publish' => 'sidebar', 'position' => 5, 'status' => 0]);
        s::create(['name' => 'Banner', 'local_publish' => 'banner', 'position' => 2]);
        s::create(['name' => 'Slider Default Banner', 'local_publish' => 'defaultbanner', 'position' => 1]);
    }
}
