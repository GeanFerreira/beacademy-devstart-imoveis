<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegisterUserTest extends DuskTestCase
{
    /**
     * A Dusk test.
     */
    /*public function test_check_if_root_site_is_correct()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Agradecimentos');
        });
    }

    public function test_check_if_login_function_is_working()
    {
        $this->browse(function (Browser $browser){
            $browser->visit('/login')
                ->type('email', 'gean@gmail.com')
                ->type('password', '123123123')
                ->press('Login')
                ->assertPathIs('/');
        });
    }

    public function test_check_if_register_function_is_working()
    {
        $this->browse(function (Browser $browser){
            $browser->visit('/register')
                ->type('name', 'User Test')
                ->type('email', 'usertest@test.com.br')
                ->type('password', '12345678')
                ->type('password_confirmation', '12345678')
                ->press('Register')
                ->assertPathIs('/')
                ->assertSee('Imóveis');
        });
    }*/
}
