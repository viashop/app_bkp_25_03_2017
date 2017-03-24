<?php

namespace Tests\Feature\Account\Browser;

use App\Models\User;
use Tests\TestCase;

class LoginTest extends TestCase
{

    protected static $email;

    /**
     * @test
     */
    public function testShouldVerifyExistsPageLoginAccountStoreViaBrowser()
    {
        $this->visit(route('account.login'))
            ->assertResponseStatus(200);
    }

    /**
     * @test
     */
    public function testShouldRegisterNewUserAndAuthenticateAccountStoreViaBrowser()
    {

        $faker = \Faker\Factory::create();
        $password = $faker->password;

        if (!isset(self::$email)) {
            self::$email = $faker->email;
        }

        $this->visit(route('account.register'))
            ->see('Loja Virtual')
            ->type($faker->name, 'name')
            ->type(self::$email, 'email')
            ->type($password, 'password')
            ->type($password, 'password_confirmation')
            ->press('register')
            ->see('message-success');


    }

    /**
     * @test
     */
    public function testShouldNotAuthenticateAccountStoreViaBrowser()
    {

        $faker = \Faker\Factory::create();
        $password = $faker->password;

        if (!isset(self::$email)) {
            self::$email = $faker->email;
        }

        $this->visit(route('account.login'))
            ->see('Entrar')
            ->type(self::$email, 'email')
            ->type($password, 'password')
            ->press('login')
            ->see('message-error');


    }

    /**
     * @test
     */
    public function testDeleteNewUserShopAdmin()
    {

        $id = User::where('email', self::$email)->first()->id;

        if(is_numeric($id)){

            User::destroy($id);
            $task = User::withTrashed()->findOrFail($id);
            if(!$task->trashed()){
                $re = $task->delete();
            } else {
                $re = $task->forceDelete();
            }
            $this->assertTrue($re);

        } else {
            $this->assertTrue(false);
        }

    }

}
