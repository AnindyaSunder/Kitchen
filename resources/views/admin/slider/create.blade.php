@extends('layouts.app')

@section('title','Add_Slider')

@push('extracss')
	
@endpush



@section('content')
	<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">

              @include('layouts.partial.message')

              <a class="btn btn-info" href="{{ route('sindex') }}" style="margin-left: 17px;">All</a>
              <div class="card">
                <div class="card-header card-header-primary">

                  <h4 class="card-title ">Add New Slider</h4>
                  <p class="card-category"> Here is a subtitle for this table</p>
                </div>
                <div class="card-body">
                  <form method="POST" action="" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Title</label>
                          <input type="text" class="form-control" name="title">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Sub_Title</label>
                          <input type="text" class="form-control" name="sub_title">
                        </div>
                      </div>
                      <div class="col-md-12">
                        
                          <label class="bmd-label-floating">Choose Image</label>
                          <input type="file" name="image">
                        
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