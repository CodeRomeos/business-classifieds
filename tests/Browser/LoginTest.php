<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
			$browser->maximize()
					->visit('/')
					->assertSee('Login')
					->clickLink('Login')
					->type('email', 'taylor@laravel.com');
                    //->waitForText('Claim your listing')
                    //->assertSee('Lorem ipsum dolor sit');
        });
    }
}
