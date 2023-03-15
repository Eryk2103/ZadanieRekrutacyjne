<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HomePageTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_if_homepage_view_is_rendered(): void
    {
        $response = $this->get('/');
    
        $response->assertViewIs('welcome');
    }
    
}
