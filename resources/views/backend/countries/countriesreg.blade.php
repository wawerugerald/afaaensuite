@extends('backend.layout.template')
@section('content')
<div class="row">
  <div class="col">
    
         <h6 class="m-0 font-weight-bold text-primary">COUNTRIES' MANAGE</h6>            
  </div>
   <div class="col">
    <div class="float-right">
        <div class="row user-add-button">
           <a href="/countries-add" class="btn btn-primary btn-icon-split" style="margin-right: 15px;">
              <span class="icon"><i class="fas fa-plus"></i></span>
                    <span class="text">New Country</span> </a>
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
                      <th>Official Name</th>
                      <th>Common Name</th>
                      <th>Eiti Status</th>
                      <th>Eiti Status 2016</th>
                      <th>Dependancy</th>
                      <!-- <th>View</th>
                      <th>Edit</th>
                      <th>Delete</th> -->
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($countries as $row)
                    <tr>
                            <td>{{$row->countryid}}</td>
                            <td>{{$row->countryname}}</td>
                            <td>{{$row->commonname}}</td>
                            <td>@if($row->eitistatus == 0)<span class="badge badge-primary">No Status</span>
                                @elseif($row->eitistatus == 1)<span class="badge badge-danger">Suspended</span>
                                @elseif($row->eitistatus == 2)<span class="badge badge-success">Member</span>                             
                                @endif
                           </td>
                           <td>@if($row->eiti2016 == 0)<span class="badge badge-primary">No Status</span>
                                @elseif($row->eiti2016 == 1)<span class="badge badge-primary">Yet to be Assessed against 2016 Standard</span>
                                @elseif($row->eiti2016 == 2)<span class="badge badge-success">Satisfactory</span> 
                                @elseif($row->eiti2016 == 3)<span class="badge badge-success">Meaningful</span>    
                                @elseif($row->eiti2016 == 4)<span class="badge badge-warning">Inadequate</span>    
                                @elseif($row->eiti2016 == 5)<span class="badge badge-danger">Suspended</span>
                                @elseif($row->eiti2016 == 6)<span class="badge badge-danger">Suspended Due To Political Instability</span> 
                                @elseif($row->eiti2016 == 7)<span class="badge badge-danger">Suspended For Missing Deadline</span>                              
                                @endif
                           </td>
                           <td>@if($row->dependancy == 0)<span class="badge badge-primary">Low</span>
                                @elseif($row->dependancy == 1)<span class="badge badge-warning">Medium</span>
                                @elseif($row->dependancy == 2)<span class="badge badge-success">High</span>                             
                                @endif                             
                           </td>
                          <!--  <td>
                             add the view function for countries here

                           </td> -->
                           <td>
                            <a href="/countries-edit/{{$row->countryid}}" class="btn btn-success">Edit</a>
                          </td>
                          <td>
                              <form action="/countries-delete/{{$row->countryid}}" method="POST">
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
               <div class="row pagination-row">
             {{$countries->links()}}
            </div>
            </div>
@endsection



