@extends('backend.layout.template')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <form action="/countries-update/{{$countries->countryid}}" method="POST">
          @csrf
          @method('PUT')         
                  <div class="form-group">
                    <label>Official Name</label>
                    <input type="text" name="countryname" value="{{$countries->countryname}}"class="form-control">                
                  </div>
                  <div class="form-group">
                    <label>Common Name</label>
                    <input type="text" name="commonname" value="{{$countries->commonname}}"class="form-control">                
                  </div>                                                    
                  <div class="form-group">                   
                    <label>Eiti Status</label>&nbsp @if($countries->eitistatus == 0)<span class="badge badge-primary">No Status</span>@elseif($countries->eitistatus == 1)<span class="badge badge-danger">Suspended</span>@elseif($countries->eitistatus == 2)<span class="badge badge-success">Member</span>@endif
                    <select name="eitistatus" class="form-control">
                      <option value="0">No Status</option>
                      <option value="1">Suspended</option>
                      <option value="2">Member</option>                    
                    </select>                
                  </div>    
                  <div class="form-group">                   
                    <label>Eiti Status 2016</label>&nbsp @if($countries->eiti2016 == 0)<span class="badge badge-primary">No Status</span>@elseif($countries->eiti2016 == 1)<span class="badge badge-primary">Yet to be Assessed against 2016 Standard</span>@elseif($countries->eiti2016 == 2)<span class="badge badge-success">Satisfactory</span>@elseif($countries->eiti2016 == 3)<span class="badge badge-success">Meaningful</span>@elseif($countries->eiti2016 == 4)<span class="badge badge-warning">Inadequate</span>@elseif($countries->eitistatus == 5)<span class="badge badge-danger">Suspended</span>@elseif($countries->eitistatus == 6)<span class="badge badge-danger">Suspended Due To Political Instability</span>@elseif($countries->eitistatus == 7)<span class="badge badge-danger">Suspended For Missing Deadline</span>@endif
                    <select name="eiti2016" class="form-control">
                      <option value="0">No Status</option>
                      <option value="1">Yet to be Assessed against 2016 Standard</option>
                      <option value="2">Satisfactory</option> 
                      <option value="3">Meaningful</option> 
                      <option value="4">Inadequate</option> 
                      <option value="5">Suspended</option> 
                      <option value="6">Suspended Due To Political Instability</option>  
                      <option value="7">Suspended For Missing Deadline</option>                   
                    </select>                
                  </div>             
                  <div class="form-group">
                    <label>Dependancy</label>&nbsp @if($countries->dependancy == 0)<span class="badge badge-primary">Low</span>@elseif($countries->dependancy == 1)<span class="badge badge-warning">Medium</span>@elseif($countries->dependancy == 2)<span class="badge badge-success">High</span>@endif
                    <select name="dependancy" class="form-control">
                      <option value="0">Low</option>
                      <option value="1">Medium</option>
                      <option value="2">High</option>                    
                    </select>                
                  </div>          
                  <div class="form-group">
                    <label>Country Summary:</label>                     
                      <textarea id="editor" name="countrysummary"class="form-control" rows="4" value="{{$countries->countrysummary}}"></textarea>

                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="/countries-reg" class="btn btn-danger">Cancel</a>
                  </div>                  
          </form>
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



