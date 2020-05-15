<?php

namespace Tests\Feature;

use App\Models\Movie;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class MovieTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
//    public function index()
//    {
//        $response = $this->postJson('/movies', [
//            'title' => '1111111'
//        ]);
//        $response->dump();
//        $response
//            ->assertStatus(200)
//            ->assertJson([
//                'created' => true,
//            ]);
//    }

    /** @test */
//    public function get()
//    {
//        $response = $this->get('/');
//        $response->assertStatus(200);
//    }

    /** @test */
    public function create()
    {
        $this->assertAuthenticated();
        $movie = null;
        DB::transaction(function () use (&$movie) {
            $movie = factory(Movie::class)->create();
        });
        $response = $this->postJson('/movies', $movie->toArray());
        $response->dump();
        $response->assertCreated();
    }

    /** @test */
    public function update()
    {
//        $this->assertAuthenticated();
//        $movie = factory(Movie::class)->create();
//        $movieNew = factory(Movie::class)->create();
//        $response = $this->postJson("/movies/${$movie}/update", $movieNew->toArray());
//        $response->dump();
//        $response->assertOk();
    }
}
