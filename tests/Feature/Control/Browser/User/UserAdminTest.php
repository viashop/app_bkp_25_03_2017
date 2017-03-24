<?php

namespace Tests\Feature\Control\Browser\User;

use Tests\TestCase;
use App\Models\User;

class UserAdminTest extends TestCase
{

    protected static $name;
    protected static $email;
    protected static $id;

    /**
    * @test
    */
    public function setUp()
    {

        parent::setUp();

        if (!isset(self::$name, self::$email)) {

            $faker = \Faker\Factory::create();
            self::$name = $faker->name;
            self::$email = $faker->email;

        }

    }

    /**
    * @test
    */
    public function testClickLinkUserAdminInMenuSidebar()
    {

        $this->visit(route('control.dashboard'))
        ->click('control-user-read')
        ->see('Admin');

    }

    /**
    * @test
    */
    public function testExistUserAdministrators()
    {

        $this->visit(route('control.users.admin.read'))
        ->see('Administrador')
        ->see('Financeiro')
        ->see('Comercial')
        ->see('Suporte');

    }

    /**
    * @test
    */
    public function testShouldUrlRegisterNewUserAdmin()
    {
        // //Insert
        $this->visit(route('control.users.admin.read'))
        ->click('new-user')
        ->see('Cadastrar');

    }

    /**
    * @depends testShouldUrlRegisterNewUserAdmin
    */
    public function testShouldRegisterNewUserAdmin()
    {

        if (!isset(self::$id)) {
            $user = new User();
            $user->name = self::$name;
            $user->email = self::$email;
            $user->active = true;
            $user->admin = true;
            $user->password = bcrypt( self::$name );
            $user->save();
            self::$id = $user->id;
            $user->roles()->attach(1);
        }

    }

    /**
    * @test
    */
    public function testShouldEditNewUserAdmin()
    {

        //Update
        $this->visit(route('control.users.admin.read'))
        ->click('edit-user-'. self::$id)
        ->see(self::$name)
        ->type('testing_'.self::$name, 'name')
        ->type(self::$email, 'email')
        ->press('Alterar')
        ->seePageIs(route('control.users.admin.read'))
        ->see('success');

    }

    /**
    * @test
    */
    public function testShouldGenerateNewPassword()
    {

        //Remove Permanently
        $this->visit(route('control.users.admin.new.password', self::$id))
        ->see('success');

    }

    /**
    * @test
    */
    public function testShouldRemoveNewUserAdmin()
    {

        $this->visit(route('control.users.admin.delete', self::$id))
        ->visit(route('control.users.admin.read.trashed'))
        ->see(self::$email);

    }

    public function testShouldEditUserAdminTrashed()
    {

        //Edit trashed
        $this->visit(route('control.users.admin.read.trashed'))
        ->click('edit-user-'. self::$id)
        ->type('trashed_'.self::$name, 'name')
        ->type(self::$email, 'email')
        ->press('Alterar')
        ->seePageIs(route('control.users.admin.read.trashed'))
        ->see('success');

    }

    public function testShouldRemoveUserAdminTrashedPermanently()
    {
        //Remove Permanently
        $this->visit(route('control.users.admin.delete.trashed', self::$id))
        ->seePageIs(route('control.users.admin.read.trashed'))
        ->see('success');

    }

}
