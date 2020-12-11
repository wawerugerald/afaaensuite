@extends('backend.layout.template')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <form action="/institution-update/{{$institutions->institutionid}}" method="POST">
          @csrf
          @method('PUT')         
                  <div class="form-group">
                    <label>Institution Name</label>
                    <input type="text" name="institutionname" value="{{$institutions->institutionname}}"class="form-control">                
                  </div>
                  <div class="form-group">
                    <label>Institution Address</label>
                    <input type="text" name="insititutionaddress" value="{{$institutions->institutionadd}}"class="form-control">                
                  </div> 
                    <div class="form-group">
                    <label>Postal Address</label>
                    <input type="text" name="insititutionpostal" value="{{$institutions->institutionpost}}"class="form-control">                
                  </div>
                  <div class="form-group">
                    <label>Contact Number</label>
                    <input type="text" name="insititutionnumber" value="{{$institutions->institutionno}}"class="form-control">                
                  </div> 
                 
                  <div class="form-group">
                    <label>Institution Web</label>
                    <input type="text" name="insititutionweb" value="{{$institutions->institutionweb}}"class="form-control">                
                  </div>                                         
                  <div class="text-center">
                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="/institution-reg" class="btn btn-danger">Cancel</a>
                  </div>                   
          </form>
        </div>
      </div>
    </div>
  </div>
</div> 
@endsection



