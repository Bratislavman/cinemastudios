<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index(Request $request)
    {
//        $request->validate([
//            'title' => 'required|string|max:3',
//        ]);
//
//        return [
//            'created' => true,
//        ];
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
