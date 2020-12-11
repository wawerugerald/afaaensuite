<!DOCTYPE html>
<html lang="en">
<head>
<title>ATLAS &mdash; Master Afaa Atlas</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link href="https://fonts.googleapis.com/css?family=Oswald:400,700|Work+Sans:300,400,700" rel="stylesheet">
<link rel="stylesheet" href="path/to/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="{{asset('css/allmaps.css')}}">
<link rel="stylesheet" href="{{asset('css/mystyle.css')}}">
<link rel="stylesheet" href="{{asset('css/screen.css')}}">
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
<link rel="stylesheet" href="{{asset('neos/css/main.css')}}">
 <style>
    .highcharts-legend, .highcharts-credits {
        display: none !important;
    }
</style>
</head>
  <body>
    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu --> 
    <div class="site-navbar-wrap js-site-navbar bg-white" style="padding-left: 20px">
      @include('frontend.partials.nav')
    </div><br><br>
   <div class="row">
     <div class="col-5">
      <div class="row">
        <div class="col">
          <div class="card text-center cardpill" id="present" style=" border-radius: 3px;font-family: Nunito;font-size: 16px;">
              <div class="card-header">
                Present
              </div>
              <div class="card-body" style="background-color: #28D4CA;border-radius: 3px;">              
              
              </div>
            </div>
        </div>
        <div class="col">
           <div class="card text-center cardpill" id="notpresent" style=" border-radius: 3px;font-family: Nunito;font-size: 16px;" ; >
              <div class="card-header">
               Not Present
              </div>
              <div class="card-body" style="background-color: #D7DD3C;border-radius: 3px;">              
              
              </div>
            </div>
        </div>
      </div>
       <div class="row">
         <div class="col">
             <div class="card text-center cardpill" id="nyc" style=" border-radius: 3px; font-family: Nunito;font-size: 16px;">
              <div class="card-header">
                NYC
              </div>
              <div class="card-body" style="background-color: #6933E9;border-radius: 3px;">              
              
              </div>
            </div>
         </div>
           <div class="col ">
            <div class="card text-center cardpill" id="icsid"style=" border-radius: 3px;font-family: Nunito;font-size: 16px;">
              <div class="card-header">
                ICSID
              </div>
              <div class="card-body" style="background-color: #32ABDF;border-radius: 3px;">              
              
              </div>
            </div>
           </div>
         <div class="col">
             <div class="card text-center cardpill" id="ohada"style=" border-radius: 3px;font-family: Nunito;font-size: 16px;">
              <div class="card-header">
                OHADA
              </div>
              <div class="card-body" style="background-color: #2C3C8E;border-radius: 3px;">              
              
              </div>
            </div>
         </div>
       </div>
     </div>
     <div class="col-7">
       <div id="container">
         
       </div>
     </div>
   </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://code.highcharts.com/maps/highmaps.js"></script>
<script src="https://code.highcharts.com/mapdata/custom/africa.js"></script>
<script src="{{asset('neos/js/main.js')}}"></script>
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
<script>
        var data = [
            
            @foreach($data as  $key=>$value)
            ['{{$key}}','{{ $value}}'],
            @endforeach
        ];
        var data2 = [...data];

        // Create the chart


        $(document).ready(function () {

            var maps = Highcharts.mapChart('container', {
                chart: {
                    map: 'custom/africa',
                    width: 1000,
                    height: 700,
                    backgroundColor: "rgba(0,0,0,0)",
                    events: {
                        load: function() {
                            console.log('loaded')
                        }
                    }
                },

                title: {
                    text: ''
                },

                subtitle: {
                    text: ''
                },

                mapNavigation: {
                    enabled: false,
                    buttonOptions: {
                        verticalAlign: 'bottom'
                    }
                },

                colorAxis: {
                    min: 0
                },

                series: [{
                    data: data.map(elem => {
                        elem.push('white');
                        return elem;
                    }),
                    keys: ['hc-key', 'value', 'color'],
                    borderWidth: '1px',
                    borderColor: '#000000',
                    name: '',
                    states: {
                        hover: {
                            color: '#CEA01A'
                        }
                    },
                    dataLabels: {
                        enabled: false,
                        format: '{point.name}'
                    }
                }],

                plotOptions: {
                    series: {
                        point: {
                            events: {
                                click: function () {
                                    location.href = '{{ url("/country") }}'+'/' + this.name;
                                }
                            }
                        }
                    }
                },
            });

             $('#nyc').on('mouseenter',function (e) {
                
                 $.ajax({
                         url: '{{url("/compliance/0") }}',
                         type: 'GET',
                         success: function(res)
                         {
                            var list = res;

                             var localdata = JSON.parse( JSON.stringify( data ) );
                              $.each(localdata,function (key,value) {
                                  if (list.includes(value[0]))
                                  {
                                      value[2] = '#6933E9';
                                  }
                              });
                              //alert(data);
                              maps.series[0].setData(localdata);
                         }
                     });
                
            });


             $('#icsid').on('mouseenter',function (e) {
                
                 $.ajax({
                         url: '{{url("/compliance/1") }}',
                         type: 'GET',
                         success: function(res)
                         {
                            var list = res;

                             var localdata = JSON.parse( JSON.stringify( data ) );
                              $.each(localdata,function (key,value) {
                                  if (list.includes(value[0]))
                                  {
                                      value[2] = '#32ABDF';
                                  }
                              });
                              //alert(data);
                              maps.series[0].setData(localdata);
                         }
                     });
                
            });

             $('.cardpill').on('mouseout',function (e) {
                $.each(data2,function (key,value) {
                    value[2] = 'white';
                });
                maps.series[0].setData(data2);
            });


             $('#ohada').on('mouseenter',function (e) {
                
                 $.ajax({
                         url: '{{url("/compliance/2") }}',
                         type: 'GET',
                         success: function(res)
                         {
                            var list = res;

                             var localdata = JSON.parse( JSON.stringify( data ) );
                              $.each(localdata,function (key,value) {
                                  if (list.includes(value[0]))
                                  {
                                      value[2] = '#2C3C8E';
                                  }
                              });
                              //alert(data);
                              maps.series[0].setData(localdata);
                         }
                     });
                
            });


             $('#present').on('mouseenter',function (e) {
                
                 $.ajax({
                         url: '{{url("/present/1") }}',
                         type: 'GET',
                         success: function(res)
                         {
                            var list = res;

                             var localdata = JSON.parse( JSON.stringify( data ) );
                              $.each(localdata,function (key,value) {
                                  if (list.includes(value[0]))
                                  {
                                      value[2] = '#28D4CA';
                                  }
                              });
                              //alert(data);
                              maps.series[0].setData(localdata);
                         }
                     });
                
            });

               $('#notpresent').on('mouseenter',function (e) {
                
                 $.ajax({
                         url: '{{url("/present/0") }}',
                         type: 'GET',
                         success: function(res)
                         {
                            var list = res;

                             var localdata = JSON.parse( JSON.stringify( data ) );
                              $.each(localdata,function (key,value) {
                                  if (list.includes(value[0]))
                                  {
                                      value[2] = '#D7DD3C';
                                  }
                              });
                              //alert(data);
                              maps.series[0].setData(localdata);
                         }
                     });
                
            });


});

       
    </script>
</body>
</html>