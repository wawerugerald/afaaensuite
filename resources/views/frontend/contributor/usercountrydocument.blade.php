
 <!DOCTYPE html>
<html lang="en">
  <head>
    <title>ATLAS &mdash; Master Afaa Atlas</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Oswald:400,700|Work+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
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
   @if (session('status'))
    <div class="alert alert-success" role="alert" style="padding-left: 50px;padding-right: 30px;border-color: #0EA616">
        {{session('status')}}
    </div>
   @endif<br>
   <div class="panel-group" id="accordion" style="padding-left: 35px;padding-right: 30px;">
     <div class="panel panel-default">
       <div class="panel-heading" style="border-width:2px">
         <h4 class="panel-title">
           <a style="color: #000">{{$country->countryname}}</a><a>&nbsp&nbsp<img id="myImg" src="{{asset($country->countryimage)}}" data-toggle="modal" data-target="#uploadModal"  style="width: 70px; height: 70px; border-radius: 210%;cursor: pointer;" class="img-thumbnail">&nbsp&nbsp<img id="myImg1" src="{{asset($country->countrymap)}}" data-toggle="modal" data-target="#exampleModal1" class="pointer" style="width: 70px; height: 70px; border-radius: 210%;cursor: pointer" class="img-thumbnail "><span class="text" style="cursor: pointer;position: absolute;right:0;margin-right: 20px"><i class="fas fa-bars" data-toggle="collapse" data-parent="#accordion" href="#collapse1" style="color: #0EA616"></i></span></a></a><!-- <span class="text" style="cursor: pointer;position: absolute;right:9"><i class="fa fa-bars"></i></span> -->
         </h4>
       </div>
               <div id="uploadModal" class="modal fade" role="dialog">
         <div class="modal-dialog">

           <!-- Modal content-->
           <div class="modal-content">
             <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal">&times;</button>
             </div>
             <div class="modal-body">
               <!-- Form -->
               <div style="text-align:center; margin-bottom:20px">
                <img id="myImg1" src="{{asset($country->countryimage)}}" class="pointer text-center" style="width: 300px; height: 300px; cursor: pointer; margin:auto"></div>
               <form method='post' action='' enctype="multipart/form-data">
                 Select file : <input type='file' name='file' id='file' class='form-control' ><br>
                 <input type='button' class='btn btn-info' value='Upload' id='btn_upload'>
               </form>

               <!-- Preview-->
               <div id='preview'></div>
             </div>

           </div>

         </div>
        </div>

       <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <!-- <div class="modal-header text-center">
        <h5 class="modal-title text-center" id="exampleModalLabel">{{$country->countryname}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> -->
      <div class="modal-body text-center" >
        <form>

         <img id="myImg1" src="{{asset($country->countryimage)}}" class="pointer text-center" style="width: 300px; height: 300px; border-radius: 210%;cursor: pointer">
        </form>
      </div>
      <div class="modal-footer text-center">
       <!--  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
        <button type="button" class="btn " style="background-color: #0EA616;color: #fff">Upload Image</button>
      </div>
    </div>
  </div>
</div>
    <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
     <!--  <div class="modal-header text-center">
        <h5 class="modal-title text-center" id="exampleModalLabel">{{$country->countryname}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> -->
      <div class="modal-body text-center" >
        <form>

         <img id="myImg1" src="{{asset($country->countrymap)}}" class="pointer text-center" style="width: 250px; height: 250px; border-radius: 210%;cursor: pointer" >
        </form>
      </div>
      <div class="modal-footer text-center">
       <!--  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
        <button type="button" class="btn " style="background-color: #0EA616;color: #fff">Upload Image</button>
      </div>
    </div>
  </div>
</div>

       <div id="collapse1" class="panel-collapse collapse in">
         <div class="panel-body" style="border-color: border-color: #0EA616">
           <div class="row">
             <div class="col-5 text-left">
               <label ><h4 style="color: #000">Country Summary:</h4></label>&nbsp&nbsp
               <label for="arbitrationinstitution text-left" style="color: #000">Arbitration Institutions:</label>&nbsp @if($country->body == 1)<span class="badge " style="background-color:#28D4CA;border-radius: 5px;color: #fff">Present</span>@elseif($country->body == 0)<span class="badge" style="background-color:#D7DD3C;color: #fff;border-radius: 5px">Not Present</span>@endif &nbsp&nbsp
               <div class="form-group" style="color: #000">
                  <p >{!!$country->countrysummary!!}</p>
               </div>
             </div>
             <div class="col-4 text-left">
             </div>
             <div class="col text-left ">
                <label ><h5 style="color: #000">Arbitration Institution:</h5></label><a href="/countries-edit/{{$country->countryid}}"><span class="text" style="cursor: pointer;position: absolute;right: 0"><i class="fas fa-edit" style="color: #0EA616"></i></span></a><br>
                <div class="form-group" style="color: #000">
                  <p>{!!$country->arbitrationinstitution!!}</p>
                </div>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div><br>
   <!--DISPLAY COUNTRY DOCUMENTS,COMPARISON TEXTS AND LATEST ACTIVITIES-->
   <div class="row" style="padding-left: 20px" >
     <div class="col">
       <div class="container">
        <div class="card" style="border-radius: 5px">
          <div class="container">
            <div class="card-body">
              <!--FILTER BUTTON-->
              <div class="text-center">
                <a class="btn btn-block btn-block-inline" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" style="background-color: #0EA616;color: #fff;border-radius: 5px"><span class="text">FILTER LRD's</span></a>
              </div>
              <div class="collapse" id="collapseExample">
                 <div class="card card-body">
                     <div class="form-group form-spacing">
                       <input class="form-control" type="" name="" style="border-radius: 5px;text-align: center;" placeholder="Name">
                     </div>
                     <div class="row">
                       <div class="col">
                         <div class="form-group form-spacing">
                       <select class="form-control" style="border-radius: 5px;">
                         <option style="text-align: center;">Choose Status</option>
                       </select>
                     </div>
                       </div>
                       <div class="col">
                          <div class="form-group form-spacing">
                       <select class="form-control" style="border-radius: 5px;text-align: center;">
                         <option >Choose Type</option>
                       </select>
                     </div>
                       </div>
                     </div>
                     <div class="text-center">
                        <button type="submit" class="btn btn-block" style="background-color: #0EA616;border-radius: 5px;color: #fff">Search</button>
                     </div>
                 </div>
              </div><br>
              <div class="text-header" style="text-align: center;color: #333333">
                <h4><p>Legislative Documents</p></h4>
              </div>
              <!--BUTTON TO ADD LRD-->
              <div class="text-center">
                <a class="btn btn-block" href="/legistlativedocument-create/{{$id}}" style="background-color: #0EA616;color: #fff;border-radius: 5px"><span class="text">+LRD</span></a>
              </div><br>
              <!--DOCUMENTS CREATED-->
              <div class="text-center">
                <div class="doc-created" style="overflow-y: scroll; height:290px;">
                  @foreach($util as $doc)
                <a href="/document-view/{{$doc->heirachyid}}/{{$country->countryid}}" class="btn btn-block btn-outline" style="border-color: #0EA616;border-radius: 5px">{{$doc->title}}</a>
                @endforeach
                </div>
              </div>
            </div>
          </div>
        </div>
       </div>
     </div>
     <div class="col">
       <div class="container">
         <div class="card" style="border-radius: 5px">
           <div class="container">
             <div class="card-body">
               <div class="text-center">
                <a class="btn btn-block btn-block-inline" data-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="false" aria-controls="collapseExample" style="background-color: #0EA616;color: #fff;border-radius: 5px"><span class="text">FILTER COMPARISON TEXTS</span></a>
              </div>
              <div class="collapse" id="collapseExample1">
                 <div class="card card-body">
                     <div class="form-group form-spacing">
                       <input class="form-control" type="" name="" style="border-radius: 5px;text-align: center;" placeholder="Name">
                     </div>
                     <div class="row">
                       <div class="col">
                         <div class="form-group form-spacing">
                       <select class="form-control" style="border-radius: 5px;">
                         <option style="text-align: center;">Choose Status</option>
                       </select>
                     </div>
                       </div>
                       <div class="col">
                         <div class="form-group form-spacing">
                       <select class="form-control" style="border-radius: 5px;text-align: center;">
                         <option >Choose Type</option>
                       </select>
                     </div>
                       </div>
                     </div>

                     <div class="text-center">
                        <button type="submit" class="btn btn-block" style="background-color: #0EA616;border-radius: 5px;color: #fff">Search</button>
                     </div>
                 </div>
              </div><br>
              <div class="text-header" style="text-align: center;color: #333333">
                <h4><p>Comparison Text</p></h4>
              </div>
                 <div class="text-center">
                <a class="btn btn-block" href="/comparisonadmindocument-create/{{$id}}" style="background-color: #0EA616;color: #fff;border-radius: 5px"><span class="text">+COMPARISON</span></a>
              </div><br>
             </div>
           </div>
         </div>
       </div>
     </div>
     <div class="col">
       <div class="container">
         <div class="card" style="border-radius: 5px">
           <div class="container">
            <div class="card-body">
              <div class="text-center">
                <a class="btn btn-block btn-block-inline" data-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample" style="background-color: #0EA616;color: #fff;border-radius: 5px"><span class="text">FILTER FEEDBACK</span></a>
              </div>
               <div class="collapse" id="collapseExample2">
                <div class="card card-body">
                     <div class="form-group form-spacing">
                       <input class="form-control" type="" name="" style="border-radius: 5px;text-align: center;" placeholder="Name">
                     </div>
                     <div class="row">
                       <div class="col">
                           <div class="form-group form-spacing">
                       <select class="form-control" style="border-radius: 5px;">
                         <option style="text-align: center;">Status</option>
                       </select>
                     </div>
                       </div>
                       <div class="col">
                         <div class="form-group form-spacing">
                       <select class="form-control" style="border-radius: 5px;text-align: center;">
                         <option >Author</option>
                       </select>
                     </div>
                       </div>
                     </div>

                     <div class="text-center">
                        <button type="submit" class="btn btn-block" style="background-color: #0EA616;border-radius: 5px;color: #fff">Search</button>
                     </div>
                 </div>
              </div><br>
              <!--Comments Section-->
              <div class="text-header" style="text-align: center;color: #333333">
                <h4><p>My Feedback</p></h4>
              </div>
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Add Feedback</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                        <form role="form" action="{{ url('/storefeedback') }}" method="POST">
                          @csrf
                          <input type="hidden" name="countryid" value="{{$id}}"/>
                             <div class="form-group">
                                    <textarea type="comment" name="comment" class="form-control" value="" style="border-color:#0EA616;border-radius: 5px"></textarea>
                             </div>
                             <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="border-radius: 5px">Close</button>
                                <button type="submit" class="btn"style="background-color: #0EA616;border-radius: 5px;color: #fff">Save changes</button>
                             </div>
                        </form>
                    </div>
                  </div>
                </div>
              </div>
              <div class="commentssection">
                <div class="comment-created">
                  <div class="image-kadogo">
                    <div class="card-body" style="background-color:#0EA616;color: #fff;border-radius: 5px ">
                      <img class="img-profile rounded-circle" src="" style="width: 30px; height: 30px; border-radius: 40%;">&nbsp
                      <!--I know this will change-->
                    </div>
                  </div>
                </div>
              </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </div>

  <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" data-auto-replace-svg></script>
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
    function myFunction() {
    var x = document.getElementById("myDIV");
    if (x.style.display === "none") {
      x.style.display = "block";
    } else {
      x.style.display = "none";
    }
  }
  </script>
  <script>
$(document).ready(function(){
    // Add minus icon for collapse element which is open by default
    $(".collapse.show").each(function(){
      $(this).prev(".card-header").find(".fa").addClass("fa-minus").removeClass("fa-plus");
    });

    // Toggle plus minus icon on show hide of collapse element
    $(".collapse").on('show.bs.collapse', function(){
      $(this).prev(".card-header").find(".fa").removeClass("fa-plus").addClass("fa-minus");
    }).on('hide.bs.collapse', function(){
      $(this).prev(".card-header").find(".fa").removeClass("fa-minus").addClass("fa-plus");
    });
});
</script>
<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById("myImg");
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}
</script>
<script>
// Get the modal
var modal = document.getElementById("myModal1");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById("myImg1");
var modalImg = document.getElementById("img02");
var captionText = document.getElementById("caption1");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[1];

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}
</script>

<script>
$(document).ready(function(){
  $('#btn_upload').click(function(){

    var fd = new FormData();
    var files = $('#file')[0].files[0];
    fd.append('file',files);

    // AJAX request
    $.ajax({
      url: 'ajaxfile.php',
      type: 'post',
      data: fd,
      contentType: false,
      processData: false,
      success: function(response){
        if(response != 0){
          // Show image preview
          $('#preview').append("<img src='"+response+"' width='100' height='100' style='display: inline-block;'>");
        }else{
          alert('file not uploaded');
        }
      }
    });
  });
});
</script>
  </body>
</html>
