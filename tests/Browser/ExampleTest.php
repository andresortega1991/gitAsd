<?php

namespace Tests\Browser;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ExampleTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testBasicExample()
    {

        $this->browse(function (Browser $browser) {

            $uri = ('/home');
            $browser->visit('/login')
                ->type('email', 'usuariodusck@agora.com')
                ->type('password', 'Inacap2020')
                ->press('#btn')
                ->assertPathIs($uri);
        });
    }
}