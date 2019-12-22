@extends('layouts.app')

@section('title','Edit_Category')

@push('extracss')
	
@endpush



@section('content')
	<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">

              @include('layouts.partial.message')

              <a class="btn btn-info" href="{{ route('categoryshow') }}" style="margin-left: 17px;">Back</a>
              <div class="card">
                <div class="card-header card-header-primary">

                  <h4 class="card-title ">Edit Category</h4>
                </div>
                <div class="card-body">
                  <form method="POST" action="" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                      <div class="col-md-12">
                        <input type="hidden" name="catid" value="{{ $edit->id }}" >
                        <div class="form-group">
                          <label class="bmd-label-floating">Name</label>
                          <input type="text" class="form-control" name="catname" value="{{ $edit->name }}">
                        </div>
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