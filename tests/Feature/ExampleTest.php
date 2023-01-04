<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_the_application_returns_a_successful_response()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_a_welcome_view_can_be_rendered()
    {
        $view = $this->view('welcome', ['greeting' => 'Hello Kozocom']);

        $view->assertSee('Hello Kozocom');
    }
}
