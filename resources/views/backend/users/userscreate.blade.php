@extends('backend.layout.template')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('User Create') }}</div>

                <div class="card-body">
                    <form method="POST" action="/users-store">
                        @csrf                        
                         <div class="form-group">
                           <label>Name</label>
                            <input type="text" name="name" value="{{old('name')}}"class="form-control">                
                        </div>
                         <div class="form-group">
                              <label>Email</label>
                                   <input type="email" name="email" value="{{old('email')}}"class="form-control">                
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
                            <label>Language</label>
                            <select name="language" class="form-control">
                              <option value="0">English</option>
                              <option value="1">Français</option>
                              <option value="2">Portuguese</option>                  
                            </select>                
                  </div> 
                       <div class="form-group">
                    <label>Password</label>
                    <input type="Password" name="password" value="{{old('password')}}"class="form-control">                
                  </div>               
                         <div class="text-center">
                           <button type="submit" class="btn btn-success">Submit</button>
                             <a href="/users-reg" class="btn btn-danger">Cancel</a>
                         </div>                      
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
