 <!DOCTYPE html>
<html lang="en">
  <head>
    <title>ATLAS &mdash; Master Afaa Atlas</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Oswald:400,700|Work+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('neos/fonts/icomoon/style.css')}}">
    <link rel="stylesheet" href="{{asset('neos/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('neos/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('neos/css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{asset('neos/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('neos/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('neos/css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('neos/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('neos/fonts/flaticon/font/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('neos/css/aos.css')}}">
    <link rel="stylesheet" href="{{asset('neos/css/style.css')}}">
  </head>
  <body>
  @include('frontend.partials.nav')
  <br><br>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <form action="/countries-update/{{$country->countryid}}" method="POST" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="countryid" value="">
          <div class="row">
            <div class="col">
                 <div class="form-group">
                    <span class="d-inline-block text-white btn" style="border-radius: 5px;border-color: #0EA616"><img class="img-profile rounded-circle" src="{{ asset($country->countryimage)}}" style="width: 30px; height: 30px; border-radius: 40%;"></span>
                  </div>
            </div>
            <div class="col text-right">
              <div class="form-group">
                    <span class="d-inline-block text-white btn" style="border-radius: 5px;border-color: #0EA616"><img class="img-profile rounded-circle" src="{{ asset($country->countrymap)}}" style="width: 30px; height: 30px; border-radius: 40%;"></span>
                  </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <div class="form-group">
                    <input id='fileid' type='file' name="countryimage" class="form-control" hidden/>
                    <input id='buttonid' type='button' name="countryimage" class="form-control" value='Upload Country Flag' style="background-color:#0EA616;color: #fff ;border-radius: 5px ; -moz-box-shadow: 0 4px 4px rgba(0, 0, 0, 0.4);
    -webkit-box-shadow: 0 4px 4px rgba(0, 0, 0, 0.4);
    box-shadow: 0 4px 4px rgba(0, 0, 0, 0.4);" />
                  </div>
            </div>
            <div class="col">
              <div class="form-group">
                    <input id='fileidd' type='file' name="countrymap" class="form-control" hidden/>
                    <input id='buttonidd' type='button' name="countrymap" class="form-control" value='Upload Country Map' style="background-color:#0EA616;color: #fff ;border-radius: 5px ; -moz-box-shadow: 0 4px 4px rgba(0, 0, 0, 0.4);
    -webkit-box-shadow: 0 4px 4px rgba(0, 0, 0, 0.4);
    box-shadow: 0 4px 4px rgba(0, 0, 0, 0.4);" />
                  </div>
            </div>
          </div>               
                  <div class="row">
                    <div class="col">
                       <div class="form-group">
                    <label>Official Name</label>
                    <input type="text" name="countryname" value="{{$country->countryname}}"class="form-control" style="border-radius: 5px ; -moz-box-shadow: 0 4px 4px rgba(0, 0, 0, 0.4);
    -webkit-box-shadow: 0 4px 4px rgba(0, 0, 0, 0.4);
    box-shadow: 0 4px 4px rgba(0, 0, 0, 0.4);">                
                  </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                    <label>Common Name</label>
                    <input type="text" name="commonname" value="{{$country->commonname}}" class="form-control" value="" style="border-radius: 5px ; -moz-box-shadow: 0 4px 4px rgba(0, 0, 0, 0.4);
    -webkit-box-shadow: 0 4px 4px rgba(0, 0, 0, 0.4);
    box-shadow: 0 4px 4px rgba(0, 0, 0, 0.4);">                
                  </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <label>Arbitration Institutions:</label>&nbsp&nbsp @if($country->body == 1)<span class="badge" style="background-color:#28D4CA;border-radius: 5px;color: #fff">Present</span>@elseif($country->body == 0)<span class="badge" style="background-color:#D7DD3C;color: #fff;border-radius: 5px ">Not Present</span>@endif
                        <select name="arbitration_institution" class="form-control" style="border-radius: 5px ; -moz-box-shadow: 0 4px 4px rgba(0, 0, 0, 0.4);
    -webkit-box-shadow: 0 4px 4px rgba(0, 0, 0, 0.4);
    box-shadow: 0 4px 4px rgba(0, 0, 0, 0.4);">
                           <option value="">Select Institution</option>  
                           <option value="0" {{$country->body == 0? 'selected="selected"':''}}>Not Present</option>
                           <option value="1" {{$country->body == 1? 'selected="selected"':''}}>Present</option>                         
                        </select>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label>Arbitration Compliance:</label>
                        <div class="form-check" class="form-control">
                          <ul class="checkbox-grid">
                            <li><input type="checkbox" name="compliance[]" value="0" checked /><label for="text1">&nbsp NYC</label></li>
                            <li><input type="checkbox" name="compliance[]" value="1" checked /><label for="text2">&nbsp ICSID</label></li>
                            <li><input type="checkbox" name="compliance[]" value="2" /><label for="text3">&nbsp OHADA</label></li>  
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>                                                                       
                  <div class="form-group" hidden>                   
                    <label>Eiti Status</label>&nbsp @if($country->eitistatus == 0)<span class="badge" style="background-color: #0000FF ;border-radius: 5px;color: #fff">No Status</span>@elseif($country->eitistatus == 1)<span class="badge" style="background-color: #ca0b00 ;border-radius: 5px;color: #fff">Suspended</span>@elseif($country->eitistatus == 2)<span class="badge" style="background-color: #0EA616 ;border-radius: 5px;color: #fff">Member</span>@endif
                    <select name="eitistatus"  class="form-control" value="" style="border-color:#0EA616;border-radius: 5px">
                      <option value="">Select Status</option>
                      <option value="0">No Status</option>
                      <option value="1">Suspended</option>
                      <option value="2">Member</option>                    
                    </select>                
                  </div>    
                  <div class="form-group" hidden>                   
                    <label>Eiti Status 2016</label>&nbsp @if($country->eiti2016 == 0)<span class="badge" style="background-color: #0000FF ;border-radius: 5px;color: #fff">No Status</span>@elseif($country->eiti2016 == 1)<span class="badge" style="background-color: #0000FF ;border-radius: 5px;color: #fff">Yet to be Assessed against 2016 Standard</span>@elseif($country->eiti2016 == 2)<span class="badge" style="background-color: #0EA616 ;border-radius: 5px;color: #fff">Satisfactory</span>@elseif($country->eiti2016 == 3)<span class="badge" style="background-color: #0EA616 ;border-radius: 5px;color: #fff">Meaningful</span>@elseif($country->eiti2016 == 4)<span class="badge" style="background-color: #ca0b00 ;border-radius: 5px;color: #fff">Inadequate</span>@elseif($country->eitistatus == 5)<span class="badge" style="background-color: #ca0b00 ;border-radius: 5px;color: #fff" >Suspended</span>@elseif($country->eitistatus == 6)<span class="badge" style="background-color: #ca0b00 ;border-radius: 5px;color: #fff">Suspended Due To Political Instability</span>@elseif($country->eitistatus == 7)<span class="badge" style="background-color: #ca0b00 ;border-radius: 5px;color: #fff">Suspended For Missing Deadline</span>@endif
                    <select name="eiti2016" class="form-control" value="" style="border-color:#0EA616;border-radius: 5px">
                      <option value="">Select Status 2016</option>
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
                  <div class="form-group" hidden>
                    <label>Dependancy</label>&nbsp @if($country->dependancy == 0)<span class="badge " style="background-color: #0000FF ;border-radius: 5px;color: #fff">Low</span>@elseif($country->dependancy == 1)<span class="badge" style="background-color: #e1ad01;border-radius: 5px;color: #fff">Medium</span>@elseif($country->dependancy == 2)<span class="badge" style="background-color: #ca0b00;border-radius: 5px;color: #fff">High</span>@endif
                    <select name="dependancy" class="form-control" value="" style="border-color:#0EA616;border-radius: 5px">
                      <option value="">Select Dependancy</option>
                      <option value="0">Low</option>
                      <option value="1">Medium</option>
                      <option value="2">High</option>                    
                    </select>                
                  </div>              
                  <div class="row">
                    <div class="col">
                       <div class="form-group">
                         <label>Country Summary:</label>                     
                           <textarea id="editor" name="countrysummary"class="form-control" rows="15" value="" style="border-color:#0EA616;border-radius: 5px">
                            {{$country->countrysummary}}
                           </textarea>
                       </div>
                    </div>
                    <div class="col">
                      <label>Institution Details</label>
                     <div class="form-group">
                       <input type="text" name="institutionname" class="form-control" placeholder="Institution Name" value="{{ !is_null($country->institution) ? $country->institution->institutionname : ' ' }}" style="border-radius: 5px ; -moz-box-shadow: 0 4px 4px rgba(0, 0, 0, 0.4);
    -webkit-box-shadow: 0 4px 4px rgba(0, 0, 0, 0.4);
    box-shadow: 0 4px 4px rgba(0, 0, 0, 0.4);">
                     </div>
                     <div class="form-group">
                      <textarea class="form-control" placeholder="Physical Address" name="Institutionaddress" style="border-radius: 5px ; -moz-box-shadow: 0 4px 4px rgba(0, 0, 0, 0.4);
    -webkit-box-shadow: 0 4px 4px rgba(0, 0, 0, 0.4);
    box-shadow: 0 4px 4px rgba(0, 0, 0, 0.4);">{{!is_null($country->institution) ? $country->institution->institutionadd : ' '}}</textarea>
                     </div>
                     <div class="form-group">
                       <input type="text" name="institutionpostaladdress" class="form-control" placeholder="Institution P.O.BOX" value="{{!is_null($country->institution) ? $country->institution->institutionpost : ' '}}" style="border-radius: 5px ; -moz-box-shadow: 0 4px 4px rgba(0, 0, 0, 0.4);
    -webkit-box-shadow: 0 4px 4px rgba(0, 0, 0, 0.4);
    box-shadow: 0 4px 4px rgba(0, 0, 0, 0.4);">
                     </div>
                     <div class="form-group">
                       <input type="text" name="institutioncontactno" class="form-control" placeholder="Institution Contact No:" value="{{!is_null($country->institution) ? $country->institution-> institutionno : ' '}}" style="border-radius: 5px ; -moz-box-shadow: 0 4px 4px rgba(0, 0, 0, 0.4);
    -webkit-box-shadow: 0 4px 4px rgba(0, 0, 0, 0.4);
    box-shadow: 0 4px 4px rgba(0, 0, 0, 0.4);">
                     </div>
                     <div class="form-group">
                       <input type="text" name="institutionemail" class="form-control" placeholder="Institution Email" value="" style="border-radius: 5px ; -moz-box-shadow: 0 4px 4px rgba(0, 0, 0, 0.4);
    -webkit-box-shadow: 0 4px 4px rgba(0, 0, 0, 0.4);
    box-shadow: 0 4px 4px rgba(0, 0, 0, 0.4);">
                     </div>
                     <div class="form-group">
                       <input type="text" name="institutionweb" class="form-control" placeholder="Institution Website" value="{{!is_null($country->institution) ? $country->institution->institutionweb : ' '}}" style="border-radius: 5px ; -moz-box-shadow: 0 4px 4px rgba(0, 0, 0, 0.4);
    -webkit-box-shadow: 0 4px 4px rgba(0, 0, 0, 0.4);
    box-shadow: 0 4px 4px rgba(0, 0, 0, 0.4);">
                     </div>
                    </div>
                  </div>   
                  <div class="text-center">
                    <button type="submit" class="btn-lg" style="background-color: #0EA616;border-radius: 5px;color: #fff">Update</button>
                    <a href="{{url()->previous()}}" class="btn btn btn-outline-warning btn-lg" style="background-color: #ca0b00;border-radius: 5px;color: #fff ">Cancel</a>
                    <!-- <a href="{{ url()->previous() }}" class="btn-lg"  style="background-color: #ca0b00;border-radius: 5px;color: #fff ">Cancel</a> -->
                    <!-- <a href="#" class="btn-lg" style="background-color: #ca0b00;border-radius: 5px;color: #fff">Cancel</a> -->
                  </div>                  
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- <script>
  document.getElementById('buttonid').addEventListener('click', openDialog);
  function openDialog() {
  document.getElementById('fileid').click();
}
</script>  -->
<!--tiny mce edit scripts-->
<style>
  .checkbox-grid li {
  display: block;
  float: left;
  width: 25%;
}
</style>
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
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
tinymce.init({
selector: 'textarea#editor',
menubar: false
});
</script> 
<script>
tinymce.init({
selector: 'textarea#editor1',
plugins: 'link',
menubar: 'insert',
toolbar: 'link'
// menubar: false
});
</script>
<script src="{{asset('neos/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('neos/js/jquery-migrate-3.0.1.min.js')}}"></script>
<script src="{{asset('neos/js/jquery-ui.js')}}"></script>
<script src="{{asset('neos/js/popper.min.js')}}"></script>
<script src="{{asset('neos/js/bootstrap.min.js')}}"></script>
<script src="{{asset('neos/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('neos/js/jquery.stellar.min.js')}}"></script>
<script src="{{asset('neos/js/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('neos/js/jquery.animateNumber.min.js')}}"></script>
<script src="{{asset('neos/js/aos.js')}}"></script>
<script src="{{asset('neos/js/main.js')}}"></script>
</body>
</html>