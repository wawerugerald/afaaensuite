
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
    <div class="lrd-create" style="padding-left: 20px">
         <h4 class="m-0 font-weight-bold" style="color: #0EA616">Comparison Create</h4>
    </div>
     <br>
     <div class="card" style="padding-left: 10px;padding-right: 10px">
       <div class="card-body" style="padding-left: 10px;padding-right: 10px">
         <form method="POST" action="/storecomparisonadmindocument" id="myForm">
          @csrf          

                <div class="form-group form-spacing">
                  <label>Topic</label>
                    <select name="topics" class="form-control" value="" style="border-color:#0EA616;border-radius: 5px">
                      @foreach($comparisonadmindocument as $comparisonadmindocuments)
                      <option value="{{$comparisonadmindocuments->ID}}">{{$comparisonadmindocuments->fullname}}</option>
                      @endforeach
                    </select>
                </div>
                <div class="form-group form-spacing">
                  <label>Acts</label>                         
                    <select name="acts" class="form-control" value="" id="titleselector" style="border-color:#0EA616;border-radius: 5px">
                      <option value="">Select Act</option>
                     @foreach($doctypeselected as $doctypeselecteds)
                      <option value="{{$doctypeselecteds->heirachyid}}">{{$doctypeselecteds->title}}</option>
                     @endforeach 
                    </select>
                </div>  
                <div class="form-group form-spacing">
                  <label>Chapter</label>                        
                    <select name="chapter" class="form-control" value="" id="chapterselector"style="border-color:#0EA616;border-radius: 5px">                        
                      <option value="">Select Chapter</option>                                    
                    </select>
                </div>
                <div class="form-group form-spacing">
                  <label>Act Section</label>
                    <select name="section" class="form-control" value="" id="sectionselector" style="border-color:#0EA616;border-radius: 5px">
                      <option value="">Select Section</option>
                    </select>
                </div>
                <div class="form-group form-spacing">
                  <label>Comparison info</label>
                    <textarea id="editor" name="editor" class="form-control" rows="20" value="" style="border-color:#0EA616;border-radius: 5px"></textarea>
                </div>
                <div class="text-right">
                    <a href="{{ url()->previous() }}" class="btn-lg"  style="background-color: #ca0b00;border-radius: 5px;color: #fff ">Cancel</a>
                    <button type="submit" class="btn-lg pull-right" type="submit" style="background-color: #0EA616;color:#fff;border-radius: 5px" >Create</button>
                </div>             
         </form>
       </div>
     </div>   
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
  <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script>
  tinymce.init({
    selector: 'textarea#editor',
    menubar: true
  });
</script>
<script>
$(document).ready(function()
{


    $('#titleselector').on('change', function()
     {      
      var id=this.value;
      var url = "{{url('/comparisondocumentparts')}}"+'/'+id;
      var url2 = "{{url('/comparisondocumentsections')}}"+'/'+id;
        
      $.ajax({
            url: url,
            type: 'GET',
            success: function(res) 
            {
                //chapter selector
                console.log(res);            
                var $el = $("#chapterselector");
                $el.empty(); // remove old options
                $.each(res, function(key,value) 
                {
                $el.append($("<option></option>")
                .attr("value",value.chapterid).text(value.chaptername));
                });

            }
         });



     });



});
</script>  
</body>
</html>
