<?php

use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionsTableSeeder extends Seeder
{

    private static $browser = 'Autorizar Browser em ';
    private static $create = 'Cadastrar em ';
    private static $read = 'Visualizar em ';
    private static $update = 'Editar em ';
    private static $delete = 'Deletar em ';
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        foreach ($this->array_data() as $arr) {

            $data = [
                'name' => $arr['name'],
                'description' => $arr['description'],
                'default' => isset($arr['default']) ? true : false
            ];

            if (Permission::where('name', '=', $arr['name'])->count()) {
                $permission = Permission::where('name', '=', $arr['name'])->first();
                $permission->update($data);
            } else {
                Permission::create($data);
            }

        }

    }

    public function array_data()
    {
        return [

            ['name' => 'browser_administrator', 'description' => self::$browser .'Administrador Geral', 'default' => true],
            ['name' => 'add_administrator', 'description' => self::$create .'Administrador Geral', 'default' => true],
            ['name' => 'read_administrator', 'description' => self::$read .'Administrador Geral', 'default' => true],
            ['name' => 'edit_administrator', 'description' => self::$update .'Administrador Geral', 'default' => true],
            ['name' => 'delete_administrator', 'description' => self::$delete .'Administrador Geral', 'default' => true],

            ['name' => 'browser_staff_auditor', 'description' => self::$browser .'Departamento de Auditoria', 'default' => true],
            ['name' => 'add_staff_auditor', 'description' => self::$create .'Departamento de Auditoria', 'default' => true],
            ['name' => 'read_staff_auditor', 'description' => self::$read .'Departamento de Auditoria', 'default' => true],
            ['name' => 'edit_staff_auditor', 'description' => self::$update .'Departamento de Auditoria', 'default' => true],
            ['name' => 'delete_staff_auditor', 'description' => self::$delete .'Departamento de Auditoria', 'default' => true],

            ['name' => 'browser_staff_finance', 'description' => self::$browser .'Departamento de Financeiro', 'default' => true],
            ['name' => 'add_staff_finance', 'description' => self::$create .'Departamento de Financeiro', 'default' => true],
            ['name' => 'read_staff_finance', 'description' => self::$read .'Departamento de Financeiro', 'default' => true],
            ['name' => 'edit_staff_finance', 'description' => self::$update .'Departamento de Financeiro', 'default' => true],
            ['name' => 'delete_staff_finance', 'description' => self::$delete .'Departamento de Financeiro', 'default' => true],

            ['name' => 'browser_staff_commercial', 'description' => self::$browser .'Departamento de Comercial', 'default' => true],
            ['name' => 'add_staff_commercial', 'description' => self::$create .'Departamento de Comercial', 'default' => true],
            ['name' => 'read_staff_commercial', 'description' => self::$read .'Departamento de Comercial', 'default' => true],
            ['name' => 'edit_staff_commercial', 'description' => self::$update .'Departamento de Comercial', 'default' => true],
            ['name' => 'delete_staff_commercial', 'description' => self::$delete .'Departamento de Comercial', 'default' => true],

            ['name' => 'browser_staff_support', 'description' => self::$browser .'Departamento de Suporte', 'default' => true],
            ['name' => 'add_staff_support', 'description' => self::$create .'Departamento de Suporte', 'default' => true],
            ['name' => 'read_staff_support', 'description' => self::$read .'Departamento de Suporte', 'default' => true],
            ['name' => 'edit_staff_support', 'description' => self::$update .'Departamento de Suporte', 'default' => true],
            ['name' => 'delete_staff_support', 'description' => self::$delete .'Departamento de Suporte', 'default' => true],

            ['name' => 'browser_staff_sale', 'description' => self::$browser .'Departamento de Vendas', 'default' => true],
            ['name' => 'add_staff_sale', 'description' => self::$create .'Departamento de Vendas', 'default' => true],
            ['name' => 'read_staff_sale', 'description' => self::$read .'Departamento de Vendas', 'default' => true],
            ['name' => 'edit_staff_sale', 'description' => self::$update .'Departamento de Vendas', 'default' => true],
            ['name' => 'delete_staff_sale', 'description' => self::$delete .'Departamento de Vendas', 'default' => true],

            ['name' => 'browser_staff_marketing', 'description' => self::$browser .'Departamento de Marketing', 'default' => true],
            ['name' => 'add_staff_marketing', 'description' => self::$create .'Departamento de Marketing', 'default' => true],
            ['name' => 'read_staff_marketing', 'description' => self::$read .'Departamento de Marketing', 'default' => true],
            ['name' => 'edit_staff_marketing', 'description' => self::$update .'Departamento de Marketing', 'default' => true],
            ['name' => 'delete_staff_marketing', 'description' => self::$delete .'Departamento de Marketing', 'default' => true],

            ['name' => 'browser_shop_admin', 'description' => self::$browser .'Shop Virtual - Admin', 'default' => true],
            ['name' => 'add_shop_admin', 'description' => self::$create .'Shop Virtual - Admin', 'default' => true],
            ['name' => 'read_shop_admin', 'description' => self::$read .'Shop Virtual - Admin', 'default' => true],
            ['name' => 'edit_shop_admin', 'description' => self::$update .'Shop Virtual - Admin', 'default' => true],
            ['name' => 'delete_shop_admin', 'description' => self::$delete .'Shop Virtual - Admin', 'default' => true],

            ['name' => 'browser_shop_editor', 'description' => self::$browser .'Shop Virtual - Editor', 'default' => true],
            ['name' => 'add_shop_editor', 'description' => self::$create .'Shop Virtual - Editor', 'default' => true],
            ['name' => 'read_shop_editor', 'description' => self::$read .'Shop Virtual - Editor', 'default' => true],
            ['name' => 'edit_shop_editor', 'description' => self::$update .'Shop Virtual - Editor', 'default' => true],
            ['name' => 'delete_shop_editor', 'description' => self::$delete .'Shop Virtual - Editor', 'default' => true],

            ['name' => 'browser_shop_customer', 'description' => self::$browser .'Shop Virtual - Cliente', 'default' => true],
            ['name' => 'add_shop_customer', 'description' => self::$create .'Shop Virtual - Cliente', 'default' => true],
            ['name' => 'read_shop_customer', 'description' => self::$read .'Shop Virtual - Cliente', 'default' => true],
            ['name' => 'edit_shop_customer', 'description' => self::$update .'Shop Virtual - Cliente', 'default' => true],
            ['name' => 'delete_shop_customer', 'description' => self::$delete .'Shop Virtual - Cliente', 'default' => true],

            ['name' => 'browser_affiliate', 'description' => self::$browser .'Gestão e Afiliados', 'default' => true],
            ['name' => 'add_affiliate', 'description' => self::$create .'Gestão e Afiliados', 'default' => true],
            ['name' => 'read_affiliate', 'description' => self::$read .'Gestão e Afiliados', 'default' => true],
            ['name' => 'edit_affiliate', 'description' => self::$update .'Gestão e Afiliados', 'default' => true],
            ['name' => 'delete_affiliate', 'description' => self::$delete .'Gestão e Afiliados', 'default' => true],

            ['name' => 'browser_api_erp_bling', 'description' => self::$browser .'Bling Sistema ERP Online'],
            ['name' => 'add_api_erp_bling', 'description' => self::$create .'Bling Sistema ERP Online'],
            ['name' => 'read_api_erp_bling', 'description' => self::$read .'Bling Sistema ERP Online'],
            ['name' => 'edit_api_erp_bling', 'description' => self::$update .'Bling Sistema ERP Online'],
            ['name' => 'delete_api_erp_bling', 'description' => self::$delete .'Bling Sistema ERP Online'],

        ];

    }

}
