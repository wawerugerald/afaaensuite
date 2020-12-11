<!DOCTYPE html>
<html lang="en">
  <head>
    <title>ATLAS &mdash; Master Afaa Atlas</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
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
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('neos/css/style.css')}}">
  </head>
  <body>
     @include('frontend.partials.nav')
     <br>
    <!--  <div class="row" style="margin-left:20px">
    <a href="{{ url()->previous() }}" style="color:#858796" >
        <h3><span class="text">Country Documents</span> </a> &nbsp; | &nbsp;
        <span class="text">Kenya Arbitration</span> </a>&nbsp;</h3>
    </div><br> -->
     <!--Kusetup breadcrumbs-->
     @php  $titles =\App\Title::where('heirachyid','=',$docs->heirachyid)->get(); @endphp

        <div class="row"style="padding-left: 20px">
          <div class="col-2">
           @if($docs->heirachy1)
           <button class="btn-lg btn-block" onclick="myFunction()" style="background-color: #0EA616;color: #fff;border-radius: 5px;border: none !important;">{{$docs->heirachytitle1}}</button>
           @endif
         </div>
         <div class="col-2">
          @if($docs->heirachy2)
          @if(count($titles) <= 0)
            <button class="btn-lg btn-block" onclick="myFunction1()" style="background-color: #0EA616;color: #fff;border-radius: 5px;border: none;" disabled title="Please add a title first">{{$docs->heirachytitle2}}</button>
          @else
          <button class="btn-lg btn-block" onclick="myFunction1()" style="background-color: #0EA616;color: #fff;border-radius: 5px;border: none;" >{{$docs->heirachytitle2}}</button>
          @endif
          @endif
         </div>
         <div class="col-2">
          @if($docs->heirachy3)
              @if(count($titles) <= 0)
           <button class="btn-lg btn-block" onclick="myFunction2()" style="background-color: #0EA616;color: #fff;border-radius: 5px;border: none;" disabled title="Please add a title first">{{$docs->heirachytitle3}}</button>
           @else
             <button class="btn-lg btn-block" onclick="myFunction2()" style="background-color: #0EA616;color: #fff;border-radius: 5px;border: none;">{{$docs->heirachytitle3}}</button>
           @endif

          @endif
         </div>
         <div class="col-2">
              @if($docs->heirachy4)
                @if(count($titles) <= 0)
                 <button class="btn-lg btn-block" onclick="myFunction3()" style="background-color: #0EA616;color: #fff;border-radius: 5px;border: none;" disabled title="Please add a title first">{{$docs->heirachytitle4}}</button>
                @else
              <button class="btn-lg btn-block" onclick="myFunction3()" style="background-color: #0EA616;color: #fff;border-radius: 5px;border: none;">{{$docs->heirachytitle4}}</button>
              @endif
              <!-- <span class="btn  btn-sm" onclick="myFunction3()" style="background-color: #0EA616;color: #fff;border-radius: 5px">Add&nbsp{{$docs->heirachytitle4}}</span> -->
              @endif
         </div>
         <div class="col-2">
            @if($docs->heirachy5)
            @if(count($titles) <= 0)
            <button class="btn-lg btn-block" onclick="myFunction4()" style="background-color: #0EA616;color: #fff;border-radius: 5px;border: none;" disabled title="Please add a title first">{{$docs->heirachytitle5}}</button>
           @else
            <button class="btn-lg btn-block" onclick="myFunction4()" style="background-color: #0EA616;color: #fff;border-radius: 5px;border: none;">{{$docs->heirachytitle5}}</button>
            @endif

             <!-- <span class="btn btn-sm" onclick="myFunction4()" style="background-color: #0EA616;color: #fff;border-radius: 5px">Add&nbsp{{$docs->heirachytitle5}}</span> -->
             @endif
         </div>
         <div class="col">
            @if($docs->heirachy6)
               @if(count($titles) <= 0)
            <button class="btn-lg btn-block" onclick="myFunction5()" style="background-color: #0EA616;color: #fff;border-radius: 5px;border: none;"  disabled title="Please add a title first">{{$docs->heirachytitle6}}</button>

            @else
                 <button class="btn-lg btn-block" onclick="myFunction5()" style="background-color: #0EA616;color: #fff;border-radius: 5px;border: none;">{{$docs->heirachytitle6}}</button>
            @endif
           <!-- <span class="btn  btn-sm" onclick="myFunction5()" style="background-color: #0EA616;color: #fff;border-radius: 5px">Add&nbsp{{$docs->heirachytitle6}}</span> -->
           @endif
        </div>
        <!-- <div class="col-sm"> -->
          <!-- <a href="#"><span class="text" style="cursor: pointer;position: absolute;right: 0"><i class="fas fa-edit" style="color: #0EA616"></i></span></a> -->
         <!--  <div class="form-group form-spacing">
            <a href="#" class="btn-lg btn-outline" style="background-color: #0EA616;color: #fff;border-radius: 5px">Edit Heirachy</a>
          </div>
        </div> -->
</div><br>
<div class="row" style="padding-left: 20px">
 <div class="col">
