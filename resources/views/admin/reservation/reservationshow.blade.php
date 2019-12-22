@extends('layouts.app')

@section('title','Reservation_Index')

@push('extracss')
	<link rel="stylesheet" type="text/css" href="{{asset('https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css')}}">
@endpush



@section('content')
	<div class="content">
        <div class="container-fluid">
          <div class="row">

            @include('layouts.partial.message')
            
            <div class="col-md-12">
              
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">All Reservations</h4>
                  <p class="card-category"> Here is a subtitle for this table</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="table" class="table table-striped table-bordered" style="width:100%">
                      <thead class=" text-primary">
                        <th class="">
                          ID
                        </th>
                        <th class="text-center">
                          Name
                        </th>
                        <th class="">
                          Phone
                        </th>
                        <th class="text-center">
                          Email
                        </th>
                        <th class="text-center">
                          Date & Time
                        </th>
                        <th class="text-center">
                          Message
                        </th>
                        <th class="text-center">
                          Status
                        </th>
                       
                        <th class="text-center">
                          Action
                        </th>
                      </thead>
                      <tbody>
                      	@foreach($reservations as $reservation)
	                        <tr>
	                          <td>{{ $reservation->id }}</td>
                            <td>{{ $reservation->name }}</td>
	                          <td>{{ $reservation->phone}}</td>
                            <td>{{ $reservation->email }}</td>
                            <td>{{ $reservation->date_and_time }}</td>
                            <td>{{ $reservation->message }}</td>
                            <td>
                              @if($reservation->status == true)
                                <span class="badge badge-info">Confirmed</span>
                              @else
                                <span class="badge badge-danger">Not confirmed yet</span>
                              @endif  
                            </td>
                            
                            
	                         
                            <td class="text-center">
                              @if($reservation->status == false)
                              <form id="status-{{$reservation->id}}" method="POST" action="{{ route('reservationconfirm',$reservation->id) }}">
                                @csrf  
                              </form>
                              <button type="button" href="" class="btn btn-info btn-sm "onclick="if(confirm('Surely do you want to confirm?')){
                              event.preventDefault();
                              document.getElementById('status-{{$reservation->id}}').submit();}
                              else{
                                event.preventDefault();
                              }
                            " ><i class="material-icons">done</i></button>
                              @endif
                               <form id="delete-{{$reservation->id}}" method="POST" action="{{ route('reservationdelete',$reservation->id) }}">
                                @csrf  
                              </form>
                              <button type="button" href="" class="btn btn-danger btn-sm "onclick="if(confirm('Are you sure?')){
                              event.preventDefault();
                              document.getElementById('delete-{{$reservation->id}}').submit();}
                              else{
                                event.preventDefault();
                              }
                            " ><i class="material-icons">delete_outline</i></button> </td>

	                        </tr>
	                    @endforeach   
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

@endsection 


@push('extrajs')
	<script src="{{asset('https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js	')}}"></script>
	<script src="{{asset('https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js')}}"></script>
	<script>
		$(document).ready(function() {
   			$('#table').DataTable();
			} );
	</script>

@endpush
