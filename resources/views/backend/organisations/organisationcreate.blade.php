@extends('backend.layout.template')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
       		<form action="/organisation-store" method="POST">
	          @csrf	        
	          <div class="row">
	          	<div class="col">
	          	  <div class="form-group">
                    <label>Organisation Name:</label>
                    <input type="text" name="organisationname" value="{{old('organisationname')}}"class="form-control">                
                  </div>
	          	</div>
	          	<div class="col">
	          	  <div class="form-group">
                    <label>Organisation Address:</label>
                    <input type="text" name="organisationaddress" value="{{old('organisationadd')}}"class="form-control">                
                  </div> 
	          	</div>
	          </div>
            <div class="row">
              <div class="col">
                <label>Organisation Number:</label>
                <input type="text" name="organisationnumber" value="{{old('organisationno')}}"class="form-control">
              </div>
              <div class="col">
                <label>Organisation Website:</label>
                <input type="text" name="organisationwebsite" value="{{old('organisationweb')}}"class="form-control">
              </div>
            </div> <br>

              <div class="text-center">
              	 <button type="submit" class="btn btn-success">Submit</button>
                 <a href="/organisation-reg" class="btn btn-danger">Cancel</a>
              </div>              
        </div>
      </div>
    </div>
  </div>
</div> 
<!--tiny mce edit scripts-->
 <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
 <script>
  tinymce.init({
    selector: 'textarea#editor',
    menubar: false
  });
</script> 

@endsection

