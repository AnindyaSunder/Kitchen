@extends('layouts.app')

@section('title','Add_Item')

@push('extracss')
	
@endpush



@section('content')
	<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">

              @include('layouts.partial.message')

              <a class="btn btn-info" href="{{ route('itemshow') }}" style="margin-left: 17px;">All</a>
              <div class="card">
                <div class="card-header card-header-primary">

                  <h4 class="card-title ">Add New Item</h4>
                  <p class="card-category"> Here is a subtitle for this table</p>
                </div>
                <div class="card-body">
                  <form method="POST" action="" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Category</label>
                          <select  class="form-control" name="category">
                           @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            
                           @endforeach
                          </select>
                        </div>
                      </div>
                       <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Name</label>
                          <input type="text" class="form-control" name="name">
                        </div>
                      </div>
                        <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Description</label>
                          <textarea class="form-control" name="description"></textarea>
                        </div>
                      </div>
                        <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Price</label>
                          <input type="number" class="form-control" name="price">
                        </div>
                      </div>
                        <div class="col-md-12">
                        
                          <label class="bmd-label-floating">Image</label>
                          <input type="file"  name="image">
                        
                      </div>
                      
                      <button type="submit" class="btn btn-primary" style=" margin-left: 14px;margin-top: 5px;" >Save</button>
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