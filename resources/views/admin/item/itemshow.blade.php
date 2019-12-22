@extends('layouts.app')

@section('title','Item_Index')

@push('extracss')
	<link rel="stylesheet" type="text/css" href="{{asset('https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css')}}">
@endpush



@section('content')
	<div class="content">
        <div class="container-fluid">
          <div class="row">

            @include('layouts.partial.message')
            
            <div class="col-md-12">
              <a href="{{ route('itemcreate')}}" class="btn btn-info">Add New</a>
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">All Items</h4>
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
                          Category_Name
                        </th>
                        <th class="text-center">
                          Description
                        </th>
                        <th class="text-center">
                          price
                        </th>
                        <th class="text-center">
                          Image
                        </th>
                       
                        <th class="text-center">
                          Action
                        </th>
                      </thead>
                      <tbody>
                      	@foreach($items as $item)
	                        <tr>
	                          <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
	                          <td>{{ $item->category->name}}</td>
                            <td>{{ $item->description }}</td>
                            <td>{{ $item->price }}</td>
                            <td><img src="{{ asset('public/upload/item/'.$item->image) }}" width="50px" height="50px"></td>
                            
	                         
                            <td class="text-center">
                              <a  href="{{ route('itemedit',$item->id) }}" class="btn  btn-sm" style="background:#008789;"><i class="material-icons">edit</i></a>
                              <form id="delete-{{$item->id}}" method="POST" action="{{ route('itemdelete',$item->id) }}">
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
