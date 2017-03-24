<?php

namespace Tests\Feature\Control\Browser\Shop;

use Tests\TestCase;
use App\Models\User;
use App\Models\Role;

class UserEditorTest extends TestCase
{

    protected static $factory = false;

    public function setUp()
    {
        parent::setUp();

        if (!self::$factory) {

            self::$factory = factory(User::class, 1)->create(['active' => true])->first();
            $user = User::findOrFail(self::$factory->id);
            $role = Role::where('name', 'shop_editor')->first()->id;
            $user->roles()->attach((array)$role);

        }

    }

    /**
    * @test
    */
    public function testClickLinkUserShopEditorInMenuSidebar()
    {

        $this->visit(route('control.dashboard'))
        ->click('control-users-shops-editor-read')
        ->see('Editores');

    }

    /**
    * @test
    */
    public function testShouldEditNewUserShopEditor()
    {

        //Update
        $this->visit(route('control.users.shops.editor.read'))
        ->click('edit-'.self::$factory->id)
        ->see(self::$factory->name)
        ->type('testing_'.self::$factory->name, 'name')
        ->type(self::$factory->email, 'email')
        ->press('Alterar')
        ->seePageIs(route('control.users.shops.editor.read'))
        ->see('success');

    }

    /**
    * @test
    */
    public function testShouldGenerateNewPassword()
    {
        $this->visit(route('control.users.shops.editor.new.password', self::$factory->id))
        ->seePageIs(route('control.users.shops.editor.read'))
        ->see('success');

    }

    /**
    * @depends testShouldGenerateNewPassword
    */
    public function testDeleteNewUserShopEditor()
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
