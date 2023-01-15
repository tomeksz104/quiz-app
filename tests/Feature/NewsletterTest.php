<?php

namespace Tests\Feature;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewsletterTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_can_subscribe_newsletter()
    {
        $response = $this->post('/newsletter', [
            'email' => 'test@example.com',
        ]);

        $response->assertStatus(200);
    }

    public function test_saving_email_to_database() {
        $this->post('/newsletter', [
            'email' => 'test@example.com',
        ]);

        $this->assertDatabaseHas('newsletter', [
            'email' => 'test@example.com',
        ]);
    }

    public function test_users_can_not_subscribe_with_invalid_email()
    {
        $response = $this->post('/newsletter', [
            'email' => 'test',
        ]);

        $response->assertStatus(302);
    }
}
