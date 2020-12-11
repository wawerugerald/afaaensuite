<div class="container">
 <div class="row">
   <div class="col" style="background-color: #0EA616"><!-- #17A61A -->
    <div class="container" >
      <br><br>
      <div class="form-group">        
        <div class="mb-4 text-center" >
         <img src="{{asset(auth()->user()->profileimage)}}" style="width: 200px; height: 200px; border-radius: 210%;" class="rounded-circle z-depth-1-half avatar-pic" alt="profileimage">
       </div><br>
       <div class="d-flex justify-content-center">
       <!--  <div class="btn btn-mdb-color btn-rounded float-left"> -->
      <span class="btn" style="background-color: #fff"><input type="file" name="profileimage" class="form-control">      
      </span>
     <!--  <div class="btn" style="background-color: #fff">
        <span>Upload New Image</span>
        <input type="file" name="profileimage"class="form-control">
      </div> -->
    </div>
      </div>
      <div class="form-group">
        <label for="name" class="col-md-4 text-left text-black col-form-label label label-primary">Name:</label>
        <input type="text" class="form-control  @error('name') is-invalid @enderror" id="name" name="name" value="{{ $user->name }}" style="border-radius: 5px">
      </div>
      <div class="form-group">
        <label for="email" class="col-md-4 text-left text-black col-form-label label label-primary">Email Address:</label>
        <input type="email" class="form-control  @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" style="border-radius: 5px">
      </div>
      <div class="form-group">
        <label for="residentcountry" class="col-md-4 text-left text-black col-form-label label label-primary">Country:</label>
        <select name="residentcountry" class="form-control">
               @foreach($countries as $country)
               <option value="{{$country->countryid}}">{{$country->countryname}}</option>
               @endforeach
          </select>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="container">
      <div class="form-group">
        <label for="linkedin" class="col-md-4 text-left text-black col-form-label label label-primary">LinkedIn</label>
        <input type="linkedin" name="linkedin" placeholder="Add your LinkedIn" class="form-control" style="border-color: #17A61A;border-radius: 5px ">
      </div>
      <div class="form-group">
        <label for="twitter" class="col-md-4 text-left text-black col-form-label label label-primary">Twitter</label>
        <input type="twitter" name="twitter" placeholder="Add your Twitter" class="form-control"style="border-color: #17A61A;border-radius: 5px ">
      </div>
      <div class="form-group">
         <label for="gender" class="col-md-4 text-left text-black col-form-label label label-primary">Gender:</label>
        <select class="form-control" id="gender" name="gender" style="border-color: #17A61A;border-radius: 5px ">
          <option value="1" {{$user->gender == 1?  'selected="selected"': ''}}>Male</option>
          <option value="0" {{$user->gender == 0?  'selected="selected"': ''}}>Female</option>
        </select>
      </div>
      <div class="form-group">
        <label for="language" class="col-md-4 text-left text-black col-form-label label label-primary">Language:</label>
        <select class="form-control" id="language" name="language" style="border-color: #17A61A;border-radius: 5px ">
               <option value="0" {{ $user->language == 0 ? 'selected="selected"': '' }}>English</option>
               <option value="1" {{ $user->language == 1 ? 'selected="selected"': '' }}>Français</option>
               <option value="2" {{ $user->language == 2 ? 'selected="selected"': '' }}>Portuguese</option>
          </select>
      </div>
      <div class="form-group">
        <label for="currentorganisation" class="col-md-4 text-left text-black col-form-label label label-primary">Organisation:</label>
        <select name="currentorganisation" class="form-control" style="border-color: #17A61A;border-radius: 5px ">
        @foreach($organisations as $organisation)
        <option value="{{$organisation->organisationid}}">{{$organisation->organisationname}}</option>
        @endforeach
        </select>
      </div>
       <div class="form-group">
        <label for="biography" class="col-md-4 text-left text-black col-form-label label label-primary">Biography:</label>
        <textarea id="editor" name="biography"class="form-control biography {{ $errors->has('biography') ? ' is-invalid' : ''}}" rows="4" value="{{ $user->biography }}" style="border-color: #17A61A ">{{ $user->biography }}</textarea>
      </div>
    </div>
  </div>
 </div>
</div>
<style>
  .avatar-pic {
width: 220px;
}
</style>
<!--Editor scripts-->
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
  tinymce.init({
    selector: 'textarea#editor',
    menubar: false
  });
</script>
