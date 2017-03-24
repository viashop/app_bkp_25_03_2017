<?php

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        foreach ($this->array_data() as $arr) {

            if (Role::where('name', '=', $arr['name'])->count()) {

                $data = [
                    'name' => $arr['name'],
                    'description' => $arr['description'],
                    'default' => isset($arr['default']) ? true : false
                ];

                $role = Role::where('name', '=', $arr['name'])->first();
                $role->update($data);

            } else {

                $role = new Role();
                $role->name = $arr['name'];
                $role->description = $arr['description'];
                $role->default = isset($arr['default']) ? true : false;
                $role->save();

                $array_crud = ['browser', 'add','read', 'edit', 'delete'];
                foreach ($array_crud as $value) {
                    $permission = Permission::where('name', sprintf('%s_%s', $value, $arr['name'] ) )->first();
                    $role->permissions()->attach($permission);
                }

            }

        }

    }

    public function array_data()
    {
        return [

            ['name' => 'administrator', 'description' => 'Administrador Geral' , 'default' => true],
            ['name' => 'staff_auditor', 'description' => 'Departamento de Auditoria' , 'default' => true],
            ['name' => 'staff_finance', 'description' => 'Departamento de Financeiro' , 'default' => true],
            ['name' => 'staff_commercial', 'description' => 'Departamento de Comercial' , 'default' => true],
            ['name' => 'staff_support', 'description' => 'Departamento de Suporte' , 'default' => true],
            ['name' => 'staff_sale', 'description' => 'Departamento de Vendas' , 'default' => true],
            ['name' => 'staff_marketing', 'description' => 'Departamento de Marketing' , 'default' => true],
            ['name' => 'shop_admin', 'description' => 'Shop Virtual - Admin' , 'default' => true],
            ['name' => 'shop_editor', 'description' => 'Shop Virtual - Editor' , 'default' => true],
            ['name' => 'shop_customer', 'description' => 'Shop Virtual - Cliente' , 'default' => true],
            ['name' => 'affiliate', 'description' => 'Gestão e Afiliados' , 'default' => true],

            ['name' => 'api_erp_bling', 'description' => 'Bling Sistema ERP Online'],

        ];

    }

}
