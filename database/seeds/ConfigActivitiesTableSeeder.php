<?php

use Illuminate\Database\Seeder;
use App\Models\ConfigActivities as s;

class ConfigActivitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        s::truncate();

        foreach ($this->array_data() as $arr) {
            s::create([
                'name' => $arr['name'],
                'description' => NULL,
                'link_rewrite' => NULL,
                'meta_title' => NULL,
                'meta_keywords' => NULL,
                'meta_description' => NULL,
                'active' => 1
            ]);
        }
    }

    public function array_data()
    {
        return [
            ['name' => 'Acessórios Automotivos','description' => NULL,'link_rewrite' => '','meta_title' => NULL,'meta_keywords' => NULL,'meta_description' => NULL,'active' => '1'],
            ['name' => 'Alimentos e Bebidas','description' => NULL,'link_rewrite' => '','meta_title' => NULL,'meta_keywords' => NULL,'meta_description' => NULL,'active' => '1'],
            ['name' => 'Arte e Antiguidades','description' => NULL,'link_rewrite' => '','meta_title' => NULL,'meta_keywords' => NULL,'meta_description' => NULL,'active' => '1'],
            ['name' => 'Artesanato','description' => NULL,'link_rewrite' => '','meta_title' => NULL,'meta_keywords' => NULL,'meta_description' => NULL,'active' => '1'],
            ['name' => 'Artigos promocionais','description' => NULL,'link_rewrite' => '','meta_title' => NULL,'meta_keywords' => NULL,'meta_description' => NULL,'active' => '1'],
            ['name' => 'Artigos Religiosos','description' => NULL,'link_rewrite' => '','meta_title' => NULL,'meta_keywords' => NULL,'meta_description' => NULL,'active' => '1'],
            ['name' => 'Bebês e Cia','description' => NULL,'link_rewrite' => '','meta_title' => NULL,'meta_keywords' => NULL,'meta_description' => NULL,'active' => '1'],
            ['name' => 'Blu-Ray, DVD, CD e VHS','description' => NULL,'link_rewrite' => '','meta_title' => NULL,'meta_keywords' => NULL,'meta_description' => NULL,'active' => '1'],
            ['name' => 'Brinquedos e Colecionáveis','description' => NULL,'link_rewrite' => '','meta_title' => NULL,'meta_keywords' => NULL,'meta_description' => NULL,'active' => '1'],
            ['name' => 'Casa e Decoração','description' => NULL,'link_rewrite' => '','meta_title' => NULL,'meta_keywords' => NULL,'meta_description' => NULL,'active' => '1'],
            ['name' => 'Construção e Ferramentas','description' => NULL,'link_rewrite' => '','meta_title' => NULL,'meta_keywords' => NULL,'meta_description' => NULL,'active' => '1'],
            ['name' => 'Cosméticos, Perfumaria e Cuidados Pessoais','description' => NULL,'link_rewrite' => '','meta_title' => NULL,'meta_keywords' => NULL,'meta_description' => NULL,'active' => '1'],
            ['name' => 'Eletrodomésticos','description' => NULL,'link_rewrite' => '','meta_title' => NULL,'meta_keywords' => NULL,'meta_description' => NULL,'active' => '1'],
            ['name' => 'Eletrônicos','description' => NULL,'link_rewrite' => '','meta_title' => NULL,'meta_keywords' => NULL,'meta_description' => NULL,'active' => '1'],
            ['name' => 'Esporte e Lazer','description' => NULL,'link_rewrite' => '','meta_title' => NULL,'meta_keywords' => NULL,'meta_description' => NULL,'active' => '1'],
            ['name' => 'Fitness e Suplementos','description' => NULL,'link_rewrite' => '','meta_title' => NULL,'meta_keywords' => NULL,'meta_description' => NULL,'active' => '1'],
            ['name' => 'Fotografia','description' => NULL,'link_rewrite' => '','meta_title' => NULL,'meta_keywords' => NULL,'meta_description' => NULL,'active' => '1'],
            ['name' => 'Games','description' => NULL,'link_rewrite' => '','meta_title' => NULL,'meta_keywords' => NULL,'meta_description' => NULL,'active' => '1'],
            ['name' => 'Gráfica','description' => NULL,'link_rewrite' => '','meta_title' => NULL,'meta_keywords' => NULL,'meta_description' => NULL,'active' => '1'],
            ['name' => 'Informática','description' => NULL,'link_rewrite' => '','meta_title' => NULL,'meta_keywords' => NULL,'meta_description' => NULL,'active' => '1'],
            ['name' => 'Ingressos','description' => NULL,'link_rewrite' => '','meta_title' => NULL,'meta_keywords' => NULL,'meta_description' => NULL,'active' => '1'],
            ['name' => 'Instrumentos Musicais','description' => NULL,'link_rewrite' => '','meta_title' => NULL,'meta_keywords' => NULL,'meta_description' => NULL,'active' => '1'],
            ['name' => 'Livros e Revistas','description' => NULL,'link_rewrite' => '','meta_title' => NULL,'meta_keywords' => NULL,'meta_description' => NULL,'active' => '1'],
            ['name' => 'Moda e Acessórios','description' => NULL,'link_rewrite' => '','meta_title' => NULL,'meta_keywords' => NULL,'meta_description' => NULL,'active' => '1'],
            ['name' => 'Móveis','description' => NULL,'link_rewrite' => '','meta_title' => NULL,'meta_keywords' => NULL,'meta_description' => NULL,'active' => '1'],
            ['name' => 'Papelaria e Escritório','description' => NULL,'link_rewrite' => '','meta_title' => NULL,'meta_keywords' => NULL,'meta_description' => NULL,'active' => '1'],
            ['name' => 'Pet Shop','description' => NULL,'link_rewrite' => '','meta_title' => NULL,'meta_keywords' => NULL,'meta_description' => NULL,'active' => '1'],
            ['name' => 'Presentes, Flores e Cestas','description' => NULL,'link_rewrite' => '','meta_title' => NULL,'meta_keywords' => NULL,'meta_description' => NULL,'active' => '1'],
            ['name' => 'Relojoaria e Joalheria','description' => NULL,'link_rewrite' => '','meta_title' => NULL,'meta_keywords' => NULL,'meta_description' => NULL,'active' => '1'],
            ['name' => 'Saúde','description' => NULL,'link_rewrite' => '','meta_title' => NULL,'meta_keywords' => NULL,'meta_description' => NULL,'active' => '1'],
            ['name' => 'Sex Shop','description' => NULL,'link_rewrite' => '','meta_title' => NULL,'meta_keywords' => NULL,'meta_description' => NULL,'active' => '1'],
            ['name' => 'Telefonia e Celulares','description' => NULL,'link_rewrite' => '','meta_title' => NULL,'meta_keywords' => NULL,'meta_description' => NULL,'active' => '1'],
            ['name' => 'Viagens e Turismo','description' => NULL,'link_rewrite' => '','meta_title' => NULL,'meta_keywords' => NULL,'meta_description' => NULL,'active' => '1'],
        ];
    }
}
