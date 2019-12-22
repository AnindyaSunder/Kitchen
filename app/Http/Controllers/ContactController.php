<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class ContactController extends Controller
{
   public function createcontactpost(request $request)
	   {
	   	$this->validate($request,[
	   		'name' => 'required',
	   		'email' => 'required | email',
	   		'subject' => 'required',
	   		'message' => 'required',
	   	]);
	   	$data = request()->all();
	   	if($data)
	   	{
	   		try
	   		{
	   			$contact = new Contact();
	   			$contact->name = $data['name'];
	   			$contact->email = $data['email'];
	   			$contact->subject = $data['subject'];
	   			$contact->message = $data['message'];
	   			$contact->save();

	   			Toastr::success('Your message successfully send', 'You Success!', ["positionClass" => "toast-top-right"]);
	   			return redirect()->back();	


	   		}
	   		catch(\Exceptin $e)
	   		{
	   			$msg = "Insertion is noy correct";
	   			return back()->with('error',$e->$msg());
	   		}
	   	}
	   	else
    	{
    		return redirect()->back()->with('error','Something Found Wrong');
    	}
   }
}
