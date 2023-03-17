<?php

namespace App\Http\Controllers;

use App\bookings;
use Illuminate\Http\Request;

class BookingsController extends Controller
{
    public function index()
    {
        return bookings::join("users","users.id","=","bookings.user_id")->join("garages","garages.id","=","bookings.garage_id")->join("corners","corners.id","=","bookings.corner_id")->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            "user_id" => "required|exists:users,id",
            "garage_id" => "required|exists:garages,id",
            "corner_id" => "required|exists:corners,id",
            "time_from" => "required",
            "time_to" => "required",
            "date" => "required",
            "price" => "required"
        ]);
        return bookings::create($request->all());
    }

    
    public function show($id)
    {
        return bookings::join("users","users.id","=","bookings.user_id")->join("garages","garages.id","=","bookings.garage_id")->join("corners","corners.id","=","bookings.corner_id")->where("bookings.id","=",$id)->get();
    }

    public function update(Request $request, $id)
    {
        
        $request->validate([
            "user_id" => "required|exists:users,id",
            "garage_id" => "required|exists:garages,id",
            "corner_id" => "required|exists:corners,id",
            "time_from" => "required",
            "time_to" => "required",
            "date" => "required",
            "price" => "required"
        ]);
        $booking =bookings::find($id);
        $booking->update($request->all());
        return $booking;
    }

    public function destroy($id)
    {
        return bookings::destroy($id);
    }

    public function showByUser($user_id){
        return bookings::join("users","users.id","=","bookings.user_id")->join("garages","garages.id","=","bookings.garage_id")->join("corners","corners.id","=","bookings.corner_id")->where('bookings.user_id', '=', $user_id)->get();
    }
    public function showByGarage($garage_id){
        return bookings::join("users","users.id","=","bookings.user_id")->join("garages","garages.id","=","bookings.garage_id")->join("corners","corners.id","=","bookings.corner_id")->where('bookings.garage_id', '=', $garage_id)->get();
    }
}
