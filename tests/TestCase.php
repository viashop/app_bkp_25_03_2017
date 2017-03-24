<?php

namespace Tests;

use Laravel\BrowserKitTesting\TestCase as BaseTestCase;
//use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public $baseUrl = 'http://localhost';

    public function setUp()
    {
        parent::setUp();
        \Auth::loginUsingId(1);
    }

}
