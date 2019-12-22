<?php

namespace App\Http\Controllers\Admin;

use App\Notifications\ReservationConfirmed;
use App\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Notification;

class ReservationAdminController extends Controller
{
    public function showreserve()
    {
    	$reservations = Reservation::get();
    	return view('admin.reservation.reservationshow',compact('reservations'));
    }
    public function confirmreservation($id)
    {
    	$reservation = Reservation::find($id);
    	$reservation->status = true;
    	$reservation->save();

        Notification::route('mail', $reservation->email)
            ->notify(new ReservationConfirmed());
    	
    	Toastr::success('Reservation Successfully confirmed', 'Success', ["positionClass"=>"toast-top-center"]);
    	return redirect()->back();

    }
    public function deletereservation($id)
    {
    	Reservation::find($id)->delete();
    	Toastr::success('Reservation Successfully deleted', 'Success', ["positionClass"=>"toast-top-center"]);
    	return redirect()->back();	
    }
}
