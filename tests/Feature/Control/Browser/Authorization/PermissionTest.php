<?php

namespace Tests\Feature\Control\Browser\Authorization;

use App\Models\Permission;
use Tests\TestCase;

class PermissionTest extends TestCase
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
    public function testClickLinkPermissionInMenuSidebar()
    {
        $this->visit(route('control.dashboard'))
        ->click('control-authorization-permission-read')
        ->seePageIs(route('control.authorization.permission.read'));
    }

    /**
    * @depends testClickLinkPermissionInMenuSidebar
    */
    public function testShoudExistsListSlugInPermission()
    {
        $this->visit(route('control.authorization.permission.read'))
            ->see('browser_administrator')
            ->see('add_administrator')
            ->see('read_administrator')
            ->see('edit_administrator')
            ->see('delete_administrator')
            ->see('browser_staff_auditor')
            ->see('add_staff_auditor')
            ->see('read_staff_auditor')
            ->see('edit_staff_auditor')
            ->see('delete_staff_auditor')
            ->see('browser_staff_finance')
            ->see('add_staff_finance')
            ->see('read_staff_finance')
            ->see('edit_staff_finance')
            ->see('delete_staff_finance')
            ->see('browser_staff_commercial')
            ->see('add_staff_commercial')
            ->see('read_staff_commercial')
            ->see('edit_staff_commercial')
            ->see('delete_staff_commercial')
            ->see('browser_staff_support')
            ->see('add_staff_support')
            ->see('read_staff_support')
            ->see('edit_staff_support')
            ->see('delete_staff_support')
            ->see('browser_staff_sale')
            ->see('add_staff_sale')
            ->see('read_staff_sale')
            ->see('edit_staff_sale')
            ->see('delete_staff_sale')
            ->see('browser_staff_marketing')
            ->see('add_staff_marketing')
            ->see('read_staff_marketing')
            ->see('edit_staff_marketing')
            ->see('delete_staff_marketing')
            ->see('browser_shop_admin')
            ->see('add_shop_admin')
            ->see('read_shop_admin')
            ->see('edit_shop_admin')
            ->see('delete_shop_admin')
            ->see('browser_shop_editor')
            ->see('add_shop_editor')
            ->see('read_shop_editor')
            ->see('edit_shop_editor')
            ->see('delete_shop_editor')
            ->see('browser_shop_customer')
            ->see('add_shop_customer')
            ->see('read_shop_customer')
            ->see('edit_shop_customer')
            ->see('delete_shop_customer')
            ->visit(route('control.authorization.permission.read.page', 2))
            ->see('browser_affiliate')
            ->see('add_affiliate')
            ->see('read_affiliate')
            ->see('edit_affiliate')
            ->see('delete_affiliate');

    }

    /**
    * @test
    */
    public function testShouldRegisterNewPermission()
    {

        //Insert
        $this->visit(route('control.authorization.permission.read'))
        ->click('new-permission')
        ->see('Cadastrar')
        ->type(self::$random, 'description')
        ->type(self::$random, 'name')
        ->press('Cadastrar')
        ->see('success');

        if (!isset(self::$id)) {
            self::$id = Permission::where('name', str_slug(self::$random))->first()->id;
        }

    }

    /**
    * @test
    */
    public function testShouldEditNewRole()
    {

        //Update
        $this->visit(route('control.authorization.permission.read.search', self::$random ))
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

        $this->visit(route('control.authorization.permission.read.search', self::$random ))
        ->see(self::$random)
        ->click('remove-'. self::$id)
        ->see('success');

    }

}
