<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Partner Curation Form');
        $response->assertSee('Business Expansion Assessment');
        $response->assertSee('https://forms.gle/KfoCsZWK9NvGZqX8A');
        $response->assertSee('https://forms.gle/KBV4LPWXmjnAmiTd7');
        $response->assertSee('Non Export-Import');
        $response->assertSee('Exporters Only');
        $response->assertSee('images/logo/logo-iic.png');
        $response->assertSee('images/logo/favicon-32.png');
        $response->assertSee('favicon.ico');
        $response->assertSee('Sandi Hasyono');
        $response->assertSee('https://wa.me/6281280035369');
    }
}
