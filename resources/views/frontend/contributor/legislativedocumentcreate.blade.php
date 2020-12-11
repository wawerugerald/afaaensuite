
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
  </head>
  <body>
    @include('frontend.partials.nav')
 <br>
 <div class="lrd-create" style="padding-left: 20px">
   <h4 class="m-0 font-weight-bold" style="color: #0EA616">LRD Create</h4>
 </div>
 <br>
 <div class="card" style="padding-left: 10px;padding-right: 10px">
   <div class="card-body" style="padding-left: 10px;padding-right: 10px">
       <form role="form" action="{{ url('/storecontributordocument') }}" method="POST">
                  @csrf
                  <input type="hidden" name="countryid" value="{{$id}}"/>
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                       <label>Document Type:</label>
                            <select name="type" class="form-control{{ $errors->has('type') ? ' is-invalid' : '' }}" value="" style="border-color:#0EA616;border-radius: 5px">
                              <option value="1">Primary Legislation</option>
                              <option value="2">Primary Regulation</option>
                              <option value="3">Related Legislation and Regulatory Document</option>
                            </select>

                            @error('type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('type') }}</strong>
                                </span>
                            @enderror
                   </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label>Document Title:</label>
                            <input type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="" placeholder="Document Title:" style="border-color:#0EA616;border-radius: 5px">

                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                            @enderror
                          </div>
                    </div>
                  </div>
                  <div class="row">
                       <div class="col">
                          <div class="form-group">
                            <label>Enactment Date:</label>
                            <input type="date" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" id="date" name="date" value="" placeholder="enactment" style="border-color:#0EA616;border-radius: 5px">
                            @error('date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('date') }}</strong>
                                </span>
                            @enderror
                         </div>
                       </div>
                       <div class="col">
                         <div class="form-group">
                           <label>Upload Document:</label>
                           <input type="file" name="docuploaded" class="form-control" style="border-color:#0EA616;border-radius: 5px">
                         </div>
                       </div>
                  </div>
                  <div class="form-group">
                    <label>Title Text</label>
                      <textarea  class="form-control" name="titletext" placeholder="Title Text:" style="border-color:#0EA616;border-radius: 5px"></textarea><!-- cols="190"  -->
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="form-check-input" value="1" type="checkbox" name="show_option[]">Primary use as default to comparisons:
                      </label>
                    </div>
                  </div>
                    </div>
                    <div class="col">

                    </div>
                  </div>

                     <div class="row">
                       <div class="col">
                          <div class="form-group">
                                <label>Level 1:</label>
                                      <select id='heirachy'name="heirachy1" class="form-control" value="" style="border-color:#0EA616;border-radius: 5px">
                                            <option value="" selected>Choose Document Section</option>
                                            <option value="1">Title</option>
                                            <option value="2">Chapter</option>
                                            <option value="3">Part</option>
                                            <option value="4">Section</option>
                                            <option value="5">Sub Section</option>
                                            <option value="6">Article</option>
                                      </select>
                          </div>
                       </div>
                       <div class="col">
                         <div class="form-group">
                              <label>Level 1 title:</label>
                              <input type="text" name="heirachytitle1" value=""class="form-control" style="border-color:#0EA616;border-radius: 5px"><!-- {{old('title')}}    -->
                         </div>
                       </div>
                       <div class="col">
                          <div class="form-group" >
                            <label>Show Article Number:</label>
                             <select class="form-control" name="heirachy1showarticlenumber" style="border-color:#0EA616;border-radius: 5px">
                              <option value="">Select Option</option>
                              <option value="1">Yes</option>
                              <option value="0">No</option>
                            </select>
                      </div>
                       </div>
                       <div class="col">
                          <div class="form-group" >
                            <label>Enumerator:</label>
                             <select class="form-control" name="heirachy1enumerator" style="border-color:#0EA616;border-radius: 5px">
                              <option value="">Select Option</option>
                              <option value="1">1</option>
                              <option value="A">A</option>
                              <option value="I">I</option>
                              <option value="i">i</option>
                            </select>
                      </div>
                       </div>
                     </div>
                     <div class="row">
                        <div class="col">
                              <div class="form-group">
                                <label>Level 2:</label>
                                      <select name="heirachy2" class="form-control" style="border-color:#0EA616;border-radius: 5px">
                                         <option value="" selected>Choose Document Section</option>
                                        <option value="1">Title</option>
                                        <option value="2">Chapter</option>
                                        <option value="3">Part</option>
                                        <option value="4">Section</option>
                                        <option value="5">Sub Section</option>
                                        <option value="6">Article</option>
                                      </select>
                              </div>
                        </div>
                        <div class="col">
                          <div class="form-group">
                                  <label>Level 2 title:</label>
                                  <input type="text" name="heirachytitle2" value=""class="form-control" style="border-color:#0EA616;border-radius: 5px"><!-- {{old('title')}}    -->
                                </div>
                        </div>
                        <div class="col">
                           <div class="form-group" >
                            <label>Show Article Number:</label>
                             <select class="form-control" name="heirachy2showarticlenumber" style="border-color:#0EA616;border-radius: 5px">
                              <option value="">Select Option</option>
                              <option value="1">Yes</option>
                              <option value="0">No</option>
                            </select>
                      </div>
                        </div>
                        <div class="col">
                           <div class="form-group" >
                            <label>Enumerator:</label>
                             <select class="form-control" name="heirachy2enumerator" style="border-color:#0EA616;border-radius: 5px">
                              <option value="">Select Option</option>
                              <option value="1">1</option>
                              <option value="1.1">1.1</option>
                              <option value="A">A</option>
                              <option value="I">I</option>
                              <option value="i">i</option>
                            </select>
                      </div>
                        </div>
                      </div>
                      <div class="row">
                          <div class="col">
                              <div class="form-group">
                                <label>Level 3:</label>
                                      <select name="heirachy3" class="form-control" style="border-color:#0EA616;border-radius: 5px">
                                        <option value="" selected>Choose Document Section</option>
                                        <option value="1">Title</option>
                                        <option value="2">Chapter</option>
                                        <option value="3">Part</option>
                                        <option value="4">Section</option>
                                        <option value="5">Sub Section</option>
                                        <option value="6">Article</option>
                                      </select>
                              </div>
                          </div>
                          <div class="col">
                              <div class="form-group">
                                      <label>Level 3 title:</label>
                                      <input type="text" name="heirachytitle3" value=""class="form-control" style="border-color:#0EA616;border-radius: 5px"><!-- {{old('title')}}    -->
                                    </div>
                          </div>
                          <div class="col">
                               <div class="form-group" >
                            <label>Show Article Number:</label>
                             <select class="form-control" name="heirachy3showarticlenumber" style="border-color:#0EA616;border-radius: 5px">
                              <option value="">Select Option</option>
                              <option value="1">Yes</option>
                              <option value="0">No</option>
                            </select>
                      </div>
                          </div>
                          <div class="col">
                              <div class="form-group" >
                            <label>Enumerator:</label>
                             <select class="form-control" name="heirachy3enumerator" style="border-color:#0EA616;border-radius: 5px">
                              <option value="">Select Option</option>
                              <option value="1">1</option>
                              <option value="A">A</option>
                              <option value="1.1.1">1.1.1</option>
                              <option value="I">I</option>
                              <option value="i">i</option>
                            </select>
                      </div>
                          </div>
                         </div>
                        <div class="row">
                        <div class="col">
                              <div class="form-group">
                                <label>Level 4:</label>
                                      <select name="heirachy4" class="form-control" style="border-color:#0EA616;border-radius: 5px">
                                        <option value="" selected>Choose Document Section</option>
                                        <option value="1">Title</option>
                                        <option value="2">Chapter</option>
                                        <option value="3">Part</option>
                                        <option value="4">Section</option>
                                        <option value="5">Sub Section</option>
                                        <option value="6">Article</option>
                                      </select>
                              </div>
                        </div>
                        <div class="col">
                             <div class="form-group">
                                  <label>Level 4 title:</label>
                                  <input type="text" name="heirachytitle4" value=""class="form-control" style="border-color:#0EA616;border-radius: 5px"><!-- {{old('title')}}    -->
                             </div>
                        </div>
                        <div class="col">
                             <div class="form-group">
                            <label>Show Article Number:</label>
                             <select class="form-control" name="heirachy4showarticlenumber" style="border-color:#0EA616;border-radius: 5px">
                              <option value="">Select Option</option>
                              <option value="1">Yes</option>
                              <option value="0">No</option>
                            </select>
                      </div>
                        </div>
                        <div class="col">
                             <div class="form-group" >
                            <label>Enumerator:</label>
                             <select class="form-control" name="heirachy4enumerator" style="border-color:#0EA616;border-radius: 5px">
                              <option value="">Select Option</option>
                              <option value="1">1</option>
                              <option value="A">A</option>
                              <option value="I">I</option>
                              <option value="1.1.1.1">1.1.1.1</option>
                              <option value="i">i</option>
                            </select>
                      </div>
                        </div>
                      </div>
                      <div class="row">
                            <div class="col">
                                  <div class="form-group">
                                    <label>Level 5:</label>
                                          <select name="heirachy5" class="form-control" style="border-color:#0EA616;border-radius: 5px">
                                            <option value="" selected>Choose Document Section</option>
                                            <option value="1">Title</option>
                                            <option value="2">Chapter</option>
                                            <option value="3">Part</option>
                                            <option value="4">Section</option>
                                            <option value="5">Sub Section</option>
                                            <option value="6">Article</option>
                                          </select>
                                  </div>
                            </div>
                            <div class="col">
                              <div class="form-group">
                                      <label>Level 5 title:</label>
                                      <input type="text" name="heirachytitle5" value=""class="form-control" style="border-color:#0EA616;border-radius: 5px"><!-- {{old('title')}}    -->
                                    </div>
                            </div>
                            <div class="col">
                                  <div class="form-group" >
                            <label>Show Article Number:</label>
                             <select class="form-control" name="heirachy5showarticlenumber" style="border-color:#0EA616;border-radius: 5px">
                              <option value="">Select Option</option>
                              <option value="1">Yes</option>
                              <option value="0">No</option>
                            </select>
                      </div>
                            </div>
                            <div class="col">
                                    <div class="form-group" >
                            <label>Enumerator:</label>
                             <select class="form-control" name="heirachy5enumerator" style="border-color:#0EA616;border-radius: 5px">
                              <option value="">Select Option</option>
                              <option value="1">1</option>
                              <option value="A">A</option>
                              <option value="I">I</option>
                              <option value="i">i</option>
                              <option value="1.1.1.1.1.1">1.1.1.1.1</option>
                            </select>
                      </div>
                            </div>
                      </div>
                     <div class="row">
                        <div class="col">
                              <div class="form-group">
                                <label>Level 6:</label>
                                      <select name="heirachy6" class="form-control" style="border-color:#0EA616;border-radius: 5px">
                                        <option value="" selected>Choose Document Section</option>
                                        <option value="1">Title</option>
                                        <option value="2">Chapter</option>
                                        <option value="3">Part</option>
                                        <option value="4">Section</option>
                                        <option value="5">Sub Section</option>
                                        <option value="6">Article</option>
                                      </select>
                              </div>
                        </div>
                        <div class="col">
                          <div class="form-group">
                                  <label>Level 6 title:</label>
                                  <input type="text" name="heirachytitle6" value=""class="form-control" style="border-color:#0EA616;border-radius: 5px"><!-- {{old('title')}}    -->
                                </div>
                        </div>
                        <div class="col">
                                  <div class="form-group" >
                            <label>Show Article Number:</label>
                             <select class="form-control" name="heirachy6showarticlenumber" style="border-color:#0EA616;border-radius: 5px">
                              <option value="">Select Option</option>
                              <option value="1">Yes</option>
                              <option value="0">No</option>
                            </select>
                      </div>
                        </div>
                        <div class="col">
                           <div class="form-group" >
                            <label>Enumerator:</label>
                             <select class="form-control" name="heirachy6enumerator" style="border-color:#0EA616;border-radius: 5px">
                              <option value="">Select Option</option>
                              <option value="1">1</option>
                              <option value="A">A</option>
                              <option value="I">I</option>
                              <option value="i">i</option>
                              <option value="1.1.1.1.1.1.1">1.1.1.1.1.1</option>
                            </select>
                      </div>
                        </div>
                    </div>
                    <div class="footer text-center">
                        <!-- <a href="{{ url()->previous() }}" class="btn-lg"  style="background-color: #ca0b00;border-radius: 5px;color: #fff ">Cancel</a> -->
                        <button class="btn  btn-lg " type="button" style="background-color: #ca0b00;border-radius: 5px;color: #fff ">Cancel</button>
                        <button class="btn  btn-lg " type="submit" style="background-color: #0EA616;color:#fff;border-radius: 5px">Create</button>
                    </div>
               </form>
   </div>
 </div>
 <div class="text-center" style="color:#0EA616;background-color: #fff ">
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
  </body>
</html>
