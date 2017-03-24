<?php

namespace Tests\Feature\Control\Browser\Shop;

use App\Models\User;
use Tests\TestCase;

class SearchUserShopTest extends TestCase
{

    /**
     * @test
     */
    public function testShouldCheckIfThereIsUserAdminShopInSearch()
    {

        $user = User::where('email', 'admin@shop.com.br')->first();;

        //Update
        $this->visit(route('control.users.shops.admin.read.search', $user->name))
            ->see($user->email);

    }

    /**
     * @test
     */
    public function testShouldCheckIfThereIsUserEditorShopInSearch()
    {

        $user = User::where('email', 'editor@shop.com.br')->first();;

        //Update
        $this->visit(route('control.users.shops.editor.read.search', $user->name))
            ->see($user->email);

    }

}