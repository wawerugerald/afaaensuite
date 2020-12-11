@extends('backend.layout.template')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
       		<form action="/countries-store" method="POST" enctype="multipart/form-data">
	          @csrf	        
	          <div class="row">
	          	<div class="col">
	          	  <div class="form-group">
                    <label>Official Name</label>
                    <input type="text" name="countryname" value="{{old('countryname')}}"class="form-control">                
                  </div>
	          	</div>
	          	<div class="col">
	          	  <div class="form-group">
                    <label>Common Name</label>
                    <input type="text" name="commonname" value="{{old('commonname')}}"class="form-control">                
                  </div> 
	          	</div>
	          </div>
	          <div class="row">
	          	<div class="col">
	          		<div class="form-group">
	                    <label>Eiti Status</label>
		                    <select name="eiti" class="form-control">
		                      <option value="0">No Status</option>
		                      <option value="1">Suspended</option>
		                      <option value="2">Member</option>                    
		                    </select>                
                    </div>	          		
	          	</div>
	          	<div class="col">
	          		  <div class="form-group">
                        <label>Dependancy</label>
		                    <select name="dependancy" class="form-control">
		                      <option value="0">Low</option>
		                      <option value="1">Medium</option>
		                      <option value="2">High</option>                    
		                    </select>                
                      </div>
	          	</div>
	          </div>
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label for="arbitration_institution">Arbitration Institutions</label>
                  <select name="arbitration_institution" class="form-control">
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                  </select>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="compliance">Arbitration Compliance</label>
                  <select name="compliance" class="form-control">
                    <option value="0">NYC</option>
                    <option value="1">ICSID</option>
                    <option value="2">OHADA </option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <div class="form-group">
              <input id='fileid' type='file' name="countryimage" class="form-control" hidden/>
              <input id='buttonid' type='button' name="countryimage" class="form-control" value='Upload Country Flag' style="background-color: #0EA616;color: #fff " />
            </div>
              </div>
              <div class="col">
                 <div class="form-group">
              <input id='fileidd' type='file' name="countrymap" class="form-control" hidden/>
              <input id='buttonidd' type='button' name="countrymap" class="form-control" value='Upload Country Map' style="background-color: #0EA616;color: #fff " />
            </div>
              </div>
            </div> 
              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label>Country Summary</label>                     
                      <textarea id="editor" name="countrysummary"class="form-control" rows="4" value="{{old('countrysummary')}}"></textarea>
              </div>
                </div>
                <div class="col">
                  
              <div class="form-group">
                <label>Arbitration Institution Info:</label>
                  <textarea id="editor1" name="arbitrationinstitution" class="form-control" rows="4" ></textarea>
              </div>
                </div>
              </div>
              
              <div class="text-center">
              	 <button type="submit" class="btn btn-success">Submit</button>
                 <a href="/countries-reg" class="btn btn-danger">Cancel</a>
              </div>              
        </div>
      </div>
    </div>
  </div>
</div> 
<!--tiny mce edit scripts-->
 <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
 <script>
  document.getElementById('buttonid').addEventListener('click', openDialog);
  function openDialog() 
  {
  document.getElementById('fileid').click();
  }
</script>
 <script>
  document.getElementById('buttonidd').addEventListener('click', openDialog);
  function openDialog() 
  {
  document.getElementById('fileidd').click();
  }
</script>
<script>
tinymce.init({
  selector: 'textarea#editor',
  menubar: false
});
</script>
<script>
tinymce.init({
  selector: 'textarea#editor1',
  menubar: false
});
</script>
@endsection

