<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Hash;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    use DatabaseMigrations;
    
    public function testLoginSuccess()
    {
        $user = User::factory()->create([
            'email' => 'tuannh@test.com',
            'password' => Hash::make('password')
        ]);
        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit('/login')
                    ->type('email', $user->email)
                    ->type('password', 'password')
                    ->press('Login')
                    ->waitForText('You are logged in!')
                    ->assertPathIs('/home')
                    ->logout();
        });
    }

    public function testLoginWrongPassword()
    {
        $user = User::factory()->create([
            'email' => 'tuannh@test.com',
            'password' => Hash::make('password'),
        ]);
        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit('/login')
                    ->type('email', $user->email)
                    ->type('password', 'password1')
                    ->press('Login')
                    ->waitFor('.invalid-feedback')
                    ->assertSee('These credentials do not match our records.');
        });
    }
}
