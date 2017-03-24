<?php

namespace Tests\Feature\Control\Browser\Account;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PersonalTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testAccountPersonal()
    {

        $this->visit(route('control.dashboard'))
             ->click('control-users-personal-read')
             ->see('Dados pessoais')
             ->press('Alterar')
             ->see('success');

    }
}