<div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Table of Contents</h3>
                    <ul class="list-inline panel-actions">
                        <li><a href="#" id="panel-fullscreen3" role="button" title="Toggle fullscreen"><i class="glyphicon glyphicon-resize-full"></i></a></li>
                    </ul>
                </div>
                <div class="panel-body" style="overflow-y: scroll;height:380px">
                       <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default">
                  @foreach($docs->titles as $title)
                   <div class="panel-heading" role="tab" id="headingOne">
                      <h4 class="panel-title" style="border-color: #0EA616;font-family: Nunito">
                         <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            @if($docs->showheirachy1 == 1) {{$docs->enumeratorheirachy1}}@endif {{$title->titlename}}
                         </a>
                      </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                        <div class="panel-body">
                         <ul style="border-color: #0EA616;font-family: Nunito; margin-left: -34px">
                            @foreach($title->chapters as $chapter)
                            <p>@if($docs->showheirachy2 == 1) {{$docs->enumeratorheirachy2}}@endif {{$chapter->chaptername}}</p>
                            @endforeach
                             <ul style="border-color: #0EA616;font-family: Nunito; margin-left: -32px">
                               @foreach($title->parts as $part)
                               <p>@if($docs->showheirachy3 == 1) {{$docs->enumeratorheirachy3}}@endif {{$part->partname}}</p>
                               @endforeach
                                <ul style="border-color: #0EA616;font-family: Nunito; margin-left: -30px">
                                  @foreach($title->sections as $section)
                                  <p>@if($docs->showheirachy4 == 1) {{$docs->enumeratorheirachy4}}@endif {{$section->sectionname}}</p>
                                  @endforeach
                                   <ul style="border-color: #0EA616;font-family: Nunito; margin-left: -28px">
                                     @foreach($title->subsections as $subsection)
                                     <p>@if($docs->showheirachy5 == 1) {{$docs->enumeratorheirachy5}}@endif {{$subsection->subsectionname}}</p>
                                     @endforeach
                                      <ul style="border-color: #0EA616;font-family: Nunito; margin-left: -26px">
                                        @foreach($title->articles as $article)
                                        <p>@if($docs->showheirachy6 == 1) {{$docs->enumeratorheirachy6}}@endif {{$article->articlename}}</p>
                                        @endforeach
                                      </ul>
                                   </ul>
                                </ul>
                             </ul>
                         </ul>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
                </div>
            </div>
 </div>
 <div class="col">
     <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Edit Article</h3>
                    <ul class="list-inline panel-actions">
                        <li><a href="#" id="panel-fullscreen" role="button" title="Toggle fullscreen"><i class="glyphicon glyphicon-resize-full"></i></a></li>
                    </ul>
                </div>
                <div class="panel-body">
                @if($docs->heirachy1)
                 <div id="myDIV" style="display: none;">
                     <form method="POST" action="/title-store" id="form1">
                         @csrf
                         <input type="hidden" name="docid" value="{{$docs->heirachyid}}"/>
                         <input type="hidden" name="countryid" value="{{$countryid}}"/>
                         <div class="form-group ter" style="padding-left: 10px">
                          <input type="text" class="titlename form-control" name="titlename" value="" placeholder="{{$docs->heirachytitle1}}" style="width:210px;border-color:#0EA616;border-radius: 5px">
                         </div>&nbsp
                         <div class="text-left" style="padding-left: 10px">
                          <button type="submit" class="btn btn-lg" style="background-color:#0EA616;color:#fff;border-radius:5px">Save changes</button>
                         </div>
                     </form>
                  </div>
                @endif
                @if($docs->heirachy2)
                  <div id="myDIV1" style="display: none">
                    <form method="POST" action="/chapter-store" id="form2">
                      @csrf
                      <input type="hidden" name="docid" value="{{$docs->heirachyid}}"/>
                       <input type="hidden" name="countryid" value="{{$countryid}}"/>
                      @php  $titles =\App\Title::where('heirachyid','=',$docs->heirachyid)->get(); @endphp
                      @if(empty($titles))
                      <p> No Title</p>
                      @else
                      <div class="form-group" style="padding-left: 10px">
                        <select name="title" class="form-control" style="width:210px;border-color:#0EA616;border-radius: 5px">
                          @foreach($titles as $title)
                          <option value="{{$title->id}}">{{$title->titlename}}</option>
                          @endforeach
                        </select>
                        @endif
                      </div>
                      <div class="form-group" style="padding-left: 10px">
                        <input type="text" class="form-control" name="chaptername" value="" placeholder="{{$docs->heirachytitle2}}" style="width:210px;border-color:#0EA616;border-radius: 5px">
                      </div>&nbsp
                      <div class="text-left" style="padding-left: 10px">
                        <button type="submit" class="btn btn-lg" style="background-color:#0EA616;color:#fff;border-radius:5px">Save changes</button>
                      </div>
                    </form>
                  </div>
            @endif
            @if($docs->heirachy3)
              <div id="myDIV2" style="display: none;">
                <form method="POST" action="/part-store" id=form3>
                  @csrf
                  <input type="hidden" name="docid" value="{{$docs->heirachyid}}"/>
                   <input type="hidden" name="countryid" value="{{$countryid}}"/>
                  @php  $titles =\App\Title::where('heirachyid','=',$docs->heirachyid)->get(); @endphp
                  @php  $chapters =\App\Chapter::where('heirachyid','=',$docs->heirachyid)->get(); @endphp
                  @if(empty($titles))
                  <p>No Title</p>
                  @else
                  <div class="form-group" style="padding-left: 10px">
                    <select name="title" class="form-control" style="width:210px;border-color:#0EA616;border-radius: 5px">
                      @foreach($titles as $title)
                      <option value="{{$title->id}}">{{$title->titlename}}</option>
                      @endforeach
                    </select>
                  </div>
                  @endif
                  @if(empty($chapters))
                  <p>No Chapter</p>
                  @else
                  <div class="form-group" style="padding-left: 10px">
                    <select name="chapter" class="form-control" style="width:210px;border-color:#0EA616;border-radius: 5px">
                      @foreach($chapters as $chapter)
                      <option value="{{$chapter->chapterid}}">{{$chapter->chaptername}}</option>
                      @endforeach
                    </select>
                  </div>
                  @endif
                  <div class="form-group" style="padding-left: 10px">
                    <input type="text" class="form-control" name="partname" value="" placeholder="{{$docs->heirachytitle3}}" style="width:210px;border-color:#0EA616;border-radius: 5px">
                  </div>
                  <div class="form-group" style="padding-left: 10px">
                    <!-- <textarea class="form-control" name="parttext" placeholder="Part Text"></textarea> -->
                  </div>&nbsp
                  <div class="text-left" style="padding-left: 10px">
                    <button type="submit" class="btn btn-lg" style="background-color:#0EA616;color:#fff;border-radius:5px">Save changes</button>
                  </div>
                </form>
              </div>
             @endif
             @if($docs->heirachy4)
             <div id="myDIV3" style="display: none;">
              <form method="POST" action="/section-store" id="form4">
                @csrf
                <input type="hidden" name="docid" value="{{$docs->heirachyid}}"/>
                 <input type="hidden" name="countryid" value="{{$countryid}}"/>
                @php  $titles =\App\Title::where('heirachyid','=',$docs->heirachyid)->get(); @endphp
                @php  $chapters =\App\Chapter::where('heirachyid','=',$docs->heirachyid)->get(); @endphp
                @php  $parts =\App\Part::where('heirachyid','=',$docs->heirachyid)->get(); @endphp
                @if(empty($titles))
                <p>No Title</p>
                @else
                 <div class="form-group" style="padding-left: 10px">
                    <select name="title" class="form-control" style="width:210px;border-color:#0EA616;border-radius: 5px">
                      @foreach($titles as $title)
                      <option value="{{$title->id}}">{{$title->titlename}}</option>
                      @endforeach
                    </select>
                  </div>
                @endif
                @if(empty($chapters))
                <p>No Chapter</p>
                @else
                <div class="form-group" style="padding-left: 10px">
                  <select name="chapter" class="form-control" style="width:210px;border-color:#0EA616;border-radius: 5px">
                    @foreach($chapters as $chapter)
                    <option value="{{$chapter->chapterid}}">{{$chapter->chaptername}}</option>
                    @endforeach
                  </select>
                </div>
                @endif
                @if(empty($parts))
                <p>No Part</p>
                @else
                <div class="form-group" style="padding-left: 10px">
                  <select name="part" class="form-control" style="width:210px;border-color:#0EA616;border-radius: 5px">
                  @foreach($parts as $part)
                  <option value="{{$part->partid}}">{{$part->partname}}</option>
                  @endforeach
                  </select>
                </div>
                @endif
                <div class="form-group" style="padding-left: 10px">
                  <input type="text" class="form-control" name="sectionname" value="" placeholder="{{$docs->heirachytitle4}}" style="width:210px;border-color:#0EA616;border-radius: 5px">
                </div>
                <div class="form-group" style="padding-left: 10px">
                  <!-- <textarea class="form-control" name="sectiontext" placeholder="Section Text"></textarea> -->
                </div>&nbsp
                <div class="text-left" style="padding-left: 10px">
                   <button type="submit" class="btn btn-lg" style="background-color:#0EA616;color:#fff;border-radius:5px">Save changes</button>
                </div>
              </form>
             </div>
           @endif
           @if($docs->heirachy5)
   <div id="myDIV4" style="display: none;">
    <form method="POST" action="/subsection-store" id="form5">
      @csrf
      <input type="hidden" name="docid" value="{{$docs->heirachyid}}"/>
       <input type="hidden" name="countryid" value="{{$countryid}}"/>
        @php  $titles =\App\Title::where('heirachyid','=',$docs->heirachyid)->get(); @endphp
        @php  $chapters =\App\Chapter::where('heirachyid','=',$docs->heirachyid)->get(); @endphp
        @php  $parts =\App\Part::where('heirachyid','=',$docs->heirachyid)->get(); @endphp
        @php  $sections =\App\Section::where('heirachyid','=',$docs->heirachyid)->get(); @endphp
        @if(empty($titles))
        <p>No Title</p>
        @else
        <div class="form-group" style="padding-left: 10px">
          <select name="title" class="form-control" style="width:210px;border-color:#0EA616;border-radius: 5px">
            @foreach($titles as $title)
            <option value="{{$title->id}}">{{$title->titlename}}</option>
            @endforeach
          </select>
        </div>
        @endif
        @if(empty($chapters))
        <p>No Chapter</p>
        @else
        <div class="form-group" style="padding-left: 10px">
          <select name="chapter" class="form-control" style="width:210px;border-color:#0EA616;border-radius: 5px">
            @foreach($chapters as $chapter)
            <option value="{{$chapter->chapterid}}">{{$chapter->chaptername}}</option>
            @endforeach
          </select>
        </div>
        @endif
        @if(empty($parts))
        <p>No Part</p>
        @else
        <div class="form-group" style="padding-left: 10px">
          <select name="part" class="form-control" style="width:210px;border-color:#0EA616;border-radius: 5px">
            @foreach($parts as $part)
            <option value="{{$part->partid}}">{{$part->partname}}</option>
            @endforeach
          </select>
        </div>
        @endif
        @if(empty($sections))
        <p>No Section</p>
        <div class="form-group" style="padding-left: 10px">
          <select name="section" class="form-control" style="width:210px;border-color:#0EA616;border-radius: 5px">
            @foreach($sections as $section)
            <option value="{{$section->sectionid}}">{{$section->sectionname}}</option>
            @endforeach
          </select>
        </div>
        @endif
        <div class="form-group" style="padding-left: 10px">
          <input type="text" class="form-control" name="subsectionname" value="" placeholder="{{$docs->heirachytitle5}}" style="width:210px;border-color:#0EA616;border-radius: 5px">
        </div>
        <div class="text-left" style="padding-left: 10px">
          <button type="submit" class="btn btn-lg" style="background-color:#0EA616;color:#fff;border-radius:5px">Save changes</button>
        </div>
    </form>
   </div>
   @endif
    @if($docs->heirachy6)
   <div id="myDIV5" style="display: none;align-items: center;">
    <form method="POST" action="/article-store" id="form6">
      @csrf
      <input type="hidden" name="docid" value="{{$docs->heirachyid}}"/>
       <input type="hidden" name="countryid" value="{{$countryid}}"/>
      @php  $titles =\App\Title::where('heirachyid','=',$docs->heirachyid)->get(); @endphp
      @php  $chapters =\App\Chapter::where('heirachyid','=',$docs->heirachyid)->get(); @endphp
      @php  $parts =\App\Part::where('heirachyid','=',$docs->heirachyid)->get(); @endphp
      @php  $sections =\App\Section::where('heirachyid','=',$docs->heirachyid)->get(); @endphp
      @php  $subsections = \App\Subsection::where('heirachyid','=',$docs->heirachyid)->get(); @endphp
      @if(empty($titles))
      <p>No Title</p>
      @else
      <div class="form-group" style="padding-left: 10px">
        <select name="title" class="form-control" style="width:210px;border-color:#0EA616;border-radius: 5px">
          @foreach($titles as $title)
          <option value="{{$title->id}}">{{$title->titlename}}</option>
          @endforeach
        </select>
      </div>
      @endif
      @if(empty($chapters))
      <p>No Chapter</p>
      @else
      <div class="form-group" style="padding-left: 10px">
        <select name="chapter" class="form-control" style="width:210px;border-color:#0EA616;border-radius: 5px">
          @foreach($chapters as $chapter)
          <option value="{{$chapter->chapterid}}">{{$chapter->chaptername}}</option>
          @endforeach
        </select>
      </div>
      @endif
      @if(empty($parts))
      <p>No Part</p>
      @else
      <div class="form-group" style="padding-left: 10px">
        <select name="part" class="form-control" style="width:210px;border-color:#0EA616;border-radius: 5px">
          @foreach($parts as $part)
          <option value="{{$part->partid}}">{{$part->partname}}</option>
          @endforeach
        </select>
      </div>
      @endif
      @if(empty($sections))
      <p>No Section</p>
      @else
      <div class="form-group" style="padding-left: 10px">
        <select name="section" class="form-control" style="width:210px;border-color:#0EA616;border-radius: 5px">
          @foreach($sections as $section)
          <option value="{{$section->sectionid}}">{{$section->sectionname}}</option>
          @endforeach
        </select>
      </div>
      @endif
      @if(empty($subsections))
      <p>No Sub Section</p>
      @else
      <div class="form-group" style="padding-left: 10px">
        <select name="subsection" class="form-control" style="width:210px;border-color:#0EA616;border-radius: 5px">
          @foreach($subsections as $subsection)
          <option value="{{$subsection->subsectionid}}">{{$subsection->subsectionname}}</option>
          @endforeach
        </select>
      </div>
      @endif
      <div class="form-group" style="padding-left: 10px">
        <input type="text" class="form-control" name="articlename" value="" placeholder="{{$docs->heirachytitle6}}" style="width:210px;border-color:#0EA616;border-radius: 5px">
      </div>
      <div class="form-group" style="padding-left: 10px">
        <!-- <textarea class="form-control" name="articletext" placeholder="Article Text"></textarea> -->
      </div>&nbsp
      <div class="text-left" style="padding-left: 10px">
        <button type="submit" class="btn btn-lg" style="background-color:#0EA616;color:#fff;border-radius:5px">Save changes</button>
      </div>
    </form>
   </div>
   @endif
   <!--Here we are to put what section was selected-->
       <input type="hidden" name="levels" value="" id="level">
       <input type="hidden" name="levelID" value="" id="levelID">
    <div class="card-body" style="overflow-y: scroll; height:350px;">
      <textarea id="editor" name="biography"class="form-control" rows="20" ></textarea>
    </div>
    <div id="responseMsg" style="color:green; font-size:16px"></div>
    <div id="errorMsg" style="color:red; font-size:16px"></div>

                </div>
            </div>
             <div class="text-center">
      <button type="button" class="btn-lg btn-lg-outline"  style="background-color: #DD0302;color:#fff;border-radius: 5px;border: none;">Cancel</button>
      <button type="button" class="btn-lg"  style="background-color: #0EA616;color:#fff;border-radius: 5px;border: none;" id="saveLevels" >Save</button>
    </div>
 </div>
 <div class="col">
   <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Preview Document</h3>
                    <ul class="list-inline panel-actions">
                        <li><a href="#" id="panel-fullscreen1" role="button" title="Toggle fullscreen"><i class="glyphicon glyphicon-resize-full"></i></a></li>
                    </ul>
                </div>
                <div class="panel-body" style="background-color:  #0EA616;color: #fff;overflow-y: scroll;height:380px">
                      @foreach($docs->titles as $title)
           <ul style="list-style:none;margin-left: -38px;">
             <li><a href="#" style="color: #fff; font-size:2rem" onclick="titles(<?php echo $title->id;?>)">@if($docs->showheirachy1 == 1) {{$docs->enumeratorheirachy1}}@endif {{$title->titlename}}</a></li>
             {!!$title->titletext!!}
                <ul style="list-style:none;margin-left: -34px;">
                  @foreach($title->chapters as $chapter)
                  <li><a href="#" style="color: #fff; font-size:1.8rem"   onclick="chapters(<?php echo $chapter->id;?>)">@if($docs->showheirachy2 == 1) {{$docs->enumeratorheirachy2}}@endif {{$chapter->chaptername}}</a></li>
                  {!!$chapter->chaptertext!!}
                  @endforeach
                     <ul style="list-style:none;margin-left: -30px;">
                       @foreach($title->parts as $part)
                       <li><a href="#" style="color: #fff; font-size:1.6rem" onclick="parts(<?php echo $part->id;?>)">@if($docs->showheirachy3 == 1) {{$docs->enumeratorheirachy3}}@endif {{$part->partname}}</a></li>
                       {!!$part->parttext!!}
                       @endforeach
                         <ul style="list-style:none;margin-left: -28px;">
                           @foreach($title->sections as $section)
                           <li><a href="#" style="color: #fff; font-size:1.4rem" onclick="sections(<?php echo $section->id;?>)">@if($docs->showheirachy4 == 1) {{$docs->enumeratorheirachy4}}@endif {{$section->sectionname}}</a></li>
                           {!!$section->sectiontext!!}
                           @endforeach
                             <ul style="list-style:none;margin-left: -24px;">
                               @foreach($title->subsections as $subsection)
                               <li><a href="#" style="color: #fff; font-size:1.2rem" onclick="subsections(<?php echo $subsection->id;?>)">@if($docs->showheirachy5 == 1) {{$docs->enumeratorheirachy5}}@endif {{$subsection->subsectionname}}</a></li>
                               {!!$subsection->subsectiontext!!}
                               @endforeach
                                 <ul style="list-style:none;margin-left: -20px;">
                                   @foreach($title->articles as $article)
                                   <li><a href="#" style="color: #fff; font-size:1rem" onclick="articles(<?php echo $article->id;?>)">@if($docs->showheirachy6 == 1) {{$docs->enumeratorheirachy6}}@endif {{$article->articlename}}</a></li>
                                   {!!$article->articletext!!}
                                   @endforeach
                                 </ul>
                             </ul>
                         </ul>
                     </ul>
                </ul>
           </ul>
        @endforeach
                </div>
            </div>
 </div>
 <div class="form-popup" id="myForm" style="display: none;">
  <!--form action ya ku comment-->
    <form action="{{ url('/storefeedback') }}" method="POST" class="form-container">
      @csrf
      <p>Add A comment</p>
      <input type="hidden" name="countryid" value="{{$docs->countryid}}">
      <input type="hidden" name="docid" value="{{$docs->heirachyid}}"/>
      @php  $titles =\App\Title::where('heirachyid','=',$docs->heirachyid)->get(); @endphp
      @php  $chapters =\App\Chapter::where('heirachyid','=',$docs->heirachyid)->get(); @endphp
      @php  $parts =\App\Part::where('heirachyid','=',$docs->heirachyid)->get(); @endphp
      @php  $sections =\App\Section::where('heirachyid','=',$docs->heirachyid)->get(); @endphp
      @php  $subsections = \App\Subsection::where('heirachyid','=',$docs->heirachyid)->get(); @endphp
      @if(empty($titles))
      <p>No Title</p>
      @else
      <div class="form-group" style="padding-left: 10px">
        <select name="title" class="form-control" style="width:210px;border-color:#0EA616;border-radius: 5px">
          @foreach($titles as $title)
          <option value="{{$title->id}}">{{$title->titlename}}</option>
          @endforeach
        </select>
      </div>
      @endif
      @if(empty($chapters))
      <p>No Chapter</p>
      @else
      <div class="form-group" style="padding-left: 10px">
        <select name="chapter" class="form-control" style="width:210px;border-color:#0EA616;border-radius: 5px">
          @foreach($chapters as $chapter)
          <option value="{{$chapter->chapterid}}">{{$chapter->chaptername}}</option>
          @endforeach
        </select>
      </div>
      @endif
      @if(!empty($parts))
      <div class="form-group" style="padding-left: 10px">
        <select name="part" class="form-control" style="width:210px;border-color:#0EA616;border-radius: 5px">
          @foreach($parts as $part)
          <option value="{{$part->partid}}">{{$part->partname}}</option>
          @endforeach
        </select>
      </div>
      @else
      <p>No Part</p>
      @endif
      @if(empty($sections))
      <p>No Section</p>
      @else
      <div class="form-group" style="padding-left: 10px">
        <select name="section" class="form-control" style="width:210px;border-color:#0EA616;border-radius: 5px">
          @foreach($sections as $section)
          <option value="{{$section->sectionid}}">{{$section->sectionname}}</option>
          @endforeach
        </select>
      </div>
      @endif
      @if(!empty($subsections))
      <div class="form-group" style="padding-left: 10px">
        <select name="subsection" class="form-control" style="width:210px;border-color:#0EA616;border-radius: 5px">
          @foreach($subsections as $subsection)
          <option value="{{$subsection->subsectionid}}">{{$subsection->subsectionname}}</option>
          @endforeach
        </select>
      </div>
      @else
      <p>No Sub Section</p>
      @endif
      <div class="form-group" style="padding-left: 10px;border-radius: 5px;border-color: #0EA616">
        <textarea class="form-control" name="comment" rows="2"></textarea>
      </div>&nbsp
      <div class="form-group text-center" style="padding-left: 10px">
        <button type="submit" class="btn-lg" style="background-color: #0EA616;color:#fff;border-radius: 5px">Create</button>
        <button type="button" class="btn-lg btn-outline" onclick="closeForm()" style="background-color: #DD0302;color:#fff;border-radius: 5px">Close</button>
      </div>
    </form>
  </div>
 <div class="col">
  <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">My Feedback</h3>
                    <ul class="list-inline panel-actions">
                        <li><a href="#" id="panel-fullscreen2" role="button" title="Toggle fullscreen"><i class="glyphicon glyphicon-resize-full"></i></a></li>
                    </ul>
                </div>
                <div class="panel-body" style="overflow-y: scroll;height:360px">
                      @if(Session::has('comments'))
     @foreach(Session::get('comments') as $comment)
      <div class="row">
        <div class="image-kadogo" style="padding-left: 3px"><!--This will change too-->
          <!--commentors image-->
            <img class="img-profile rounded-circle" src="" style="width: 30px; height: 30px; border-radius: 40%;">&nbsp
                 {{$comment->user->name}}<br>
        </div>
         <div class="comments" style="padding-left: 40px">
              {{$comment->comment}}
          </div>
      </div>
      @endforeach
      @else
       @foreach($comments as $comment)
      <div class="card-body" style="background-color: #000;border-radius: 5px;">
        <div class="row">
          <div class="image-kadogo" style="padding-left: 3px"><!--This will change too-->
          <!--commentors image-->
            <img class="img-thumbnail rounded-circle" src="{{asset($comment->user->profileimage)}}" style="width: 30px; height: 30px; border-radius: 2px%;">&nbsp

        </div>
        <div class="name" style="color: #fff">
          {{$comment->user->name}}
        </div>
        <div class="comments" style="padding-left: 40px;color: #fff">
              {{$comment->comment}}
          </div>
        </div>
      </div>
      @endforeach
      @endif
    </div>&nbsp

                </div>
                <div class="text-center" style="padding-left: 10px">
      <button class="btn-lg" onclick="openForm()" style="background-color: #0EA616;color:#fff;border-radius: 5px;border: none;">Add Comment</button>
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
<style>
@import url("https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css");
.panel-title > a:before {
float: right !important;
font-family: FontAwesome;
content:"\f068";
padding-right: 5px;
}
.panel-title > a.collapsed:before {
    float: right !important;
    content:"\f067";
}
.panel-title > a:hover,
.panel-title > a:active,
.panel-title > a:focus  {
    text-decoration:none;
}
</style>
<style type="text/css">
  .panel-actions {
  margin-top: -20px;
  margin-bottom: 0;
  text-align: right;
}
.panel-actions a {
  color:#333;
}
.panel-fullscreen {
    display: block;
    z-index: 9999;
    position: fixed;
    width: 100%;
    height: 100%;
    top: 0;
    right: 0;
    left: 0;
    bottom: 0;
    overflow: auto;
}
</style>
<script type="text/javascript">
  $(document).ready(function () {
    //Toggle fullscreen
    $("#panel-fullscreen").click(function (e) {
        e.preventDefault();

        var $this = $(this);

        if ($this.children('i').hasClass('glyphicon-resize-full'))
        {
            $this.children('i').removeClass('glyphicon-resize-full');
            $this.children('i').addClass('glyphicon-resize-small');
        }
        else if ($this.children('i').hasClass('glyphicon-resize-small'))
        {
            $this.children('i').removeClass('glyphicon-resize-small');
            $this.children('i').addClass('glyphicon-resize-full');
        }
        $(this).closest('.panel').toggleClass('panel-fullscreen');
    });
});

