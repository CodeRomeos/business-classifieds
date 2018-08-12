<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Artisan;

abstract class TestCase extends BaseTestCase
{
	use CreatesApplication, RefreshDatabase, DatabaseMigrations;

	public function setUp()
    {
		parent::setUp();
        Artisan::call('db:seed');
    }

}
