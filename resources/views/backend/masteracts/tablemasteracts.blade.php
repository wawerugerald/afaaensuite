@extends('backend.layout.template')
@section('content')  
        <div class="row">
          <div class="col">
              <h6 class="m-0 font-weight-bold text-primary">MASTER ACTS' MANAGE</h6>
              <br>                    
          </div>
          <div class="col">
             <div class="float-right">
                  <div class="row acts-add-button">
                        <a href="/acts-add" class="btn btn-primary btn-icon-split" style="margin-right: 15px;">
                              <span class="icon"><i class="fas fa-plus"></i></span>
                              <span class="text">New Master Act</span> </a>
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
                      <th>#</th>
                      <th>Type</th>
                      <th>Title</th>
                      <th>Title Text</th>                      
                      <th>Date of Enactment</th>                    
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($acts as $row)
                    <tr>
                            <td>{{$row->actsid}}</td>
                            <td>@if($row->type == 1)Primary Legislation
                                @elseif($row->type == 2) Primary Regulation
                                @elseif($row->type == 3)Related Legisltation and Regulatory Document
                                @endif


                            </td>
                            <td>{{$row->title}}</td>
                            <td>{{$row->titletext}}</td>                         
                            <td>{{$row->enactmentdate}}</td>
                           <td>
                            <a href="/acts-edit/{{$row->actsid}}" class="btn btn-success">Edit</a>

                          </td>
                          <td>
                              <form action="/acts-delete/{{$row->actsid}}" method="POST">
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



