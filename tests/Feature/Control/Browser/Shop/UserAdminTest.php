<?php

namespace Tests\Feature\Control\Browser\Shop;

use Tests\TestCase;
use App\Models\User;
use App\Models\Role;

class UserAdminTest extends TestCase
{

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
    public function testClickLinkUserShopAdminInMenuSidebar()
    {

        $this->visit(route('control.dashboard'))
        ->click('control-users-shops-admin-read')
        ->see('Shop');

    }

    /**
    * @test
    */
    public function testShouldEditNewUserShopAdmin()
    {

        //Update
        $this->visit(route('control.users.shops.admin.read'))
        ->click('edit-'.self::$factory->id)
        ->see(self::$factory->name)
        ->type('testing_'.self::$factory->name, 'name')
        ->type(self::$factory->email, 'email')
        ->press('Alterar')
        ->seePageIs(route('control.users.shops.admin.read'))
        ->see('success');

    }

    /**
    * @test
    */
    public function testShouldGenerateNewPassword()
    {

        $this->visit(route('control.users.shops.admin.new.password', self::$factory->id))
        ->seePageIs(route('control.users.shops.admin.read'))
        ->see('success');

    }

    /**
    * @depends testShouldGenerateNewPassword
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
