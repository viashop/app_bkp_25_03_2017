<?php

use Illuminate\Database\Seeder;
use App\Models\ShopGrid;

class ShopGridsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {

         foreach ($this->array_data() as $arr) {

             $data = [
                 'shop_id' => NULL,
                 'name' => $arr['name'],
                 'type' => $arr['type'],
                 'default_platform' => 1
             ];

             if (ShopGrid::where('name', '=', $arr['name'])->where('type', '=', $arr['type'])->count()) {
                 $grid = ShopGrid::where('name', '=', $arr['name'])->where('type', '=', $arr['type'])->first();
                 $grid->update($data);
             } else {
                 ShopGrid::create($data);
             }

         }

     }

     public function array_data()
     {
        return [
            ['name' => 'Gênero','type' => 'Gênero'],
            ['name' => 'Produto com uma cor','type' => 'Cor'],
            ['name' => 'Produto com duas cores','type' => 'Cor'],
            ['name' => 'Tamanho de anel/aliança','type' => 'Tamanho'],
            ['name' => 'Tamanho de calça','type' => 'Tamanho'],
            ['name' => 'Tamanho de camisa/camiseta','type' => 'Tamanho'],
            ['name' => 'Tamanho de capacete','type' => 'Tamanho'],
            ['name' => 'Tamanho de tênis','type' => 'Tamanho'],
            ['name' => 'Voltagem','type' => 'Voltagem'],
        ];
     }

}
