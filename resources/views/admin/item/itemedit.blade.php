@extends('layouts.app')

@section('title','Edit_Item')

@push('extracss')
	
@endpush



@section('content')
	<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">

              @include('layouts.partial.message')

              <a class="btn btn-info" href="{{ route('itemshow') }}" style="margin-left: 17px;">Back</a>
              <div class="card">
                <div class="card-header card-header-primary">

                  <h4 class="card-title ">Edit Item</h4>
                </div>
                <div class="card-body">
                  <form method="POST" action="" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                      <div class="col-md-12">
                        <input type="hidden" name="itemid" value="{{ $edit->id }}" >
                        <div class="form-group">
                          <label class="bmd-label-floating">Category</label>
                          <select  class="form-control" name="category">
                           @foreach($categories as $category)
                            <option {{ $category->id == $edit->category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                            
                           @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Name</label>
                          <input type="text" class="form-control" name="name" value="{{ $edit->name }}">
                        </div>
                      </div>
                        <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Description</label>
                          <textarea class="form-control" name="description" >{{ $edit->description }}</textarea>
                        </div> {{-- No Value Option in textarea --}}
                      </div>
                        <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Price</label>
                          <input type="number" class="form-control" name="price" value="{{ $edit->price }}">
                        </div>
                      </div>
                        <div class="col-md-12">
                        
                          <label class="bmd-label-floating">Image</label>
                          <br><input type="file"  name="image" >
                          <img src="{{ asset('public/upload/item/'.$edit->image) }}" alt="Image" width="50px" height="50px">
                        
                      </div>
                      
                      <button type="submit" class="btn btn-primary" style=" margin-left: 14px;margin-top: 5px;" >Update</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

@endsection 


@push('extrajs')

@endpush