@extends('layouts.app')

@section('title','Category_Index')

@push('extracss')
	<link rel="stylesheet" type="text/css" href="{{asset('https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css')}}">
@endpush



@section('content')
	<div class="content">
        <div class="container-fluid">
          <div class="row">

            @include('layouts.partial.message')
            
            <div class="col-md-12">
              <a href="{{ route('categorycreate')}}" class="btn btn-info">Add New</a>
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">All Categories</h4>
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
                        <th class="text-center">
                          Slug
                        </th>
                       
                        <th class="text-center">
                          Action
                        </th>
                      </thead>
                      <tbody>
                      	@foreach($categories as $item)
	                        <tr>
	                          <td>{{ $item->id }}</td>
	                          <td>{{ $item->name }}</td>
	                          <td>{{ $item->slug }}</td>
	                         
                            <td class="text-center">
                              <a href="{{ route('categoryedit',$item->id) }}" class="btn  btn-sm" style="background:#008789;"><i class="material-icons">edit</i></a> 
                              <form id="delete-{{$item->id}}" method="POST" action="{{ route('categorydelete',$item->id) }}">
                                @csrf  
                              </form>
                              <button type="button" href="" class="btn btn-danger btn-sm "onclick="if(confirm('Are you sure?')){
                              event.preventDefault();
                              document.getElementById('delete-{{$item->id}}').submit();}
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
