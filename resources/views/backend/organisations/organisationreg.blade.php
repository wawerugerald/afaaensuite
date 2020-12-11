@extends('backend.layout.template')
@section('content')
<div class="row">
  <div class="col">    
         <h6 class="m-0 font-weight-bold text-primary">ORGANISATION MANAGE</h6>            
  </div>
   <div class="col">
    <div class="float-right">
        <div class="row user-add-button">
           <a href="/organisation-add" class="btn btn-primary btn-icon-split" style="margin-right: 15px;">
              <span class="icon"><i class="fas fa-plus"></i></span>
                    <span class="text">New Organisation</span> </a>
      </div><br>       
    </div>   
  </div>
</div>
<br>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif            
    <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Organisation Name</th>
                      <th>Organisation Address</th>                     
                      <th>Contact Number</th>
                      <th>Website</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>  
                  @foreach($organisations as $row)                 
                    <tr>
                            <td>{{$row->organisationid}}</td>
                            <td>{{$row->organisationname}}</td>                           
                            <td>{{$row->organisationadd}}</td>
                            <td>{{$row->organisationno}}</td>
                            <td>{{$row->organisationweb}}</td>                          
                            <td>
                            <a href="/organisation-edit/{{$row->organisationid}}" class="btn btn-success">Edit</a>
                            </td>
                            <td>
                                <form action="/organisation-delete/{{$row->organisationid}}" method="POST">
                                  @csrf
                                  @method('DELETE')                                 
                                  <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                          </tr>
                          @endforeach
                  </tbody>
                </table>
              </div>
            </div>
@endsection



