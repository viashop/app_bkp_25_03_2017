<?php

use Illuminate\Database\Seeder;
use App\Models\ModelExcelProductImport as ModelExcel;

class ModelExcelProductImportTableSeeder extends Seeder
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
                'sku' => $arr['sku'],
                'parent_sku' => $arr['parent_sku'],
                'active' => $arr['active'],
                'condition' => $arr['condition'],
                'name' => $arr['name'],
                'description' => $arr['description'],
                'availability_when_no_to_manage_stock' => $arr['availability_when_no_to_manage_stock'],
                'manage_inventory' => $arr['manage_inventory'],
                'quantity' => $arr['quantity'],
                'availability_two_products_in_stock' => $arr['availability_two_products_in_stock'],
                'availability_when_end_products_in_stock' => $arr['availability_when_end_products_in_stock'],
                'price_cost' => $arr['price_cost'],
                'price_for_sale' => $arr['price_for_sale'],
                'promotional_price' => $arr['promotional_price'],
                'category_level_1' => $arr['category_level_1'],
                'category_level_2' => $arr['category_level_2'],
                'category_level_3' => $arr['category_level_3'],
                'brand' => $arr['brand'],
                'peso_kg' => $arr['peso_kg'],
                'height_cm' => $arr['height_cm'],
                'width_cm' => $arr['width_cm'],
                'length_cm' => $arr['length_cm'],
                'link_to_the_main_photo' => $arr['link_to_the_main_photo'],
                'link_to_additional_photo_1' => $arr['link_to_additional_photo_1'],
                'link_to_additional_photo_2' => $arr['link_to_additional_photo_2'],
                'link_to_additional_photo_3' => $arr['link_to_additional_photo_3'],
                'url_old_product' => $arr['url_old_product'],
                'video_link_on_youtube' => $arr['video_link_on_youtube'],
                'size_of_tenis' => $arr['size_of_tenis'],
                'product_with_a_color' => $arr['product_with_a_color'],
                'helmet_size' => $arr['helmet_size'],
                'size_of_calca' => $arr['size_of_calca'],
                'product_with_two_colors' => $arr['product_with_two_colors'],
                'voltage' => $arr['voltage'],
                'shirt_size' => $arr['shirt_size'],
                'ring_alliance_size' => $arr['ring_alliance_size'],
                'genre' => $arr['genre'],

            ];

            if (ModelExcel::where('sku', '=', $arr['sku'])->count()) {
                $permission = ModelExcel::where('sku', '=', $arr['sku'])->first();
                $permission->update($data);
            } else {
                ModelExcel::create($data);
            }

        }

    }

    public function array_data()
    {
        return [
            ['sku' => '7P7EE868P','parent_sku' => NULL,'active' => 'Sim','condition' => 'Novo','name' => 'Camiseta Marrom','description' => 'Camisa masculina 100% algodão.','availability_when_no_to_manage_stock' => '10.0','manage_inventory' => 'Não','quantity' => NULL,'availability_two_products_in_stock' => NULL,'availability_when_end_products_in_stock' => NULL,'price_cost' => '75.49','price_for_sale' => '169.00','promotional_price' => '161.00','category_level_1' => 'Roupas','category_level_2' => NULL,'category_level_3' => NULL,'brand' => 'Polo','peso_kg' => '0.500','height_cm' => '15','width_cm' => '13','length_cm' => '13','link_to_the_main_photo' => 'http://www.seueshop.com.br/images/_product/650/650277/produto-com-1-atributo-varias-imagens-483e8994cc.jpg','link_to_additional_photo_1' => 'http://www.seueshop.com.br/images/_product/650/650277/produto-com-1-atributo-varias-imagens-22e02454f9.jpg','link_to_additional_photo_2' => NULL,'link_to_additional_photo_3' => NULL,'url_old_product' => 'http://www.seueshop.com.br/p/camiseta-marrom.html','video_link_on_youtube' => 'https://www.youtube.com/watch?v=w3Omp7Zymtg','size_of_tenis' => NULL,'product_with_a_color' => NULL,'helmet_size' => NULL,'size_of_calca' => NULL,'product_with_two_colors' => NULL,'voltage' => NULL,'shirt_size' => NULL,'ring_alliance_size' => NULL,'genre' => NULL],
            ['sku' => 'N3B937VN4','parent_sku' => NULL,'active' => 'Sim','condition' => 'Novo','name' => 'Cargo Camera Bag Large','description' => 'Esta bolsa lhe permite dar mais segurança a sua câmera. Seu design foi projetado para acomodar melhor o equipamento.','availability_when_no_to_manage_stock' => '20.0','manage_inventory' => 'Não','quantity' => NULL,'availability_two_products_in_stock' => NULL,'availability_when_end_products_in_stock' => NULL,'price_cost' => '108.00','price_for_sale' => '188.00','promotional_price' => '172.80','category_level_1' => 'Acessórios','category_level_2' => 'Bolsas','category_level_3' => NULL,'brand' => 'Cargo','peso_kg' => '2.000','height_cm' => '15','width_cm' => '13','length_cm' => '13','link_to_the_main_photo' => 'http://www.seueshop.com.br/images/_product/275/275282/cargo-camera-bag-large-60.jpg','link_to_additional_photo_1' => NULL,'link_to_additional_photo_2' => NULL,'link_to_additional_photo_3' => NULL,'url_old_product' => 'http://www.seueshop.com.br/p/cargo-camera-bag-large.html','video_link_on_youtube' => 'https://www.youtube.com/watch?v=w3Omp7Zymtg','size_of_tenis' => NULL,'product_with_a_color' => NULL,'helmet_size' => NULL,'size_of_calca' => NULL,'product_with_two_colors' => NULL,'voltage' => NULL,'shirt_size' => NULL,'ring_alliance_size' => NULL,'genre' => NULL],
            ['sku' => 'V3HCWQTSC','parent_sku' => NULL,'active' => 'Sim','condition' => 'Usado','name' => 'Livro Construindo Sistemas Linux Embarcados','description' => 'Este é o livro para Linux embarcado. Embora muitas empresas usem o Linux em todo tipo de sistemas embarcados, há poucas fontes de informação sobre a criação, instalação e realização de testes no kernel do Linux e nas ferramentas relacionadas a ele.','availability_when_no_to_manage_stock' => NULL,'manage_inventory' => 'Sim','quantity' => '10','availability_two_products_in_stock' => NULL,'availability_when_end_products_in_stock' => '10','price_cost' => '16.00','price_for_sale' => '46.00','promotional_price' => '43.00','category_level_1' => 'Livros','category_level_2' => 'Informática','category_level_3' => 'Linux','brand' => 'Alta Books','peso_kg' => '0.800','height_cm' => '15','width_cm' => '20','length_cm' => '15','link_to_the_main_photo' => 'http://www.seueshop.com.br/images/_product/275/275206/livro-construindo-sistemas-linux-embarcados-16.jpg','link_to_additional_photo_1' => NULL,'link_to_additional_photo_2' => NULL,'link_to_additional_photo_3' => NULL,'url_old_product' => 'http://www.seueshop.com.br/p/livro-construindo-sistemas-linux-embarcados.html','video_link_on_youtube' => 'https://www.youtube.com/watch?v=QozCc2wX85U','size_of_tenis' => NULL,'product_with_a_color' => NULL,'helmet_size' => NULL,'size_of_calca' => NULL,'product_with_two_colors' => NULL,'voltage' => NULL,'shirt_size' => NULL,'ring_alliance_size' => NULL,'genre' => NULL],
            ['sku' => 'DV83PB4LT','parent_sku' => NULL,'active' => 'Sim','condition' => 'Novo','name' => 'Business Holster','description' => 'O Business Holster é um colete/coldre moderno que serve para guardar aparelhos como iPod ou smartphone, além da carteira, entre outros gadgets que pode ser usado por baixo do palitó de um terno ou jaqueta.','availability_when_no_to_manage_stock' => NULL,'manage_inventory' => 'Sim','quantity' => '10','availability_two_products_in_stock' => NULL,'availability_when_end_products_in_stock' => NULL,'price_cost' => '21.00','price_for_sale' => '47.00','promotional_price' => '39.00','category_level_1' => 'Cases','category_level_2' => NULL,'category_level_3' => NULL,'brand' => 'Apple','peso_kg' => '0.300','height_cm' => '15','width_cm' => '16','length_cm' => '15','link_to_the_main_photo' => 'http://www.seueshop.com.br/images/_product/275/275292/business-holster-76.jpg','link_to_additional_photo_1' => NULL,'link_to_additional_photo_2' => NULL,'link_to_additional_photo_3' => NULL,'url_old_product' => 'http://www.seueshop.com.br/p/business-holster.html','video_link_on_youtube' => 'https://www.youtube.com/watch?v=w3Omp7Zymtg','size_of_tenis' => NULL,'product_with_a_color' => NULL,'helmet_size' => NULL,'size_of_calca' => NULL,'product_with_two_colors' => NULL,'voltage' => NULL,'shirt_size' => NULL,'ring_alliance_size' => NULL,'genre' => NULL],
            ['sku' => 'KNNT9GQSY','parent_sku' => NULL,'active' => 'Sim','condition' => 'Novo','name' => 'Button Pinguim','description' => 'Coisa linda este Button, muito bonito e barato!','availability_when_no_to_manage_stock' => NULL,'manage_inventory' => 'Não','quantity' => NULL,'availability_two_products_in_stock' => NULL,'availability_when_end_products_in_stock' => NULL,'price_cost' => NULL,'price_for_sale' => NULL,'promotional_price' => NULL,'category_level_1' => NULL,'category_level_2' => NULL,'category_level_3' => NULL,'brand' => NULL,'peso_kg' => NULL,'height_cm' => NULL,'width_cm' => NULL,'length_cm' => NULL,'link_to_the_main_photo' => 'http://www.seueshop.com.br/images/_product/554/553547/produto-com-2-atributos-a-partir-de-baaf698145.jpg','link_to_additional_photo_1' => NULL,'link_to_additional_photo_2' => NULL,'link_to_additional_photo_3' => NULL,'url_old_product' => 'http://www.seueshop.com.br/p/produto-com-2-atributos-a-partir-de.html','video_link_on_youtube' => 'https://www.youtube.com/watch?v=QozCc2wX85U','size_of_tenis' => NULL,'product_with_a_color' => NULL,'helmet_size' => NULL,'size_of_calca' => NULL,'product_with_two_colors' => NULL,'voltage' => NULL,'shirt_size' => NULL,'ring_alliance_size' => NULL,'genre' => NULL],
            ['sku' => '7PWXWU6RE','parent_sku' => 'KNNT9GQSY','active' => 'Sim','condition' => 'Novo','name' => 'Button Pinguim','description' => 'Coisa linda este Button, muito bonito e barato!','availability_when_no_to_manage_stock' => NULL,'manage_inventory' => 'Sim','quantity' => '35','availability_two_products_in_stock' => NULL,'availability_when_end_products_in_stock' => NULL,'price_cost' => '5.00','price_for_sale' => '13.00','promotional_price' => NULL,'category_level_1' => 'Button','category_level_2' => NULL,'category_level_3' => NULL,'brand' => 'Tokidoki','peso_kg' => '0.600','height_cm' => '9','width_cm' => '11','length_cm' => '11','link_to_the_main_photo' => NULL,'link_to_additional_photo_1' => NULL,'link_to_additional_photo_2' => NULL,'link_to_additional_photo_3' => NULL,'url_old_product' => NULL,'video_link_on_youtube' => NULL,'size_of_tenis' => NULL,'product_with_a_color' => 'Verde','helmet_size' => NULL,'size_of_calca' => NULL,'product_with_two_colors' => NULL,'voltage' => NULL,'shirt_size' => NULL,'ring_alliance_size' => NULL,'genre' => NULL],
            ['sku' => '6ZM6ASBYJ','parent_sku' => 'KNNT9GQSY','active' => 'Sim','condition' => 'Novo','name' => 'Button Pinguim','description' => 'Coisa linda este Button, muito bonito e barato!','availability_when_no_to_manage_stock' => NULL,'manage_inventory' => 'Sim','quantity' => '50','availability_two_products_in_stock' => NULL,'availability_when_end_products_in_stock' => NULL,'price_cost' => '5.00','price_for_sale' => '1600.00','promotional_price' => NULL,'category_level_1' => 'Button','category_level_2' => NULL,'category_level_3' => NULL,'brand' => 'Tokidoki','peso_kg' => '0.600','height_cm' => '9','width_cm' => '11','length_cm' => '11','link_to_the_main_photo' => NULL,'link_to_additional_photo_1' => NULL,'link_to_additional_photo_2' => NULL,'link_to_additional_photo_3' => NULL,'url_old_product' => NULL,'video_link_on_youtube' => NULL,'size_of_tenis' => NULL,'product_with_a_color' => 'Azul','helmet_size' => NULL,'size_of_calca' => NULL,'product_with_two_colors' => NULL,'voltage' => NULL,'shirt_size' => NULL,'ring_alliance_size' => NULL,'genre' => NULL],
            ['sku' => '3H23SQCKZ','parent_sku' => 'KNNT9GQSY','active' => 'Sim','condition' => 'Novo','name' => 'Button Pinguim','description' => 'Coisa linda este Button, muito bonito e barato!','availability_when_no_to_manage_stock' => NULL,'manage_inventory' => 'Sim','quantity' => '60','availability_two_products_in_stock' => NULL,'availability_when_end_products_in_stock' => NULL,'price_cost' => '5.00','price_for_sale' => '21.00','promotional_price' => NULL,'category_level_1' => 'Button','category_level_2' => NULL,'category_level_3' => NULL,'brand' => 'Tokidoki','peso_kg' => '0.600','height_cm' => '9','width_cm' => '11','length_cm' => '11','link_to_the_main_photo' => NULL,'link_to_additional_photo_1' => NULL,'link_to_additional_photo_2' => NULL,'link_to_additional_photo_3' => NULL,'url_old_product' => NULL,'video_link_on_youtube' => NULL,'size_of_tenis' => NULL,'product_with_a_color' => 'Vermelho','helmet_size' => NULL,'size_of_calca' => NULL,'product_with_two_colors' => NULL,'voltage' => NULL,'shirt_size' => NULL,'ring_alliance_size' => NULL,'genre' => NULL]
        ];

    }

}
