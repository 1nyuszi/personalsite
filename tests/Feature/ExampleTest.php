<?php

namespace Tests\Feature;

use App\Models\Page;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use LazilyRefreshDatabase;

    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        Page::create([
            'title' => 'Home',
            'slug' => 'home',
            'content' => 'Welcome to my personal site.',
            'is_published' => true,
        ]);

        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Welcome to my personal site.');
    }
}