</script>
<script type="text/javascript">
  $(document).ready(function () {
    //Toggle fullscreen
    $("#panel-fullscreen1").click(function (e) {
        e.preventDefault();

        var $this = $(this);

        if ($this.children('i').hasClass('glyphicon-resize-full'))
        {
            $this.children('i').removeClass('glyphicon-resize-full');
            $this.children('i').addClass('glyphicon-resize-small');
        }
        else if ($this.children('i').hasClass('glyphicon-resize-small'))
        {
            $this.children('i').removeClass('glyphicon-resize-small');
            $this.children('i').addClass('glyphicon-resize-full');
        }
        $(this).closest('.panel').toggleClass('panel-fullscreen');
    });
});

</script>
<script type="text/javascript">
  $(document).ready(function () {
    //Toggle fullscreen
    $("#panel-fullscreen2").click(function (e) {
        e.preventDefault();

        var $this = $(this);

        if ($this.children('i').hasClass('glyphicon-resize-full'))
        {
            $this.children('i').removeClass('glyphicon-resize-full');
            $this.children('i').addClass('glyphicon-resize-small');
        }
        else if ($this.children('i').hasClass('glyphicon-resize-small'))
        {
            $this.children('i').removeClass('glyphicon-resize-small');
            $this.children('i').addClass('glyphicon-resize-full');
        }
        $(this).closest('.panel').toggleClass('panel-fullscreen');
    });
});

