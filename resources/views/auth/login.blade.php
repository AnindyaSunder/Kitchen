@extends('layouts.app')

@section('title','Login')

@push('extracss')
    
@endpush



@section('content')
    <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8 col-md-offset-1">

              @include('layouts.partial.message')

              <div class="card">
                <div class="card-header card-header-primary">

                  <h4 class="card-title ">Login</h4>
                </div>
                <div class="card-body">
                  <form method="POST" action="{{ route('login') }}" >
                    @csrf
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Email</label>
                          <input type="email" class="form-control" name="email" required="required" value="{{old('email')}}">
                        </div>
                      </div>

                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Password</label>
                          <input type="password" class="form-control" name="password" required="required" >
                        </div>
                      </div>
                      <button type="submit" class="btn btn-primary" style=" margin-left: 14px;margin-top: 5px;" >Submit</button>
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