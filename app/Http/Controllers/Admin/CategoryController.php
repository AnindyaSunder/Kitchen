<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function createcategory()
    {
    	return view('admin.category.catcreate');

    }
     public function createcategorypost(request $request)
    {
    	$this->validate($request, [
    		'catname' => 'required',
    		
    	]);
    	$data = $request->all();
    	if(!$data=="")
    	{
    		try
	    	{
	    		$category = new Category();

	    		$category->name = $data['catname'];
	    		$category->slug = str_slug($data['catname']);
	    		$category->save();
	    		return redirect()->route('categoryshow')->with('success','Category Added Successfully');


	    	}
	    	catch(\Exception $e)
	    	{
	    		$msg = "Something Wrong are Catched";
	    		return back()->with('error',$e->$msg());
	    	}

    	}
    	else
    	{
    		return redirect()->back()->with('error','Something Found Wrong');
    	}

	    	

    }
    public function showcategory()
    {
    	$categories = Category::get();
    	return view('admin.category.catshow',compact('categories'));
    }
    public function editcategory($id)
    {
    	$edit = Category::whereid($id)->first();
    	if(!$edit=="")
    	{
    		try
    		{
    			return view('admin.category.catedit',compact('edit'));

    		}
    		catch(\Exception $e)
    		{
    			$msg = "An Eroor Catched to Edit";
    			return back()->with('error',$e->$msg());
    		}
    	}
    	else
    	{
    		return view('admin.category.catshow');
    	}

    }
    public function updatecategory(request $request,$id)
    {
    	$this->validate($request, [
    		'catname' => 'required',
    		
    	]);
    	$update = Category::whereid($request->catid)->first();

    	if($update)
    	{
    		try
    		{	
    			$update->name = $request->catname;
    			$update->slug = str_slug($request->catname);
    			$update->save();


    			return redirect()->route('categoryshow')->with('success', 'Your Category successfully Updated');

    		}
    		catch(\Exception $e)
    		{
    			$msg = "An Eroor Catched to Update";
    			return back()->with('error',$e->$msg());
    		}
    	
    	}
    	else
    	{
    		return view('admin.category.catshow');
    	}
    	

    }
    public function deletecategory($id)
    {
    	$delete = Category::find($id);
    	if($delete)
	    {
	        try
	        {
	        
	          $delete->delete();
	          return redirect()->route('categoryshow')->with('success', 'Your Category successfully Deleted');  
	        }
	        catch(\Exception $e)
	        {
	            $msg = 'Deleting is not Correct !';
	            return back()->with('error',$e->$msg());
	        }
	    
	    }
	    else
	    {
	        return view('admin.slider.index');
	    }
    
    }
    	






}