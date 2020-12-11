@extends('backend.layout.template')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <form action="/organisation-update/{{$organisations->organisationid}}" method="POST">
          @csrf
          @method('PUT')         
                  <div class="form-group">
                    <label>Organisation Name</label>
                    <input type="text" name="organisationname" value="{{$organisations->organisationname}}"class="form-control">                
                  </div>
                  <div class="form-group">
                    <label>Organisation Address</label>
                    <input type="text" name="organisationaddress" value="{{$organisations->organisationadd}}"class="form-control">                
                  </div>                  
                  <div class="form-group">
                    <label>Organisation Number</label>
                    <input type="text" name="organisationnumber" value="{{$organisations->organisationno}}"class="form-control">                
                  </div> 
                 
                  <div class="form-group">
                    <label>Organisation Web</label>
                    <input type="text" name="organisationwebsite" value="{{$organisations->organisationweb}}"class="form-control">                
                  </div>                                         
                  <div class="text-center">
                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="/organisation-reg" class="btn btn-danger">Cancel</a>
                  </div>                   
          </form>
        </div>
      </div>
    </div>
  </div>
</div> 
@endsection



