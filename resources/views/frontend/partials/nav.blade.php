<div class="site-navbar" >
  <div class="row align-items-center" style="padding-left: 35px">
    <div class="col-3">
        <a href = "http://127.0.0.1:8000/" target = "_self">
         <img src = "{{asset('images/icons/afaa logo.jpg')}}" alt = "Logo" height = "50"/>
        </a>
    </div>
    <div class="col-9">
      <nav class="site-navigation text-right" role="navigation">
        <div class="container">
          <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>
          <ul class="site-menu js-clone-nav d-none d-lg-block">
            <li class="active"><a href="#" style="font-family: Nunito;font-size: 16px;">Compare Legislation</a></li>
            <li ><a href="#" style="font-family: Nunito;font-size: 16px;">Modal Law</a></li>
            <li class="has-children">
              <a href="#" style="font-family: Nunito;font-size: 16px;">EN</a>
              <ul class="dropdown arrow-top" style="z-index: 100">
                <li><a href="#">English</a></li>
                <li><a href="#">Français</a></li>
                <li><a href="#">Portuguese</a></li>
              </ul>
            </li> 
               @if (Route::has('login'))
                  @auth
                <li class="has-children" style="background-color: #0EA616"><a href="" ><span class="d-inline-block text-white btn" style="background-color:#0EA616;border-radius: 5px">{{Auth::user()->name}}&nbsp<img class="img-profile rounded-circle" src="{{ asset(auth()->user()->profileimage) }}" style="width: 30px; height: 30px; border-radius: 40%;"></span>
                </a>
                    <ul class="dropdown" style="z-index: 100">
                        <li><a href="/contributor-home">Dashboard</a></li>
                      <li><a href="/contributor">Profile</a></li>
                      <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"></i>Logout</a></li>
                    </ul>
                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          {{ csrf_field() }}
                     </form>
                </li>
                @else
                <li><a href="{{ url('/login') }}"><span class="d-inline-block  text-white btn" style="background-color: #0EA616;border-radius: 5px;font-family: Nunito;font-size: 16px;">Member Login</span></a></li>
                @endauth
                @endif
            <li><a href="#"></span></a>
            </li>
          </ul>
        </div>
      </nav>
    </div>
  </div>
</div>
