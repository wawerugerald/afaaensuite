@extends('backend.layout.template')
@section('content')  
        <div class="row">
          <div class="col">
              <h6 class="m-0 font-weight-bold text-primary">USERS' REGISTRY MANAGE</h6>
              <br>                    
          </div>
          <div class="col">
             <div class="float-right">
                  <div class="row user-add-button">
                        <a href="/users-add" class="btn btn-primary btn-icon-split" style="margin-right: 15px;">
                              <span class="icon"><i class="fas fa-plus"></i></span>
                              <span class="text">New User</span> </a>
                  </div>
            </div> 
          </div>
        </div> 
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
                      
                      <th>Name</th>
                      <th>Email</th>
                      <th>Role</th>
                      <th>Language</th>
                      <th>Status</th>                      
                      <th>Created On</th>
                      <th></th>
                      <th></th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($users as $row)
                    <tr>
                            
                            <td>{{$row->name}}</td>
                            <td>{{$row->email}}</td>
                            <td>@if($row->roles == 0)<span class="badge badge-dark">Reviewer/Publisher</span>
                               @elseif($row->roles == 1)<span class="badge badge-success">Administrator</span>
                               @elseif($row->roles == 2)<span class="badge badge-secondary">Publisher</span>
                               @elseif($row->roles == 3)<span class="badge badge-primary">Contributor</span>
                               @elseif($row->roles == 4)<span class="badge badge-warning">Reviewer</span>
                               @endif
                           </td>
                             <td>@if($row->language == 0)<span class="badge badge-light">English</span>
                               @elseif($row->language == 1)<span class="badge badge-light">Français</span>
                               @elseif($row->language == 2)<span class="badge badge-light">Portuguese</span>
                               @endif
                           </td>
                           <td>@if($row->status == 0)<span class="badge badge-success">Active</span>
                               @elseif($row->status == 1)<span class="badge badge-primary">Inactive</span>
                               @elseif($row->status == 2)<span class="badge badge-danger">Banned</span>
                               @endif
                             </td>                             
                           <td>{{$row->created_at}}</td>
                           <td>
                             <a href="/users-view/{{$row->id}}" class="btn btn-primary">View</a>


                           </td>
                           <td>
                            <a href="/users-edit/{{$row->id}}" class="btn btn-success">Edit</a>

                          </td>
                          <td>
                              <form action="/users-delete/{{$row->id}}" method="POST">
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
             {{$users->links()}}
            </div>
            </div>
@endsection



