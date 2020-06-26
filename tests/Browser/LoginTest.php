<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * // ->pause(1000)
     * @return void
     */
    public function testLoginDusk()
    {
        $this->browse(function (Browser $browser) {
            $uri = ('/home');

            $browser->visit('/login')
                ->type('email', 'usuariodusck@agora.com')
                ->type('password', 'Inacap2020')
                ->pause(1000)
                ->press('#btn')
                ->pause(1000)
                ->assertPathIs($uri)
                ->pause(1000)
                ->assertSee('Crear Proyecto')
                ->press('#createProyect')
                ->pause(1000)
                ->type('name', 'Proyectousuariodusk')
                ->pause(1000)
                ->pause(1000)
                ->type('objetivo', 'Proyectousuariodusk')
                ->pause(1000)
                ->type('descripcion', 'Proyectousuariodusk')
                ->pause(1000)
                ->type('capital', '5000000')
                ->pause(1000)
                ->type('date', '24-06-2020')
                ->pause(1000)
                ->select('inputGroupSelect01', '4')

                ->press('#createProyect')
                ->press('#btn');
        });
    }
}