@extends('backend.layout.template')
@section('content')
<div class="row">
          <div class="col">
              <h6 class="m-0 font-weight-bold text-primary">VIEW - {{$users->name}}</h6>
              <br>                    
          </div>        
        </div> 
<div class="container">
  <div class="row">   
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">        
               
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" value="{{$users->name}}"class="form-control"readonly>                
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" value="{{$users->email}}"class="form-control" readonly>                
                  </div>                               
                  <div class="form-group" readonly>
                    <label>Roles</label>                                   
                    <input type="text" name="roles" value="{{$users->roles}}"class="form-control" readonly>                                
                  </div>
                   <div class="form-group">
                    <label>Language</label>
                    <input type="text" name="language" value="{{$users->language}}"class="form-control" readonly>                            
                  </div>
                   <div class="form-group">
                    <label>Status</label>
                    <input type="text" name="status" value="{{$users->status}}"class="form-control" readonly>                             
                  </div>          
                 
        </div>
      </div>
    </div>
  </div><br><br>
  <div class="row">
    <div class="col">
        <div class="row">
          <div class="col">
              <h6 class="m-0 font-weight-bold text-primary">Document Rights</h6>
              <br>                    
          </div>
          <div class="col">
             <div class="float-right">
                  <div class="row user-add-button">
                        <a href="#" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#comparisonrights" style="margin-right: 15px;">
                              <span class="icon"><i class="fas fa-plus"></i></span>
                              <span class="text">ADD</span> </a>
                  </div>
            </div> 
          </div>
        </div><br>
      <div class="card">
        <div class="card-body">        
                   <div class="table-responsive">
                     <table class="table table-bordered table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                          <tr>                    
                            <th>Country</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th></th>
                            <th></th>                     
                          </tr>
                        </thead>
                        <tbody> 
                        @foreach($users->countries as $country)             
                        <tr>
                          <td>{{ $countrymodel->where('countryid',$country->countryid)->first()->countryname }}</td>
                          <td>{{ $country->roles}}</td>
                          <td>{{ $country->status}}</td>
                          <td>
                            <a href="" class="btn btn-success">Edit</a>
                          </td>
                          <td>
                            <form action="" method="">
                            
                              <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                          </td>                       
                                               
                        </tr>
                       @endforeach
                      </tbody>
                </table>                
              </div>
        </div>
      </div>      
    </div>
    <div class="col">
       <div class="row">
          <div class="col">
              <h6 class="m-0 font-weight-bold text-primary">Comparison Rights</h6>
              <br>                    
          </div>
          <div class="col">
             <div class="float-right">
                  <div class="row user-add-button">
                        <a href="#" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#documentrights" style="margin-right: 15px;">
                              <span class="icon"><i class="fas fa-plus"></i></span>
                              <span class="text">ADD</span> </a>
                  </div>
            </div> 
          </div>
        </div><br>
      <div class="card">              
        <div class="card-body">
              <div class="table-responsive">
                     <table class="table table-bordered table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                          <tr>                    
                            <th>Country</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th></th>
                            <th></th>                     
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($users->countries as $country)
                        <tr>
                          <td>{{ $countrymodel->where('countryid',$country->countryid)->first()->countryname }}</td>
                          <td>{{ $country->roles}}</td>
                          <td>{{ $country->status}}</td>
                          <td>
                            <a href="#" class="btn btn-success">Edit</a>
                          </td>
                          <td>
                            <form action="" method="">                            
                              <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
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
<!--div ya comparison admin--> 
<!-- Central Modal Small -->
<div class="modal fade" id="comparisonrights" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">

  <!-- Change class .modal-sm to change the size of the modal -->
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title w-100" id="myModalLabel">Document Rights</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div><br>   
           <form class="form-inline d-flex justify-content-center md-form form-sm mt-0"><br>
            <!--ya search-->
            <div class="row">
              <div class="col">
                <!--place ya kuweka select all-->
              </div>
              <div class="col">                  
                   <input class="form-control form-control-sm ml-3 w-75" type="text" placeholder="Search"
                  aria-label="Search">
              </div>
            </div>
           
          </form>    
       <div class="modal-body">
         <form action="/comparison-store/{{$users->id}}" method="POST">
          @csrf
          @method('PUT')  
        <div class="form-group">
                    <label>Country Assign</label>
                    <select name="assigncountry"  class="form-control">
                      @foreach($countries as $country)
                      <option value="{{$country->countryid}}" >{{$country->countryname}}</option>
                      @endforeach
                    </select>                
        </div>
             <div class="form-group">
                    <label>Roles</label>
                    <select name="roles" class="form-control">
                      <option value="Reviewer/Publisher">Reviewer/Publisher</option>
                      <option value="Administrator">Administrator</option>
                      <option value="Publisher">Publisher</option>
                      <option value="Contributor">Contributor</option>
                      <option value="Reviewer">Reviewer</option>
                    </select>                
                  </div>
            <div class="form-group">
                  <label>Status</label>
                    <select name="status" class="form-control">
                      <option value="Active">Active</option>
                      <option value="Inactive">Inactive</option>
                      <option value="Banned">Banned</option>                     
                  </select>                
           </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success btn-sm">Create</button>
      </div>
    </form>
    </div>
    
  </div>
</div>
<!-- Central Modal Small -->
<div class="modal fade" id="documentrights" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">

  <!-- Change class .modal-sm to change the size of the modal -->
  <div class="modal-dialog modal-sm" role="document">


    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title w-100" id="myModalLabel">Comparison Rights</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="/document-store/{{$users->id}}" action="">
          @csrf
          @put
            <div class="form-group">
                    <label>Country Assign</label>
                    <select name="assigncountry" class="form-control">
                      @foreach($countries as $country)
                      <option value="{{$country->countryid}}">{{$country->countryname}}</option>
                      @endforeach
                    </select>                
          </div>
          <div class="form-group">
                    <label>Roles</label>
                    <select name="roles" class="form-control">
                      <option value="0">Reviewer/Publisher</option>
                      <option value="1">Administrator</option>
                      <option value="2">Publisher</option>
                      <option value="3">Contributor</option>
                      <option value="4">Reviewer</option>
                    </select>                
          </div>
           <div class="form-group">
                  <label>Status</label>
                    <select name="status" class="form-control">
                      <option value="0">Active</option>
                      <option value="1">Inactive</option>
                      <option value="2">Banned</option>                     
                    </select>                
           </div>
           <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success btn-sm">Create</button>
          </div>
        </form>   
      </div>     
    </div>
  </div>
</div>
@endsection


