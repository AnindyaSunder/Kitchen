@extends('layouts.app')

@section('title','Contact_Index')

@push('extracss')
  
@endpush



@section('content')
  <div class="content">
        <div class="container-fluid">
          <div class="row">

            @include('layouts.partial.message')
            
            <div class="col-md-12">
              
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">{{ $details->subject }}</h4>
                  
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-12">
                      <h4 class="font-weight-bold">Name: {{ $details->name }}</h4>
                      <h5 class="font-weight-bold">Email: {{ $details->email }}</h5>
                      <h5 class="font-weight-bold">Message: </h5><hr>

                      <p>{{ $details->message }}</p><hr>
                      
                    </div>
                  </div>
                  <a href="{{ route('contactshow') }}" class="btn btn-danger">Back</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

@endsection 

@push('extrajs')
@endpush
