<?php

namespace Tests\Feature;

use App\Models\Studio;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class StudioTest extends TestCase
{
    /** @test */
    public function create()
    {
        $user = User::where('name', 'Admin')->first();
        Auth::login($user);
        $response = $this->post(route('studioCreate'), [
            'name' => 'Disney',
            'created_year' => 1945,
            'closed_year' => '',
            'country_id' => 1
        ]);
        $response->dump();
        $response->assertStatus(201);
    }

    /** @test */
    public function update()
    {
        $user = User::where('name', 'Admin')->first();
        Auth::login($user);
        $studio = Studio::create([
            'name' => 'Pixar',
            'created_year' => 1945,
            'closed_year' => 9999,
            'country_id' => 1
        ])->toArray();
        $response = $this->post(route('studioUpdate', $studio));
        $response->dump();
        $response->assertStatus(200);
    }
}
