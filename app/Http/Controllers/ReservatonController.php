<?php

namespace App\Http\Controllers;

use App\Reservation;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class ReservatonController extends Controller
{
    public function reservepost(request $request)
    {
    	$this->validate($request, [
    		'name' => 'required',
    		'phone' => 'required',
    		'email' => 'required | email',
    		'dateandtime' => 'required',
    	]);

    	$reservation = new Reservation();

    	$reservation->name = $request->name;
    	$reservation->phone = $request->phone;
    	$reservation->email = $request->email;
    	$reservation->date_and_time = $request->dateandtime;
    	$reservation->message = $request->message;
    	$reservation->status = false;
    	$reservation->save();

    	Toastr::success('Your request is accepted', 'Request Sent', ["positionClass" => "toast-top-center"]);

    	return redirect()->back();


    }
}
