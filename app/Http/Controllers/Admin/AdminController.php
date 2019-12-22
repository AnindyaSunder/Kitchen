<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Item;
use App\Slider;
use App\Reservation;
use App\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function dashboard()
    {
    	$categorycount = Category::count();
    	$itemcount = Item::count();
    	$slidercount = Slider::count();
    	$reservations = Reservation::where('status',false)->get();
    	$contactcount = Contact::count();
    	
    	return view('admin.dashboard',compact('categorycount','itemcount','slidercount','reservations','contactcount'));
    }
}
