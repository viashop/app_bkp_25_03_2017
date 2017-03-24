<?php

use Illuminate\Database\Seeder;
use App\Models\LogActivityType as s;

class LogActivityTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        s::truncate();
        s::create(['name' => 'registered', 'description' => 'Registrado']);
        s::create(['name' => 'logged', 'description' => 'Logado']);
        s::create(['name' => 'added', 'description' => 'Adicionado']);
        s::create(['name' => 'changead', 'description' => 'Alterado']);
        s::create(['name' => 'removed', 'description' => 'Removido']);
        s::create(['name' => 'recover-password', 'description' => 'Iniciou recuperação de senha']);
        s::create(['name' => 'reset-password', 'description' => 'Alterou a senha']);
        s::create(['name' => 'generate-password', 'description' => 'Gerou uma nova senha']);
        s::create(['name' => 'global-login-invalid', 'description' => 'Login com email e senha inválidos', 'global' => true]);
        s::create(['name' => 'global-login-password-invalid', 'description' => 'Login com senha inválida', 'global' => true]);

    }
}
