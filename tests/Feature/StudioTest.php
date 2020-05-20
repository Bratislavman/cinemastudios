<?php

namespace Tests\Feature;

use App\Models\Studio;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;

class StudioTest extends TestCase
{
    /** @test */
    public function create()
    {
        $user = User::where('name', 'Admin')->first();
        Auth::login($user);
        $response = $this->postJson(route('studioCreate'), [
            'name' => 'Disney',
            'created_year' => 1945,
            'closed_year' => '',
            'logo' => UploadedFile::fake()->image('avatar.jpg', 200, 200)->size(5),
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
            'closed_year' => '',
            'logo' => UploadedFile::fake()->image('avatar.jpg', 200, 200)->size(5),
            'country_id' => 1
        ])->toArray();
        $studio['name'] = 'Loinhard';
        $response = $this->postJson(route('studioUpdate', ['id' => $studio['id']]), $studio);
        $response->dump();
        $response->assertStatus(200);
    }
}
