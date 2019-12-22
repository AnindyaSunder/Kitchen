@extends('layouts.app')

@section('title','Edit_Slider')

@push('extracss')
	
@endpush



@section('content')
	<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">

              @include('layouts.partial.message')

              <a class="btn btn-info" href="{{ route('sindex') }}" style="margin-left: 17px;">Back</a>
              <div class="card">
                <div class="card-header card-header-primary">

                  <h4 class="card-title ">Edit Slider</h4>
                </div>
                <div class="card-body">
                  <form method="POST" action="" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                      <div class="col-md-12">
                        <input type="hidden" name="sliderid" value="{{ $edit->id }}" >
                        <div class="form-group">
                          <label class="bmd-label-floating">Title</label>
                          <input type="text" class="form-control" name="title" value="{{ $edit->title }}">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Sub_Title</label>
                          <input type="text" class="form-control" name="sub_title" value="{{ $edit->sub_title }}">
                        </div>
                      </div>
                      <div class="col-md-12">
                           
                          <label class="bmd-label-floating">Choose Image</label>
                          <br><input type="file" name="image">
                          <img src="{{ asset('public/upload/slider/'.$edit->image) }}" alt="Image" width="50px" height="50px">
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