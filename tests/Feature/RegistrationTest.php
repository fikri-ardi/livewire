<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Livewire\Livewire;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function register_page_contains_livewire_component()
    {
        $this->get('/register')->assertSeeLivewire('auth.register');
    }
    
    /** @test */
    function can_register()
    {
        Livewire::test('auth.register')
            ->set('email', 'fikriardi@gmail.com')
            ->set('password', 'fikriardi')
            ->set('passwordConfirmation', 'fikriardi')
            ->call('register')
            ->assertRedirect('/')
            ;

        $this->assertTrue(User::whereEmail('fikriardi@gmail.com')->exists());
        $this->assertEquals('fikriardi@gmail.com', auth()->user()->email);
    }

    /** @test */
    function email_is_required()
    {
        Livewire::test('auth.register')
            ->set('email', '')
            ->set('password', 'fikriardi')
            ->set('passwordConfirmation', 'fikriardi')
            ->call('register')
            ->assertHasErrors(['email' => 'required'])
            ;
    }

    /** @test */
    function email_is_valid_email()
    {
        Livewire::test('auth.register')
            ->set('email', 'donthaveatsymbol')
            ->set('password', 'fikriardi')
            ->set('passwordConfirmation', 'fikriardi')
            ->call('register')
            ->assertHasErrors(['email' => 'email'])
            ;
    }

    /** @test */
    function email_hasnt_been_taken_already()
    {
        User::create([
            'email'=>'fikriardi@gmail.com',
            'password'=>bcrypt('orangerti',),
            'passwordConfirmation'=>bcrypt('orangerti',)
        ]);
        
        Livewire::test('auth.register')
            ->set('email', 'fikriardi@gmail.com')
            ->set('password', 'fikriardi')
            ->set('passwordConfirmation', 'fikriardi')
            ->call('register')
            ->assertHasErrors(['email' => 'unique'])
            ;
    }

    /** @test */
    function password_is_required()
    {
        Livewire::test('auth.register')
            ->set('email', 'fikriardi@gmai.com')
            ->set('password', '')
            ->set('passwordConfirmation', 'fikriardi')
            ->call('register')
            ->assertHasErrors(['password' => 'required'])
            ;
    }

    /** @test */
    function password_isnt_less_than_minimum()
    {
        Livewire::test('auth.register')
            ->set('email', 'fikriardi@gmai.com')
            ->set('password', 'siji')
            ->set('passwordConfirmation', 'siji')
            ->call('register')
            ->assertHasErrors(['password' => 'min'])
            ;
    }

    /** @test */
    function password_matches_password_confirmation()
    {
        Livewire::test('auth.register')
            ->set('email', 'fikriardi@gmai.com')
            ->set('password', 'siji')
            ->set('passwordConfirmation', 'loro')
            ->call('register')
            ->assertHasErrors(['password' => 'same'])
            ;
    }
}