<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use App\Models\Studio;
use App\Services\FileHelper;
use App\Services\ModelService;
use App\Services\ResponseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudioController extends Controller
{
    function rules($updateMode = false)
    {
        $rules = [
            'name' => 'required|string|max:20|min:2',
            'logo' => 'required|image|dimensions:min_width=200,min_height=200,max_width=200,max_height=200',
            'created_year' => 'required|integer',
            'closed_year' => 'integer',
            'country_id' => 'required|integer',
        ];
        if ($updateMode) $rules['logo'] = 'image|dimensions:min_width=200,min_height=200,max_width=200,max_height=200';
        return $rules;
    }

    function save(Studio $studio, $update = false)
    {
        $request = request();

        $fields = [
            ['name' => 'name'],
            ['name' => 'created_year'],
            ['name' => 'closed_year'],
            ['name' => 'country_id'],
            [
                'name' => 'logo',
                'iniValue' => function () use ($studio, $update, $request) {
                    if ($request->file('logo')) {
                        if ($update) Storage::disk('public')->delete($studio->logo);
                        return FileHelper::saveImage('logo', 'avatar', ['width' => 200]);
                    }
                }
            ]
        ];

        ModelService::saveOnRequest($fields, $studio);
    }

    public function index()
    {
        return Studio::orderBy('id', 'desc')
            ->paginate(5);
    }

    public function studio(Studio $studio)
    {
        return $studio;
    }

    public function create(Request $request)
    {
        $request->validate($this->rules());
        $this->save(new Studio);
        return ResponseService::response201();
    }

    public function update(Request $request, Studio $studio)
    {
        $request->validate($this->rules(true));
        $this->save($studio, true);
        return ResponseService::response();
    }

    public function delete(Studio $studio)
    {
        $studio->delete();
        return ResponseService::response();
    }
}