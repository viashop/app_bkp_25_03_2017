<?php

namespace Tests\Feature\Control\Browser\Authorization;

use Tests\TestCase;
use App\Models\Role;
use App\Models\Permission;

class AuthorizationPermissionRoleTest extends TestCase
{

    protected static $permission_id;
    protected static $role_id;

    public function setUp()
    {
        parent::setUp();
        if (!isset(self::$role_id)) {
            self::$role_id = Role::where('name', 'administrator')->first()->id;
        }

        if (!isset(self::$permission_id)) {
            self::$permission_id = Permission::where('name', 'browser_staff_auditor')->first()->id;
        }

    }

    /**
     * @test
     */
    public function testPermissionRoleListIdDevelop()
    {
        $this->visit(route('control.authorization.role.read.permission', self::$role_id))
        ->see('browser_administrator')
        ->see('add_administrator')
        ->see('read_administrator')
        ->see('edit_administrator')
        ->see('delete_administrator');
    }

    /**
     * @test
     */
    public function testShouldAddNewAuthorizePermissionPerRole()
    {
        $this->visit(route('control.authorization.role.read.permission', self::$role_id))
        ->select(self::$permission_id, 'permission_id')
        ->press('add')
        ->see('success');
    }

    /**
     * @test
     */
    public function testShouldRevokeNewAuthorizePermissionPerRole()
    {
        $this->visit(route('control.authorization.role.read.permission', self::$role_id))
        ->click('revoke-' . self::$permission_id )
        ->see('success');
    }

}
