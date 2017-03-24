<?php

namespace Tests\Feature\Account\Browser;

use App\Models\Role;
use App\Models\User;
use Tests\TestCase;

class RecoverPasswordTest extends TestCase
{

    protected static $email;

    protected static $factory = false;

    public function setUp()
    {
        parent::setUp();

        if (!self::$factory) {

            self::$factory = factory(User::class, 1)->create(['active' => true])->first();
            $user = User::findOrFail(self::$factory->id);
            $role = Role::where('name', 'shop_admin')->first()->id;
            $user->roles()->attach((array)$role);

        }

    }

    /**
     * @test
     */
    public function testShouldVerifyLinkPageLoginViaBrowser()
    {
        $this->visit(route('account.login'))
            ->click('Esqueceu')
            ->seePageIs(route('account.recover'))
            ->assertResponseStatus(200);
    }

    /**
     * @test
     */
    public function testShouldVerifyNotUserFakeRegisteredInAccountStoreViaBrowser()
    {

        $faker = \Faker\Factory::create();
        $this->visit(route('account.recover'))
            ->see('Esqueceu')
            ->type($faker->email, 'email')
            ->press('recover-password')
            ->see('message-error');


    }

    /**
     * @test
     */
    public function testShouldRecoverPasswordAndSendEmailViaBrowser()
    {

        $this->visit(route('account.recover'))
            ->see('Esqueceu')
            ->type(self::$factory->email, 'email')
            ->press('recover-password')
            ->see('Recuperação da senha solicitada');


    }

    /**
     * @test
     */
    public function testDeleteNewUserShopAdmin()
    {

        User::destroy(self::$factory->id);
        $task = User::withTrashed()->findOrFail(self::$factory->id);
        if(!$task->trashed()){
            $re = $task->delete();
        } else {
            $re = $task->forceDelete();
        }

        $this->assertTrue($re);

    }

}
