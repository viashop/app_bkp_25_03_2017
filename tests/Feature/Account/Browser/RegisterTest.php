<?php

namespace Tests\Feature\Account\Browser;

use App\Models\User;
use Tests\TestCase;

class RegisterTest extends TestCase
{

    protected static $email;

    /**
     * @test
     */
    public function testShouldVerifyExistsPageRegisterAccountStoreViaBrowser()
    {
        $this->visit(route('account.register'))
            ->assertResponseStatus(200);
    }

    /**
     * @test
     */
    public function testShouldRegisterNewAccountStoreViaBrowser()
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
            //->seePageIs(route('account.register'))
            ->see('message-success');

    }

    /**
     * @test
     */
    public function testShouldNotRegisterNewAccountStoreViaBrowser()
    {

        $faker = \Faker\Factory::create();
        $password = $faker->password;

        //view Error
        $this->visit(route('account.register'))
            ->see('Loja Virtual')
            ->type($faker->name, 'name')
            ->type(self::$email, 'email')
            ->type($password, 'password')
            ->type($password, 'password_confirmation')
            ->press('register')
            //->seePageIs(route('account.register'))
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