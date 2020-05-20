<?php

namespace App\Http\Controllers;

use App\Models\Studio;
use App\Services\ModelService;
use App\Services\ResponseService;
use Illuminate\Http\Request;

class StudioController extends Controller
{
    function rules()
    {
        return [
            'name' => 'required|string|max:20|min:2',
            'logo' => 'required|image|dimensions:min_width=200,min_height=200,max_width=200,max_height=200',
            'created_year' => 'required|integer',
            'closed_year' => 'integer',
            'country_id' => 'required|integer',
        ];
    }

    function save(Studio $studio)
    {
        ModelService::saveOnRequest([
            ['name' => 'name'],
            ['name' => 'created_year'],
            ['name' => 'closed_year'],
            ['name' => 'country_id'],
            ['name' => 'logo', 'action' => function () {
                //save file
                return '';
            }],
        ], $studio);
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
        $this->save(new Studio());
        return ResponseService::response201();
    }

    public function update(Request $request, Studio $studio)
    {
        $rules = $this->rules();
        $rules['logo'] = 'image|dimensions:min_width=200,min_height=200,max_width=200,max_height=200';
        $request->validate($rules);
        $this->save($studio);
        return ResponseService::response();
    }

    public function delete(Studio $studio)
    {
        $studio->delete();
        return ResponseService::response();
    }
}
