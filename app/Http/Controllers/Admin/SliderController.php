<?php

namespace App\Http\Controllers\Admin;
use App\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Image;

class SliderController extends Controller
{
    public function sliderindex()
    {
    	$sliders = Slider::get();
    	return view('admin.slider.index',compact('sliders'));
    }

    public function slidercreate()
    {
    	return view('admin.slider.create');
    }
    public function slidercreatepost(request $request)
    {
    	
    	$this->validate($request, [
    		'title' => 'required',
    		'sub_title' => 'required',
    		'image' => 'required|mimes:jpg,jpeg,png,bmp,gif,svg',
    	]);
    	$data = $request->all();
    	if(!empty($data))
    	{
            try
            {
    		    $imagename = "";
    		    if($request->hasFile('image'))
    		    {
    			    

                    $originalImage = $request->file('image');
                    $thumbnailImage = Image::make($originalImage);
                    $originalPath = public_path().'/upload/slider/';
                    //$thumbnailImage->resize(100,100);
                    $imagename = time().$originalImage->getClientOriginalName();
                    $thumbnailImage->save($originalPath.$imagename);
    		    }

    		
    			$slider = new Slider();

    			$slider->title = $data['title'];
    			$slider->sub_title = $data['sub_title'];
    			$slider->image = $imagename;
    			$slider->save();

                return redirect()->route('sindex')->with('success','Slider Add Sucessfully !');

    		}
    		catch(\Exception $e)
    		{
    			$msg = 'Insertion is not Correct !';
    			return back()->with('error',$e->$msg());

    		}
    		
    	}
    	else
    	{
    		return back()->with('error','Something went Wrong !');
    	}

    }

   public function editslider($id)
   {
    $edit = Slider::whereid($id)->first();
        if($edit)
        {
         return view('admin.slider.edit',compact('edit'));  
        }
        else
        {
            return view('admin.slider.index');
        }
    //dd($id);
   
   }
   public function updateslider(request $request,$id)
   {
    //dd($request->all());
    $update = Slider::whereid($request->sliderid)->first();
    
     if($update)
        {  
            try
            {
      
                $update->title = $request->title;
                $update->sub_title = $request->sub_title;
                if($request->file('image'))
                {
                    
                    $originalImage = $request->file('image');
                    $thumbnailImage = Image::make($originalImage);
                    $originalPath = public_path().'/upload/slider/';
                    //$thumbnailImage->resize(100,100);
                    $imagename = time().$originalImage->getClientOriginalName();
                    $thumbnailImage->save($originalPath.$imagename);

                    if(!$update->image=="")
                    {
                        if(File::exists(public_path('/upload/slider/'.$update->image)));
                        {
                            File::delete(public_path('/upload/slider/'.$update->image)); 
                        }
                        
                    }
                    $update->image = $imagename;
                }
                else
                {
                    $update->image = $update->image;
                }

    
                $update->save();
                return redirect()->route('sindex')->with('success', 'Your Slider successfully Updated');
             
            }
            catch(\Exception $e)
                {
                    $msg = 'Editing is not Correct !';
                    return back()->with('error',$e->$msg());
                }
            
        }
        else
        {
            return view('admin.slider.index');
        }

   }
   public function deleteslider($id)
   {
    //dd($id);
    $delete = Slider::find($id);
    if($delete)
    {
        try
        {
          if(File::exists(public_path('/upload/slider/'.$delete->image)))
          {
            File::delete(public_path('/upload/slider/'.$delete->image));
          } 
          $delete->delete();
          return redirect()->route('sindex')->with('success', 'Your Slider successfully Deleted');  
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