</script>
<script type="text/javascript">
  $(document).ready(function () {
    //Toggle fullscreen
    $("#panel-fullscreen3").click(function (e) {
        e.preventDefault();

        var $this = $(this);

        if ($this.children('i').hasClass('glyphicon-resize-full'))
        {
            $this.children('i').removeClass('glyphicon-resize-full');
            $this.children('i').addClass('glyphicon-resize-small');
        }
        else if ($this.children('i').hasClass('glyphicon-resize-small'))
        {
            $this.children('i').removeClass('glyphicon-resize-small');
            $this.children('i').addClass('glyphicon-resize-full');
        }
        $(this).closest('.panel').toggleClass('panel-fullscreen');
    });
});

</script>
<script>
function myFunction()
{
  var x = document.getElementById("myDIV");
  var y = document.getElementById("myDIV1");
  var z = document.getElementById("myDIV2");
  var a = document.getElementById("myDIV3");
  var b = document.getElementById("myDIV4");
  var c = document.getElementById("myDIV5");


  if (x.style.display === "none") {
    x.style.display = "block";
    y.style.display = "none";
    z.style.display  = "none";
    a.style.display  = "none";
    b.style.display  = "none";
    c.style.display  = "none";
  } else {
    x.style.display = "none";
  }
}
</script>
<script>
function myFunction1()
{
  var x = document.getElementById("myDIV");
  var y = document.getElementById("myDIV1");
  var z = document.getElementById("myDIV2");
  var a = document.getElementById("myDIV3");
  var b = document.getElementById("myDIV4");
  var c = document.getElementById("myDIV5");

  if (y.style.display === "none") {
    y.style.display = "block";
    x.style.display = "none";
    z.style.display  = "none";
    a.style.display  = "none";
    b.style.display  = "none";
    c.style.display  = "none";
  } else {
    y.style.display = "none";
  }
}
</script>
<script>
function myFunction2()
{
  var x = document.getElementById("myDIV");
  var y = document.getElementById("myDIV1");
  var z = document.getElementById("myDIV2");
  var a = document.getElementById("myDIV3");
  var b = document.getElementById("myDIV4");
  var c = document.getElementById("myDIV5");

  if (z.style.display === "none") {
    z.style.display = "block";
    y.style.display = "none";
    x.style.display  = "none";
    a.style.display  = "none";
    b.style.display  = "none";
    c.style.display  = "none";
  } else {
    z.style.display = "none";
  }
}
</script>
<script>
function myFunction3()
{
  var x = document.getElementById("myDIV");
  var y = document.getElementById("myDIV1");
  var z = document.getElementById("myDIV2");
  var a = document.getElementById("myDIV3");
  var b = document.getElementById("myDIV4");
  var c = document.getElementById("myDIV5");

if (a.style.display === "none") {
  a.style.display = "block";
  y.style.display = "none";
  z.style.display  = "none";
  x.style.display  = "none";
  b.style.display  = "none";
  c.style.display  = "none";
} else {
  a.style.display = "none";
}
}
</script>
<script>
function myFunction4()
{
  var x = document.getElementById("myDIV");
  var y = document.getElementById("myDIV1");
  var z = document.getElementById("myDIV2");
  var a = document.getElementById("myDIV3");
  var b = document.getElementById("myDIV4");
  var c = document.getElementById("myDIV5");

if (b.style.display === "none") {
  b.style.display = "block";
  y.style.display = "none";
  z.style.display  = "none";
  a.style.display  = "none";
  x.style.display  = "none";
  c.style.display  = "none";
} else {
  b.style.display = "none";
}
}
</script>
<script>
 function myFunction5()
{
  var x = document.getElementById("myDIV");
  var y = document.getElementById("myDIV1");
  var z = document.getElementById("myDIV2");
  var a = document.getElementById("myDIV3");
  var b = document.getElementById("myDIV4");
  var c = document.getElementById("myDIV5");

  if (c.style.display === "none") {
    c.style.display = "block";
    y.style.display = "none";
    z.style.display  = "none";
    a.style.display  = "none";
    b.style.display  = "none";
    x.style.display  = "none";
  } else {
    c.style.display = "none";
  }
}
</script>
<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}
function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>
<script>
tinymce.init({
  selector: 'textarea#editor',
  menubar: true
});
</script>
<script>
  function titles(title){
  //console.log(title);
      $('#errorMsg').html('');
      $('#responseMsg').html(' ');
      $('#level').val(" ");
      $('#levelID').val(" ");
  var url = "{{url('/titleText')}}"+'/'+ title;
      $.ajax({
          url: url,
          type: 'GET',
          success: function(res)
          {
              tinyMCE.activeEditor.setContent(res);
              $('#level').val("title");
              $('#levelID').val(title);
          }
      });
  }
