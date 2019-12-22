<?php

namespace App\Http\Controllers\Admin;
use App\Item;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;
use File;
use Brian2694\Toastr\Facades\Toastr;

class ItemController extends Controller
{
    public function showitem()
    {
    	$items = Item::get();
    	return view('admin.item.itemshow',compact('items'));
    }

    public function createitem()
    {
    	$categories = Category::get();
    	return view('admin.item.itemcreate',compact('categories'));
    }

    public function createitempost(request $request)
    {
    	$this->validate($request, [
    		'category' => 'required',
    		'name' => 'required',
    		'description' => 'required',
    		'price' => 'required',
    		'image' => 'required|mimes:jpeg,jpg,png,gif,bmp,PNG',
    	]);

    	 $data = $request->all();
        // return $data;
    	 if(!$data=="")
    	 {
    	 	try
    	 	{
    	 		$imagename = "";
    		    if($request->hasFile('image'))
    		    {
    			    

                    $originalImage = $request->file('image');
                    $thumbnailImage = Image::make($originalImage);
                    $originalPath = public_path().'/upload/item/';
                    //$thumbnailImage->resize(100,100);
                    $imagename = time().$originalImage->getClientOriginalName();
                    $thumbnailImage->save($originalPath.$imagename);
    		    }
    		    $item = new Item();

    		    $item->category_id = $data['category'];
    		    $item->name = $data['name'];
    		    $item->description = $data['description'];
    		    $item->price = $data['price'];
    		    $item->image = $imagename;
    		    $item->save();

                Toastr::success('Item Successfully Added.', 'Item Add', ["positionClass" => "toast-top-right"]);
    		    return redirect()->route('itemcreate');
    	 	}
    	 	catch(\Exception $e)
    	 	{
    	 		$msg = 'Insertion is not Correct !';
    	 		return redirect()->route('itemcreate')->with('error',$e->$msg());
    	 	}
    	 }
    	 else
    	 {
    	 	return redirect()->route('itemcreate')->with('error','Data is not Correct');
    	 }
    }

    public function edititem($id)
    {
    	 $edit = Item::whereid($id)->first();
    	 $categories = Category::get();
	    	if($edit)
	    	{
	    		 //return $edit;
	    		return view('admin.item.itemedit',compact('edit','categories'));
	    	}
	    	else
	    	{
	    		return view('admin.item.itemshow');
	    	}
    }

    public function updateitem(request $request,$id)
    {
        $this->validate($request, [
                    'category' => 'required',
                    'name' => 'required',
                    'description' => 'required',
                    'price' => 'required',
                    'image' => 'mimes:jpeg,jpg,png,gif,bmp,PNG',
                ]);
    	$update = Item::whereid($request->itemid)->first();

    	if($update)
    	{
    		try
    		{	
    			$update->category_id = $request->category;
    			$update->name = $request->name;
    			$update->description = $request->description;
    			$update->price = $request->price;
    			if($request->file('image'))
                {  
                    $originalImage = $request->file('image');
                    $thumbnailImage = Image::make($originalImage);
                    $originalPath = public_path().'/upload/item/';
                    //$thumbnailImage->resize(100,100);
                    $imagename = time().$originalImage->getClientOriginalName();
                    $thumbnailImage->save($originalPath.$imagename);

                    if(!$update->image=="")
                    {
                        if(File::exists(public_path('/upload/item/'.$update->image)));
                        {
                            File::delete(public_path('/upload/item/'.$update->image)); 
                        }
                        
                    }
                    $update->image = $imagename;
                }
                else
                {
                    $imagename = $update->image;
                }
               // return $update;
                $update->save();
                Toastr::success('Item Successfully Updated', 'Item Update', ["positionClass" => "toast-top-right"]);
                return redirect()->route('itemshow');
    		}
    		catch(\Exception $e)
    	 	{
    	 		$msg = 'Insertion is not Correct !';
    	 		return redirect()->route('itemedit')->with('error',$e->$msg());
    	 	}
    	}
    	else
    	{
    		return redirect()->route('itemedit')->with('error','Data is not Correct');
    	}
    }
    
    public function deleteitem($id)
    {
    	$delete = Item::find($id);
        //return $delete;
	    if($delete)
	    {
	        try
	        {
	          if(File::exists(public_path('/upload/item/'.$delete->image)))
	          {
	            File::delete(public_path('/upload/item/'.$delete->image));
	          } 
	          $delete->delete();
	          Toastr::warning('Item Successfully Deleted', 'Item Delete', ["positionClass" => "toast-top-right"]);
	          return redirect()->route('itemshow');  
	        }
	        catch(\Exception $e)
	        {
	            $msg = 'Deleting is not Correct !';
	            return back()->with('error',$e->$msg());
	        }
	    }

	    else
	    {
	        return view('admin.item.itemshow');
	    }
	  }

 





}
