@extends('layouts.app')

@section('title','Contact_Index')

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
                  <h4 class="card-title ">All Contacts</h4>
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
                          Email
                        </th>
                        <th class="text-center">
                          Subject
                        </th>
                        <th class="text-center">
                          Sent_At
                        </th>
                       
                        <th class="text-center">
                          Action
                        </th>
                      </thead>
                      <tbody>
                        @foreach($contacts as $contact)
                          <tr>
                            <td>{{ $contact->id }}</td>
                            <td>{{ $contact->name }}</td>
                            <td>{{ $contact->email}}</td>
                            <td>{{ $contact->subject }}</td>
                            <td>{{ $contact->created_at }}</td>

                            <td class="text-center">
                              <a href="{{ route('contactdetails',$contact->id) }}" class="  btn  btn-sm" style="background:#008789;"><i class="material-icons">details</i>
                              </a> 
                              <form id="delete-{{$contact->id}}" method="POST" action="{{ route('contactdelete',$contact->id) }}">
                                @csrf  
                              </form>
                              <button href="" class="btn btn-danger btn-sm "onclick="if(confirm('Are you sure?'))
                                  {
                                    event.preventDefault();
                                    document.getElementById('delete-{{$contact->id}}').submit();
                                  }
                                  else
                                  {
                                    event.preventDefault();
                                  }">
                                  <i class="material-icons">delete_outline</i>
                              </button>
                            </td>

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
  <script src="{{asset('https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js  ')}}"></script>
  <script src="{{asset('https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js')}}"></script>
  <script>
    $(document).ready(function() {
        $('#table').DataTable();
      } );
  </script>

@endpush


