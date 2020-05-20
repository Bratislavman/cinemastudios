<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Services\ResponseService;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:20|min:2',
            'logo' => 'required|image|max:20|dimensions:min_width=200,min_height=200,max_width=201,max_height=201',
            'date_of_issue' => 'required|date',
        ]);

        return ResponseService::response201();
    }

    public function movie(Movie $movie)
    {

    }

    public function create()
    {
        return '';
    }

    public function update(Movie $movie)
    {
        return '';
    }
}