</script>
<script>
   function chapters(chapter){
       //console.log(title);
       $('#errorMsg').html('');
       $('#responseMsg').html(' ');
       $('#level').val(" ");
       $('#levelID').val(" ");
       var url = "{{url('/chapterText')}}"+'/'+ chapter;
       $.ajax({
           url: url,
           type: 'GET',
           success: function(res)
           {
               tinyMCE.activeEditor.setContent(res);
               $('#level').val("chapter");
               $('#levelID').val(chapter);
           }
       });
   }
</script>
<script>
function parts(part){
   //console.log(title);
   $('#errorMsg').html('');
   $('#responseMsg').html(' ');
   $('#level').val(" ");
   $('#levelID').val(" ");
   var url = "{{url('/partText')}}"+'/'+ part;
   $.ajax({
       url: url,
       type: 'GET',
       success: function(res)
       {
           tinyMCE.activeEditor.setContent(res);
           $('#level').val("part");
           $('#levelID').val(part);
       }
   });
}
</script>
<script>
   function sections(section){
       //console.log(title);
       $('#errorMsg').html('');
       $('#responseMsg').html(' ');
       $('#level').val(" ");
       $('#levelID').val(" ");
       var url = "{{url('/sectionText')}}"+'/'+ section;
       $.ajax({
           url: url,
           type: 'GET',
           success: function(res)
           {
               tinyMCE.activeEditor.setContent(res);
               $('#level').val("section");
               $('#levelID').val(section);
           }
       });
   }
