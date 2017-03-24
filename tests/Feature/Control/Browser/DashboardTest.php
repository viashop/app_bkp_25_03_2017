<?php

namespace Tests\Feature\Control\Browser;

use Tests\TestCase;

class DashboardTest extends TestCase
{

    public function setUp()
    {
        parent::setUp();
    }

    public function testViewDashboard()
    {
        $this->visit(route('control.dashboard'))
             ->see('Dashboard');
    }
}
