<?php

namespace App\Http\Controllers;

use App\prices;
use Illuminate\Http\Request;

class PricesController extends Controller
{
    
    public function index()
    {
        return prices::all();
    }
    
    public function store(Request $request)
    {
        $request->validate([
            "hours" => 'required|numeric',
            "cost" => 'required|numeric'
        ]);
        return prices::create($request->all());
    }

    public function show($id)
    {
        return prices::find($id); 
    }

  
    public function update(Request $request,$id)
    {
        $request->validate([
            "hours" => 'required|numeric',
            "cost" => 'required|numeric'
        ]);
        $price = prices::find($id);
        $price->update($request->all());
        return $price;

    }

    public function destroy($id)
    {
        return prices::destroy($id);
    }
}
