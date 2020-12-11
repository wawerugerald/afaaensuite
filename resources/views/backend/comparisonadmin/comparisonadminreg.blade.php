@extends('backend.layout.template')
@section('content')
<div class="row">
  <div class="col">    
         <h6 class="m-0 font-weight-bold text-primary">COMPARISON TEXTS MANAGE</h6>            
  </div>
   <div class="col">
    <div class="float-right">
        <div class="row user-add-button">
           <a href="/comparisonadmin-add" class="btn btn-primary btn-icon-split" style="margin-right: 15px;">
              <span class="icon"><i class="fas fa-plus"></i></span>
                    <span class="text">New Comparison text</span> </a>
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
                      <th>Name</th>
                      <th>Full Name</th>                     
                      <th>Description</th>
                      <th></th>
                      <th></th>                                 
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($comparisonadmin as $row)                                  
                    <tr>
                            <td>{{$row->ID}}</td>
                            <td>{{$row->name}}</td>                           
                            <td>{{$row->fullname}}</td>
                            <td>{{$row->text}}</td>                                                                               
                            <td>
                            <a href="/comparisonadmin-edit/{{$row->ID}}" class="btn btn-success">Edit</a>
                            </td>
                            <td>
                                <form action="" method="POST">                                                                   
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



