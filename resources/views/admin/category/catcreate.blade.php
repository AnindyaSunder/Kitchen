@extends('layouts.app')

@section('title','Add_Category')

@push('extracss')
	
@endpush



@section('content')
	<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">

              @include('layouts.partial.message')

              <a class="btn btn-info" href="{{ route('categoryshow') }}" style="margin-left: 17px;">All</a>
              <div class="card">
                <div class="card-header card-header-primary">

                  <h4 class="card-title ">Add New Category</h4>
                  <p class="card-category"> Here is a subtitle for this table</p>
                </div>
                <div class="card-body">
                  <form method="POST" action="" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Name</label>
                          <input type="text" class="form-control" name="catname">
                        </div>
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