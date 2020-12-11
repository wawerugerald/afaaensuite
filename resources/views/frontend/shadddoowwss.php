
 <div class="row" style="padding-left: 60px">
   <div class="col" style="background-color: "><!-- #17A61A -->
     <div class="row" style="margin-right:20px; margin-top:20px;">
    <div class="col-3">
      <br><br>
      <div class="form-group">
        <div class="text-center image-holder" style="margin-top:-37px" >
         <img src="{{asset(auth()->user()->profileimage)}}"  class="rounded-circle" alt="profileimage" style="width: 300px; height: 300px; border-radius: 210%;">
       </div>

       <div class="form-group" style="padding-bottom:10px; margin-top:20px">
              <label for="profile image" hidden>Upload Profile Image</label>
              <input id='fileid' type='file' name="profileimage" class="form-control" hidden/>
              <input id='buttonid' type='button' name="profileimage" class="form-control" value="Upload Profile Picture" style="background-color: #0EA616;color: #fff;border-radius: 5px;-moz-box-shadow: 0 4px 4px rgba(0, 0, 0, 0.4);
    -webkit-box-shadow: 0 4px 4px rgba(0, 0, 0, 0.4);
    box-shadow: 0 4px 4px rgba(0, 0, 0, 0.4);border-radius: 5px; " />
            </div>

  </div></div>
  <div class="col-9" >
    <div class="row row-form">
      <div class="col-md-4 col-xs-12">
        <div class="form-group">
          <label for="name" style="color: #0EA616">Title:</label>
          <select name="title" id="title" class="form-control" style=" -moz-box-shadow: 0 4px 4px rgba(0, 0, 0, 0.4);-webkit-box-shadow: 0 4px 4px rgba(0, 0, 0, 0.4); box-shadow: 0 4px 4px rgba(0, 0, 0, 0.4);border-radius: 5px;">
            <option value="mr" {{$user->titles === 'mr'?  'selected="selected"': ''}}> Mr.</option>
            <option value="mrs" {{$user->titles === 'mrs'?  'selected="selected"': ''}}>Mrs.</option>
            <option value="ms" {{$user->titles === 'ms'?  'selected="selected"': ''}}>Ms.</option>
            <option value="miss" {{$user->titles === 'miss'?  'selected="selected"': ''}}>Miss.</option>
            <option value="dr" {{$user->titles === 'dr'?  'selected="selected"': ''}}>Dr.</option>
            <option value="professor" {{$user->titles === 'professor'?  'selected="selected"': ''}}>Professor</option>
            <option value="">None</option>
          </select>
          <!-- <input type="title" name="title" class="form-control" value="{{$user->titles}}" style="box-shadow: 2px -2px #CCC;" > -->
        </div>
      </div>
      <div class="col-md-4 col-xs-12">
        <div class="form-group">
          <label for="name" style="color: #0EA616">Full Name:</label>
          <input type="text" class="form-control  @error('name') is-invalid @enderror" id="name" name="name" value="{{ $user->name }}" style="border-radius: 5px; -moz-box-shadow: 0 4px 4px rgba(0, 0, 0, 0.4);
      -webkit-box-shadow: 0 4px 4px rgba(0, 0, 0, 0.4);
      box-shadow: 0 4px 4px rgba(0, 0, 0, 0.4);" >
        </div>
      </div>
      <div class="col-md-4 col-xs-12">
        <div class="form-group">
       <label for="gender" style="color: #0EA616">Gender:</label>
      <select class="form-control" id="gender" name="gender" style="border-radius: 5px; -moz-box-shadow: 0 4px 4px rgba(0, 0, 0, 0.4);
  -webkit-box-shadow: 0 4px 4px rgba(0, 0, 0, 0.4);
  box-shadow: 0 4px 4px rgba(0, 0, 0, 0.4); ">
        <option value="">Select Gender</option>
        <option value="1" {{$user->gender == 1?  'selected="selected"': ''}}>Male</option>
        <option value="0" {{$user->gender == 0?  'selected="selected"': ''}}>Female</option>
      </select>
    </div>

      </div>

    </div>
   <div class="row row-form">
        <div class="col-md-4 col-xs-12">
          <div class="form-group">
            <label for="residentcountry" style="color: #0EA616">Country Of Birth:</label>
            <select name="residentcountry" class="form-control" style=" -moz-box-shadow: 0 4px 4px rgba(0, 0, 0, 0.4);
        -webkit-box-shadow: 0 4px 4px rgba(0, 0, 0, 0.4);
        box-shadow: 0 4px 4px rgba(0, 0, 0, 0.4);border-radius: 5px;">
                   @foreach($countries as $country)
                   @if($country->countryid == $user->countryresidence)
                   <option value="{{$country->countryid}}" selected>{{$country->countryname}}</option>
                   @else
                   <option value="{{$country->countryid}}">{{$country->countryname}}</option>
                   @endif
                   @endforeach
              </select>
          </div>
        </div>
        <div class="col-md-4 col-xs-12">
          <div class="form-group">
            <label for="academicqualificatins" style="color: #0EA616;" >Academic Qualification:</label>
            <input type="text" name="academicqualification" class="form-control" placeholder="Master of Law (LLM)" value="{{$user->academicqualifications}}" style="border-radius: 5px; -moz-box-shadow: 0 4px 4px rgba(0, 0, 0, 0.4);
        -webkit-box-shadow: 0 4px 4px rgba(0, 0, 0, 0.4);
        box-shadow: 0 4px 4px rgba(0, 0, 0, 0.4);">
          </div>
        </div>
        <div class="col-md-4 col-xs-12">

          <div class="form-group">
            <label for="currentorganisation" style="color: #0EA616">Organisation:</label>
            <select name="currentorganisation" id="currentorganisation" class="form-control" style="border-radius: 5px; -moz-box-shadow: 0 4px 4px rgba(0, 0, 0, 0.4);
        -webkit-box-shadow: 0 4px 4px rgba(0, 0, 0, 0.4);
        box-shadow: 0 4px 4px rgba(0, 0, 0, 0.4); ">

            @foreach($organisations as $organisation)
            @if($organisation->organisationid == $user->currentorganisation)
           <option value="{{$organisation->organisationid}}" selected>{{$organisation->organisationname}}</option>
            @else
            <option value="{{$organisation->organisationid}}">{{$organisation->organisationname}}</option>
            @endif

            @endforeach
            </select>
          </div>

        </div>

   </div>

   <div class="row">
        <div class="col-md-4 col-xs-12">
          <div class="form-group">
        <label for="language" style="color: #0EA616">Language:</label>
        <select class="form-control" id="language" name="language" style="border-radius: 5px ; -moz-box-shadow: 0 4px 4px rgba(0, 0, 0, 0.4);
    -webkit-box-shadow: 0 4px 4px rgba(0, 0, 0, 0.4);
    box-shadow: 0 4px 4px rgba(0, 0, 0, 0.4);">
               <option value="">Select Language</option>
               <option value="0" {{ $user->language == 0 ? 'selected="selected"': '' }}>English</option>
               <option value="1" {{ $user->language == 1 ? 'selected="selected"': '' }}>Français</option>
               <option value="2" {{ $user->language == 2 ? 'selected="selected"': '' }}>Portuguese</option>
          </select>
      </div>
        </div>
        <div class="col-md-4 col-xs-12">
          <div class="form-group">
         <label for="linkedin" style="color: #0EA616">LinkedIn:</label>
         <input type="linkedin" name="linkedin" placeholder="www.linkedin.com/in/<name>" class="form-control" style="border-radius: 5px; -moz-box-shadow: 0 4px 4px rgba(0, 0, 0, 0.4);
     -webkit-box-shadow: 0 4px 4px rgba(0, 0, 0, 0.4);
     box-shadow: 0 4px 4px rgba(0, 0, 0, 0.4); " value="{{$user->linkedin}}">
       </div>
        </div>
        <div class="col-md-4 col-xs-12">
          <div class="form-group">
         <label for="twitter" style="color: #0EA616">Twitter:</label>
         <input type="twitter" name="twitter" placeholder="@<handle>" class="form-control"style="border-radius: 5px ; -moz-box-shadow: 0 4px 4px rgba(0, 0, 0, 0.4);
     -webkit-box-shadow: 0 4px 4px rgba(0, 0, 0, 0.4);
     box-shadow: 0 4px 4px rgba(0, 0, 0, 0.4);" value="{{$user->twitter}}">
       </div>
        </div>

   </div>
  </div></div></div>
  <div class="col-12" style="padding-right: 70px">
       <div class="form-group">
        <label for="biography" style="color: #0EA616">Biography:</label>
        <textarea id="editor" name="biography"class="form-control biography {{ $errors->has('biography') ? ' is-invalid' : ''}}" rows="13" value="{{ $user->biography }}" style="border-color: #17A61A; -moz-box-shadow: 0 4px 4px rgba(0, 0, 0, 0.4);
    -webkit-box-shadow: 0 4px 4px rgba(0, 0, 0, 0.4);
    box-shadow: 0 4px 4px rgba(0, 0, 0, 0.4);">{{ $user->biography }}</textarea>
      </div>

  </div>

 </div>

 <script>
  document.getElementById('buttonid').addEventListener('click', openDialog);
  function openDialog()
  {
  document.getElementById('fileid').click();
  }
</script>
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
