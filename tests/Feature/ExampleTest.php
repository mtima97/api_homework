<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp(): void
    {
        parent::setUp();

        \Artisan::call('db:seed');
    }

    public function testLoggingIn()
    {
        $user = User::all()->random();

        $response = $this->withoutExceptionHandling()->postJson(route('authApi.login'), [
            'email' => $user->email,
            'password' => 'password'
        ]);

        $response->assertOk();
    }
}
