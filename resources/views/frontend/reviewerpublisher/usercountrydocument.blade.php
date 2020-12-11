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
    <br><br><br><br>
   @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{session('status')}}
    </div>
   @endif 
   <div class="lrd-create" style="padding-left: 35px">
      <h4 class="m-0 font-weight-bold" style="color: #000">{{$country->countryname}}</h4>
   </div><br>
      <div class="row" style="padding-left: 35px;padding-right: 15px">
     <div class="col">
       <div class="card" style="border-color: #0EA616">
         <div class="card-body">
          <form action="" method="">
           <div class="row">
             <div class="col text-center">
               <div class="form-group form-spacing">
                 <div class="container text-left">
                   <img src="{{asset($country->countryimage)}}" style="width: 200px; height: 200px; border-radius: 210%;" class="rounded-circle z-depth-1-half avatar-pic" alt="countryimage">
                 </div>
               </div>
               <!--  <div class="text-left" style="padding-left: 25px">
                 <div class="form-group form-spacing">
                   <a href="/countries-edit/{{$country->countryid}}" class="btn" style="border-color: #0EA616;border-radius: 5px;color: #000">Edit Country Details</a>
                 </div>
               </div> -->
             </div>
             <div class="col">
              <label ><h3 style="color: #000">COUNTRY SUMMARY</h3></label><br>
              <label style="color: #000">Dependancy:</label>&nbsp @if($country->dependancy == 0)<span class="badge " style="background-color: #0000FF ;border-radius: 5px;color: #fff">Low</span>@elseif($country->dependancy == 1)<span class="badge" style="background-color: #e1ad01;border-radius: 5px;color: #fff">Medium</span>@elseif($country->dependancy == 2)<span class="badge" style="background-color: #ca0b00;border-radius: 5px;color: #fff">High</span>@endif

              <label style="color: #000">Eiti Status 2016:</label>&nbsp @if($country->eiti2016 == 0)<span class="badge" style="background-color: #0000FF ;border-radius: 5px;color: #fff">No Status</span>@elseif($country->eiti2016 == 1)<span class="badge" style="background-color: #0000FF ;border-radius: 5px;color: #fff">Yet to be Assessed against 2016 Standard</span>@elseif($country->eiti2016 == 2)<span class="badge" style="background-color: #0EA616 ;border-radius: 5px;color: #fff">Satisfactory</span>@elseif($country->eiti2016 == 3)<span class="badge" style="background-color: #0EA616 ;border-radius: 5px;color: #fff">Meaningful</span>@elseif($country->eiti2016 == 4)<span class="badge" style="background-color: #ca0b00 ;border-radius: 5px;color: #fff">Inadequate</span>@elseif($country->eitistatus == 5)<span class="badge" style="background-color: #ca0b00 ;border-radius: 5px;color: #fff" >Suspended</span>@elseif($country->eitistatus == 6)<span class="badge" style="background-color: #ca0b00 ;border-radius: 5px;color: #fff">Suspended Due To Political Instability</span>@elseif($country->eitistatus == 7)<span class="badge" style="background-color: #ca0b00 ;border-radius: 5px;color: #fff">Suspended For Missing Deadline</span>@endif

              <label style="color: #000">Eiti Status:</label>&nbsp @if($country->eitistatus == 0)<span class="badge" style="background-color: #0000FF ;border-radius: 5px;color: #fff">No Status</span>@elseif($country->eitistatus == 1)<span class="badge" style="background-color: #ca0b00 ;border-radius: 5px;color: #fff">Suspended</span>@elseif($country->eitistatus == 2)<span class="badge" style="background-color: #0EA616 ;border-radius: 5px;color: #fff">Member</span>@endif
               <div class="form-group form-spacing" style="color: #000">
                <p >{!!$country->countrysummary!!}</p>
                 <!-- <textarea class="form-control" rows="10" name="countrysummary"></textarea> -->
               </div>
              
             </div>            
           </div>           
          </form>         
         </div>
       </div>
     </div>
   </div>&nbsp


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
                     <div class="form-group form-spacing">
                       <select class="form-control" style="border-radius: 5px;">
                         <option style="text-align: center;">Choose Status</option>
                       </select>
                     </div>
                     <div class="form-group form-spacing">
                       <select class="form-control" style="border-radius: 5px;text-align: center;">
                         <option >Choose Type</option>
                       </select>
                     </div>
                     <div class="text-center">
                        <button type="submit" class="btn btn-block" style="background-color: #0EA616;border-radius: 5px;color: #fff">Search</button>
                     </div>
                 </div>
              </div><br><br>
              <div class="text-header" style="text-align: center;color: #333333">
                <h4><p>Legislative Documents</p></h4>
              </div>
              <!--BUTTON TO ADD LRD-->
              <!-- <div class="text-center">
                <a class="btn btn-block" href="#" style="background-color: #0EA616;color: #fff;border-radius: 5px"><span class="text">+LRD</span></a>
              </div> --><br><br><br>
              <!--DOCUMENTS CREATED-->
              <div class="text-center">
                <div class="doc-created" style="overflow-y: scroll; height:290px;">
                  @foreach($util as $doc)
                  @if(Auth::user()->roles == 3)
                  <a href="/document-view/{{$doc->heirachyid}}" class="btn btn-block btn-outline" style="border-color: #0EA616;border-radius: 5px">{{$doc->title}}</a>
                  @elseif(Auth::user()->roles == 0)
                  <a href="/reviewerpublisherdocument-view/{{$doc->heirachyid}}" class="btn btn-block btn-outline" style="border-color: #0EA616;border-radius: 5px">{{$doc->title}}</a>
                  @endif
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
                <a class="btn btn-block btn-block-inline" data-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample" style="background-color: #0EA616;color: #fff;border-radius: 5px"><span class="text">FILTER FEEDBACK</span></a>
              </div>
               <div class="collapse" id="collapseExample2">
                <div class="card card-body">
                     <div class="form-group form-spacing">
                       <input class="form-control" type="" name="" style="border-radius: 5px;text-align: center;" placeholder="Name">
                     </div>
                     <div class="form-group form-spacing">
                       <select class="form-control" style="border-radius: 5px;">
                         <option style="text-align: center;">Status</option>
                       </select>
                     </div>
                     <div class="form-group form-spacing">
                       <select class="form-control" style="border-radius: 5px;text-align: center;">
                         <option >Author</option>
                       </select>
                     </div>
                     <div class="text-center">
                        <button type="submit" class="btn btn-block" style="background-color: #0EA616;border-radius: 5px;color: #fff">Search</button>
                     </div>
                 </div>         
              </div><br><br>
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
 <!--   <div class="col">
     <div class="container">
       <div class="card">
         <div class="container">
           <div class="card-body">
             <div class="text-center">
               <h4>My Latest Activities</h4>
             </div><br>

           </div>
         </div>
       </div>
     </div>
   </div> -->
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

  </body>
</html>