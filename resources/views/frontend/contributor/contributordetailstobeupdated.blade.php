 
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
    <br>    
 <div class="container">    
    <div class="card">
        <div class="card-body">            
            <div class="form-group shadow p-3 mb-5 bg-white rounded">
                <label for="name" class="col-md-4 text-left text-black col-form-label label label-primary">Name:</label>
                <input type="text" class="form-control  @error('name') is-invalid @enderror" id="name" name="name" value="{{ $user->name }} " disabled>
            </div>
            <div class="form-group shadow p-3 mb-5 bg-white rounded">
                <label for="email" class="col-md-4 text-left text-black col-form-label label label-primary">Email Address:</label>
                <input type="email" class="form-control  @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}"disabled >
            </div>
            <div class="form-group shadow p-3 mb-5 bg-white rounded">
                <label for="language" class="col-md-4 text-left text-black col-form-label label label-primary">Language:</label>
                    <select class="form-control" id="language" name="language">
                           <option value="0" {{ $user->language == 0 ? 'selected="selected"': '' }}>English</option>
                           <option value="1" {{ $user->language == 1 ? 'selected="selected"': '' }}>Français</option>
                           <option value="2" {{ $user->language == 2 ? 'selected="selected"': '' }}>Portuguese</option>
                    </select>        
            </div>
            <div class="form-group shadow p-3 mb-5 bg-white rounded">
                <label for="gender" class="col-md-4 text-left text-black col-form-label label label-primary">Gender:</label>
                    <select class="form-control" id="gender" name="gender">
                           <option value="1" {{$user->gender == 1?  'selected="selected"': ''}}>Male</option>
                           <option value="0" {{$user->gender == 0?  'selected="selected"': ''}}>Female</option> 
                    </select>        
            </div> 
        </div>               
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
  </body>
</html>

