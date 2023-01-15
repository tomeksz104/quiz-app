<?php

namespace Tests\Feature\Livewire\Auth;

use App\Http\Livewire\Auth\Login;
use App\Models\User;
use Livewire\Livewire;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    /** @test */
    public function test_login_modal_can_be_rendered()
    {
        Livewire::test(Login::class)->assertViewIs('livewire.Auth.login');
    }

    public function test_username_is_required()
    {
        Livewire::test(Login::class)
            ->set(['username' => '','password' => 'password'])
            ->call('submit')
            ->assertHasErrors(['username' => 'required']);
    }

     public function test_users_can_authenticate_using_the_login_modal()
    {
        $this->actingAs(User::factory()->create());

        $user = User::factory()->create();

        Livewire::test(Login::class)
            ->set(['username' => $user->email, 'password' => 'password'])
            ->call('submit');

        $this->assertAuthenticated();
    }

    public function test_users_can_not_authenticate_with_invalid_password()
    {
        $user = User::factory()->create();

        Livewire::test(Login::class)
            ->set(['username' => $user->email, 'password' => 'paassword'])
            ->call('submit');

        $this->assertGuest();
    }
}
