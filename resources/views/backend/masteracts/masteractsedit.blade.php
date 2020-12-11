@extends('backend.layout.template')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <form action="/acts-update/{{$acts->actsid}}" method="POST">
          @csrf
          @method('PUT') 
                <div class="row">
                  <div class="col">
                  <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" value="{{$acts->title}}"class="form-control">                
                  </div>
                </div>
                <div class="col">
                  <div class="form-group">
                    <label>Title Text</label>
                    <input type="text" name="titletext" value="{{$acts->titletext}}"class="form-control">                
                  </div>
                  </div>
                  </div>                                                  
                         <div class="row">
                   <div class="col"> 
                     <div class="form-group">                  
                          <input type="date" name="date" value="{{$acts->enactmentdate}}"class="form-control" placeholder="enactmentdate"><!-- {{old('enactmentdate')}} -->                
                     </div>
                  </div>
                <div class="col">
                 <div class="input-group">
                      <div class="input-group-prepend">
                           <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                      </div>
                  <div class="custom-file">
                      <input type="file" class="custom-file-input" id="file"
                             aria-describedby="inputGroupFileAddon01">
                      <label class="custom-file-label" for="inputGroupFile01">Original Document PDF</label>
                 </div>
                </div> 
              </div>
              </div>
               <div class="form-group">
                  <label>Document Type</label>                     
                        <select name="type" class="form-control" value="{{$acts->type}}">
                          <option value="{$acts->type}}">@if($acts->type == 1)Selected Primary Legislation
                                                          @elseif($acts->type == 2)Selected Primary Regulation
                                                          @elseif($acts->type == 3)Selected Related Legislation and Regulatory Document
                                                          @endif
                          </option>
                          <option value="1">Primary Legisltation</option>
                          <option value="2">Primary Regulation</option>
                          <option value="3">Related Legislation and Regulatory Document</option>
                        </select>                
                </div> 
               <fieldset>Document Heirachy</fieldset>
        <div class="row">            
          <div class="col">            
                <div class="form-group">
                  <label>Level 1</label>                     
                        <select name="heirachy" class="form-control">
                          <option value="1">Title</option>
                          <option value="2">Chapter</option>
                          <option value="3">Part</option>    
                          <option value="4">Section</option> 
                          <option value="5">Sub Section</option> 
                          <option value="6">Article</option>             
                        </select>                
                </div>  
          </div>
          <div class="col">
            <div class="form-group">
                    <label>Level 1 title</label>
                    <input type="text" name="title1" value=""class="form-control"><!-- {{old('title')}}    -->             
                  </div>
          </div>
        </div>
        <div class="row">            
          <div class="col">            
                <div class="form-group">
                  <label>Level 2</label>                     
                        <select name="heirachy1" class="form-control">
                          <option value="1">Title</option>
                          <option value="2">Chapter</option>
                          <option value="3">Part</option>    
                          <option value="4">Section</option> 
                          <option value="5">Sub Section</option> 
                          <option value="6">Article</option>             
                        </select>                
                </div>  
          </div>
          <div class="col">
            <div class="form-group">
                    <label>Level 2 title</label>
                    <input type="text" name="title2" value=""class="form-control"><!-- {{old('title')}}    -->             
                  </div>
          </div>
        </div>
        <div class="row">            
          <div class="col">            
                <div class="form-group">
                  <label>Level 3</label>                     
                        <select name="heirachy2" class="form-control">
                          <option value="1">Title</option>
                          <option value="2">Chapter</option>
                          <option value="3">Part</option>    
                          <option value="4">Section</option> 
                          <option value="5">Sub Section</option> 
                          <option value="6">Article</option>             
                        </select>                
                </div>  
          </div>
          <div class="col">
            <div class="form-group">
                    <label>Level 3 title</label>
                    <input type="text" name="title3" value=""class="form-control"><!-- {{old('title')}}    -->             
                  </div>
          </div>
        </div>
        <div class="row">            
          <div class="col">            
                <div class="form-group">
                  <label>Level 4</label>                     
                        <select name="heirachy4" class="form-control">
                          <option value="1">Title</option>
                          <option value="2">Chapter</option>
                          <option value="3">Part</option>    
                          <option value="4">Section</option> 
                          <option value="5">Sub Section</option> 
                          <option value="6">Article</option>             
                        </select>                
                </div>  
          </div>
          <div class="col">
            <div class="form-group">
                    <label>Level 4 title</label>
                    <input type="text" name="title4" value=""class="form-control"><!-- {{old('title')}}    -->             
                  </div>
          </div>
        </div>
        <div class="row">            
          <div class="col">            
                <div class="form-group">
                  <label>Level 5</label>                     
                        <select name="heirachy5" class="form-control">
                          <option value="1">Title</option>
                          <option value="2">Chapter</option>
                          <option value="3">Part</option>    
                          <option value="4">Section</option> 
                          <option value="5">Sub Section</option> 
                          <option value="6">Article</option>             
                        </select>                
                </div>  
          </div>
          <div class="col">
            <div class="form-group">
                    <label>Level 5 title</label>
                    <input type="text" name="title5" value=""class="form-control"><!-- {{old('title')}}    -->             
                  </div>
          </div>
        </div>
        <div class="row">            
          <div class="col">            
                <div class="form-group">
                  <label>Level 6</label>                     
                        <select name="heirachy6" class="form-control">
                          <option value="1">Title</option>
                          <option value="2">Chapter</option>
                          <option value="3">Part</option>    
                          <option value="4">Section</option> 
                          <option value="5">Sub Section</option> 
                          <option value="6">Article</option>             
                        </select>                
                </div>  
          </div>
          <div class="col">
            <div class="form-group">
                    <label>Level 6 title</label>
                    <input type="text" name="title6" value=""class="form-control"><!-- {{old('title')}}    -->             
                  </div>
          </div>
        </div>                   
                 
                  <div class="text-center">
                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="/acts-reg" class="btn btn-danger">Cancel</a>
                  </div>                  
          </form>
        </div>
      </div>
    </div>
  </div>
</div> 
@endsection



