@extends('backend.layout.template')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
       		<form action="/institution-store" method="POST">
	          @csrf	        
	          <div class="row">
	          	<div class="col">
	          	  <div class="form-group">
                    <label>Institution Name</label>
                    <input type="text" name="insitutionname" value="{{old('institutionname')}}"class="form-control">                
                  </div>
	          	</div>
	          	<div class="col">
	          	  <div class="form-group">
                    <label>Institution Address</label>
                    <input type="text" name="insitutionaddress" value="{{old('institutionadd')}}"class="form-control">                
                  </div> 
	          	</div>
	          </div>
	               
             
              <div class="text-center">
              	 <button type="submit" class="btn btn-success">Submit</button>
                 <a href="/institution-reg" class="btn btn-danger">Cancel</a>
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

