<?php

namespace App\Http\Controllers;

use App\corners;
use App\garages;
use Illuminate\Http\Request;

class CornersController extends Controller
{
    public function index()
    {
        return corners::join('garages',"garages.id","=","corners.garage_id")->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            "corner_num" => "required|string",
            "garage_id" => "required|exists:garages,id",
            "status" => "required"
        ]);
        return corners::create($request->all());
    }

    public function show($id)
    {
        return corners::join('garages',"garages.id","=","corners.garage_id")->where('corners.id',"=",$id)->get();
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            "corner_num" => "required|string",
            "garage_id" => "required|exists:garages,id",
            "status" => "required"
        ]);
        $corner = corners::find($id);
        $corner->update($request->all());
        return $corner;
    }

    public function destroy($id)
    {
        return corners::destroy($id);
    }

    public function showEmpty(){
        return corners::join('garages',"garages.id","=","corners.garage_id")->where('status', '=', 0)->get();
    }
    public function showByGrage($garage_id){
        return corners::join('garages',"garages.id","=","corners.garage_id")->where('garage_id', '=', $garage_id)->get();
    }
    public function showEmptyByGrage($garage_id){
        return corners::join('garages',"garages.id","=","corners.garage_id")->where('garage_id', '=', $garage_id)->where('status', '=', 0)->get();
    }

}
 