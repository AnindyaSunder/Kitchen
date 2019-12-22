<?php

namespace App\Http\Controllers\Admin;

use App\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class ContactAdminController extends Controller
{
    public function showcontact()
    {
    	$contacts = Contact::get();
    	return view('admin.contact.contactshow',compact('contacts'));
    }
    public function detailscontact($id)
    {
    	$details = Contact::find($id);
    	return view('admin.contact.details',compact('details'));
    }
    public function deletecontact($id)
    {
    	//return $id;
    	Contact::find($id)->delete();
    	Toastr::success('Message Successfully deleted', 'Success', ["positionClass"=>"toast-top-right"]);
    	return redirect()->back();
    }
}