<?php

namespace Tests\Feature\Control\Browser\Authorization;

use App\Models\Role;
use Tests\TestCase;

class RoleTest extends TestCase
{

    protected static $random;
    protected static $id;

    public function setUp()
    {
        parent::setUp();

        if (!isset(self::$random)) {
            self::$random = str_random(10);
        }

    }

    /**
    * @test
    */
    public function testClickLinkRoleInMenuSidebar()
    {

        $this->visit(route('control.dashboard'))
        ->click('control-authorization-role-read')
        ->seePageIs(route('control.authorization.role.read'));
    }

    /**
    * @depends testClickLinkRoleInMenuSidebar
    */
    public function testShoudExistsListSlugInPermission()
    {

        $this->visit(route('control.authorization.role.read'))
        ->see('administrator')
        ->see('staff_auditor')
        ->see('staff_finance')
        ->see('staff_commercial')
        ->see('staff_support')        
        ->see('staff_sale')
        ->see('staff_marketing')
        ->see('shop_admin')
        ->see('shop_editor')
        ->see('shop_customer')
        ->see('affiliate');

    }


    /**
    * @test
    */
    public function testShouldRegisterNewRole()
    {

        //Insert
        $this->visit(route('control.authorization.role.read'))
        ->click('new-role')
        ->see('Cadastrar')
        ->type(self::$random, 'description')
        ->type(self::$random, 'name')
        ->press('Cadastrar')
        ->see('success');

        if (!isset(self::$id)) {
            self::$id = Role::where('name', str_slug(self::$random))->first()->id;
        }

    }

    /**
    * @test
    */
    public function testShouldEditNewRole()
    {

        //Update
        $this->visit( route('control.authorization.role.read.search', self::$random ))
        ->see(self::$random)
        ->click('edit-'. self::$id)
        ->type('testing '. self::$random, 'name')
        ->type(self::$random, 'description')
        ->press('Alterar')
        ->see('success');

    }

    /**
    * @test
    */
    public function testShouldRemoveRole()
    {

        $this->visit(route('control.authorization.role.read.search', self::$random ))
        ->see(self::$random)
        ->click('remove-'. self::$id)
        ->see('success');

    }

}
