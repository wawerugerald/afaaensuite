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
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
  </head>
  <body>
    @include('frontend.partials.nav')
    <div class="dashboard-name">
      <h3><strong>Welcome:&nbsp&nbsp{{Auth::user()->name}}</strong></h3>
    </div>
    @include('includes.frontend.usercountriesselected')

    <div class="text-center" style="color:#0EA616 ">
      @include('frontend.partials.footer')
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
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
 
  </body>
  </html>
