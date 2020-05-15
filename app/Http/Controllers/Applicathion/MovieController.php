<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:20',
            'date_of_issue' => 'required|date',
        ]);

        return response('', 201);
    }

    public function movie(Movie $movie)
    {
        return '';
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
