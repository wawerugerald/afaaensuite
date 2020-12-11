@extends('backend.layout.template')
@section('content')  
        <div class="row">
          <div class="col">
              <h6 class="m-0 font-weight-bold text-primary">COMPULSORY SCOPE LIST MANAGE</h6>
              <br>                    
          </div>
          <div class="col">
             <div class="float-right">
                  <div class="row user-add-button">
                        <a href="" class="btn btn-primary btn-icon-split" style="margin-right: 15px;">
                              <span class="icon"><i class="fas fa-plus"></i></span>
                              <span class="text">New Compulsory Scope</span> </a>
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
                      <th>Name</th>                    
                      <th>Description</th>
                      <th></th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    
                    <tr>
                            <td></td>
                            <td></td>
                            <td></td>                      
                                                   
                           <td>
                            <a href="" class="btn btn-success">Edit</a>

                          </td>
                          <td>
                              <form action="" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                              </form>
                          </td>
                          </tr>
                         
                  </tbody>
                </table>                
              </div>
               <div class="row pagination-row">            
            </div>
            </div>
@endsection



