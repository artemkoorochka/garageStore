<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class garageStoreTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_main_refirect()
    {
        $response = $this->get('/');
        $response->assertStatus(302);
    }
    public function test_catalor_route()
    {
        $response = $this->get('/catalog');
        $response->assertStatus(200);
    }
    public function test_rest_api_products()
    {
        $response = $this->get('/rest/products');
        $response->assertStatus(200);
    }
    public function test_rest_api_categories()
    {
        $response = $this->get('/rest/categories');
        $response->assertStatus(200);
    }
}
