@extends('backend.layout.template')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
       		<form action="comparisonadmin-store" method="POST">
	          @csrf	        
	          <div class="row">
	          	<div class="col">
	          	  <div class="form-group">
                    <label>Name:</label>
                    <input type="text" name="name" value="{{old('name')}}"class="form-control">                
                  </div>
	          	</div>
	          	<div class="col">
	          	  <div class="form-group">
                    <label>Full Name:</label>
                    <input type="text" name="fullname" value="{{old('fullname')}}"class="form-control">                
                  </div> 
	          	</div>
	          </div>
            <div class="row">
              <div class="col">
                <label>Description:</label>
                <input type="text" name="info" value="{{old('info')}}"class="form-control">
              </div>             
            </div><br>

              <div class="text-center">
              	 <button type="submit" class="btn btn-success">Submit</button>
                 <a href="/comparisonadmin-reg" class="btn btn-danger">Cancel</a>
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

