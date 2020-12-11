@extends('backend.layout.template')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <form action="/comparisonadmin-update/{{$comparisonadmin->ID}}" method="POST">
          @csrf                  
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" value="{{$comparisonadmin->name}}"class="form-control">                
                  </div>
                  <div class="form-group">
                    <label>Full Name</label>
                    <input type="text" name="fullname" value="{{$comparisonadmin->fullname}}"class="form-control">                
                  </div>                  
                  <div class="form-group">
                    <label>Description</label>
                    <input type="text" name="info" value="{{$comparisonadmin->text}}"class="form-control">                
                  </div>                                           
                  <div class="text-center">
                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="/comparisonadmin-reg" class="btn btn-danger">Cancel</a>
                  </div>                   
          </form>
        </div>
      </div>
    </div>
  </div>
</div> 
@endsection



