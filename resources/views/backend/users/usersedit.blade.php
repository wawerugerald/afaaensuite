@extends('backend.layout.template')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <form action="/users-update/{{$users->id}}" method="POST">
          @csrf
          @method('PUT')         
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" value="{{$users->name}}"class="form-control">                
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" value="{{$users->email}}"class="form-control">                
                  </div>
                  <div class="form-group">
                    <label>Country Assign</label>
                    <select name="assigncountry" class="form-control">
                      @foreach($countries as $country)
                      <option value="{{$country->countryid}}">{{$country->countryname}}</option>
                      @endforeach
                    </select>                
                  </div>
                  <!--  <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="passowrd" value="{{$users->password}}"class="form-control">                
                  </div> -->
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
                    <label>Status</label>
                    <select name="status" class="form-control">
                      <option value="0">Active</option>
                      <option value="1">Inactive</option>
                      <option value="2">Banned</option>                     
                    </select>                
                  </div>                 
                  <div class="text-center">
                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="/users-reg" class="btn btn-danger">Cancel</a> 
                  </div>                  
          </form>
        </div>
      </div>
    </div>
  </div>
</div> 
@endsection



s