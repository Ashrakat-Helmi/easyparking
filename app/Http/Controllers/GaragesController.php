<?php

namespace App\Http\Controllers;

use App\garages;
use Illuminate\Http\Request;

class GaragesController extends Controller
{

    public function index()
    {
        return garages::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|string",
        ]);
        return garages::create($request->all());
    }

    public function show($id)
    {
        return garages::find($id);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            "name" => "required|string",
        ]);
        $garage =garages::find($id);
        $garage->update($request->all());
        return $garage;
    }

    public function destroy($id)
    {
        return garages::destroy($id);
    }
}
