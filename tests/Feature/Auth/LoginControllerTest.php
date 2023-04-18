<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginControllerTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_that_validation_rules_are_applied_on_login(): void
    {
        $response = $this->post('/api/v1/login', [
            'email_address' => 'test@gmail.com',
            'password' => 'invalidPassword'
        ]);

        $response->assertStatus(422);
    }
}