</script>
<script>
   function subsections(subsection){
       //console.log(title);
       $('#errorMsg').html('');
       $('#responseMsg').html(' ');
       $('#level').val(" ");
       $('#levelID').val(" ");
       var url = "{{url('/subsectionText')}}"+'/'+subsection;
       $.ajax({
           url: url,
           type: 'GET',
           success: function(res)
           {
               tinyMCE.activeEditor.setContent(res);
               $('#level').val("subsection");
               $('#levelID').val(subsection);
           }
       });
   }
</script>
<script>
   function articles(article){
       //console.log(title);
       $('#errorMsg').html('');
       $('#responseMsg').html(' ');
       $('#level').val(" ");
       $('#levelID').val(" ");
       var url = "{{url('/articleText')}}"+'/'+article;
       $.ajax({
           url: url,
           type: 'GET',
           success: function(res)
           {
               tinyMCE.activeEditor.setContent(res);
               $('#level').val("article");
               $('#levelID').val(article);
           }
       });
   }
</script>
<script>
   $(document).ready(function(){
   $('#saveLevels').on('click',function(e){

       $('#errorMsg').html('');
       $('#responseMsg').html(' ');
       var url = "{{url('/document/saveText')}}";
       var lev = $('#level').val();
       var levID = $('#levelID').val();
       var textarea = tinymce.get("editor").getContent();
       var token =  "{{ csrf_token()}}";

       $.ajax({
           url: url,
           type: 'POST',
           data:{'level':lev, 'text':textarea, '_token':token, 'levelID':levID},
           success: function(res)
           {
               if(res.msg){
                   tinyMCE.activeEditor.setContent('');
                   $('#level').val("");
                   $('#levelID').val("");
                   $('#responseMsg').html(res.msg);
               }else if(res.error){
                   tinyMCE.activeEditor.setContent('');
                   $('#level').val("");
                   $('#levelID').val("");
                   $('#errorMsg').html(res.error);
               }

           },

       });

   });
   });
</script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::render() !!}
</body>
</html>
