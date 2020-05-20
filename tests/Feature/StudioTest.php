<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StudioTest extends TestCase
{
    /** @test */
    public function index()
    {
        $response = $this->post('/');

        $response->assertStatus(200);
    }

    /** @test */
    public function create()
    {
        $response = $this->post('/');

        $response->assertStatus(200);
    }

    /** @test */
    public function studio()
    {
        $response = $this->post('/');

        $response->assertStatus(200);
    }

    /** @test */
    public function update()
    {
        $response = $this->post('/');
        $response->assertStatus(200);
    }

    /** @test */
    public function delete()
    {
        $response = $this->post('/');

        $response->assertStatus(200);
    }
}
