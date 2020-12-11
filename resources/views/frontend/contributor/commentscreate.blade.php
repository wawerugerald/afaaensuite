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
  	<!--to confirm if this is the way.-->
    @include('frontend.partials.nav')<br><br>
       <div class="lrd-create" style="padding-left: 20px">
            <h4 class="m-0 font-weight-bold" style="color: #0EA616">Comments Create</h4>
       </div>
       <div class="card" style="padding-left: 10px;padding-right: 10px">
       	<div class="card-body">
       		<form role="form" action="{{url('/storefeedback')}}" method="POST">
       			@csrf
       			<input type="hidden" name="countryid" value="{{$id}}"/>
       			<div class="form-group">
                       <label>Comment</label>
                       <textarea type="comment" name="comment" class="form-control" value="" style="border-color:#0EA616;border-radius: 5px">
                       	
                       </textarea>                         
                </div>
       		</form>
       	</div>
       </div>            
  </body>
  </html>
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