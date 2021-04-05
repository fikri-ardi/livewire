<?php

namespace Tests\Feature;

use Tests\TestCase;
use Livewire\Livewire;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;
    
    /** @test */
    function can_register()
    {
        Livewire::test('auth.register')
            ->set('email', 'fikriardi@gmail.com')
            ->set('password', 'fikriardi')
            ->set('passwordConfirmation', 'fikriardi')
            ->call('register')
            ->assertRedirect('/');
    }
}
