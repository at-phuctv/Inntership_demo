
<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>{!! trans('constants.title') !!}</title>
<link href="{{ URL::asset('bower_components/bootstrap/dist/css/bootstrap.css') }}" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- Custom Theme files -->
<link href="{{ URL::asset('css/style.css') }}" rel='stylesheet' type='text/css' />
<link href="{{ URL::asset('css/templade.css') }}" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--webfont-->
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="{{ URL::asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/login.js')}}"></script>
<script src="{{ URL::asset('bower_components/easydropdown/src/jquery.easydropdown.js') }}"></script>
<!--Animation-->
<script src="{{ URL::asset('bower_components/wow//dist/wow.min.js')}}"></script>
<link href="{{ URL::asset('bower_components/animate.css/animate.css') }}" rel='stylesheet' type='text/css' />
<script>
  new WOW().init();
</script>
</head>
<body>
<div class="header">
       <div class="col-sm-8 header-left">
           <div class="logo">
            <a href="index.html"><img src="{{asset(trans('constants.image'))}}/logo.png" alt=""/></a>
           </div>
           <div class="menu">
              <a class="toggleMenu" href="#"><img src="{{asset(trans('constants.image'))}}/nav.png" alt="" /></a>
                <ul class="nav" id="nav">
                @foreach($listCate as $value)
                  <li><a href="">{{$value->name}}</a></li>
                @endforeach
                <div class="clearfix"></div>
              </ul>
              <script type="text/javascript" src="{{ URL::asset('js/responsive-nav.js')}}"></script>
            </div>  
             <!-- start search-->
              <div class="search-box">
              <div id="sb-search" class="sb-search">
                <form>
                  <input class="sb-search-input" placeholder="Enter your search term..." type="search" name="search" id="search">
                  <input class="sb-search-submit" type="submit" value="">
                  <span class="sb-icon-search"> </span>
                </form>
              </div>
            </div>
            <!----search-scripts---->
            <script src="{{ URL::asset('js/classie.js')}}"></script>
            <script src="{{ URL::asset('js/uisearch.js ')}}"></script>
            <script>
              new UISearch( document.getElementById( 'sb-search' ) );
            </script>
            <!----//search-scripts---->           
              <div class="clearfix"></div>
            </div>
              <div class="col-sm-4 header_right">
                @if (!Auth::user())
                <div id="loginContainer"><a href="#" id="loginButton"><img src="{{asset(trans('constants.image'))}}/login.png"><span>{!! trans('auth.login') !!}</span></a>
                <div id="loginBox">                
                    <form id="loginForm" action="{{ route('login') }}" method="POST">
                    {{ csrf_field() }}
                            <fieldset id="body">
                              <fieldset>
                                      <label for="email">{!! trans('auth.email_address') !!}</label>
                                      <input type="text" name="email" id="email">
                                </fieldset>
                                <fieldset>
                                        <label for="password">{!! trans('auth.password') !!}</label>
                                        <input type="password" name="password" id="password">
                                 </fieldset>
                                <input type="submit" id="login" value="Sign in">
                              <label for="checkbox"><input type="checkbox" id="checkbox"> <i>{!! trans('auth.remember_me') !!}</i></label>
                          </fieldset>
                             <span><a href="#">{!! trans('auth.forget_password') !!}</a></span>
                    </form>
                      </div>
                   </div>

                  @else
                       <div id="loginContainer" class="image_user"><a href="#" id="loginButton"><img id="imageuser" src="{{asset(trans('constants.image'))}}/2017-01-12 04:14:52a.jpg">

                       <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{trans('auth.logout')}}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                   </div>

                  @endif
                     <div class="clearfix"></div>
                   </div>
                  <div class="clearfix"></div>
   </div>
   <div class="banner">
      <div class="container_wrap">
      <form action="{{route('search')}}" method="get">
      <h1>{!! trans('constants.search_for') !!}</h1>
           <div class="dropdown-buttons">   
                  <div class="dropdown-button">                 
                  <select class="dropdown" tabindex="9" data-settings='{"wrapperClass":"flat"}' name="category">
                   <option value="">{{ trans('constants.category') }}</option>
                   @foreach($listCateSearch as $value)
                   <option value="{{ $value->id }}">{{$value->name}}</option>  
                   @endforeach
            </select>
          </div>
             <div class="dropdown-button">
            <select class="dropdown" tabindex="9" data-settings='{"wrapperClass":"flat"}' name="start_price">
                   <option value="{{config('constants.price_start_search')}}">{{ trans('constants.start_price') }}</option>
                   @foreach($listPriceStart as $value)
                   <option>{{ $value }}</option>
                   @endforeach
            </select>
           </div>
           <div class="dropdown-button">
            <select class="dropdown" tabindex="9" data-settings='{"wrapperClass":"flat"}' name="end_price">
                   <option value="{{config('constants.price_end_search')}}">{{ trans('constants.end_price') }}</option>
                   @foreach($listPriceEnd as $value)
                   <option>{{ $value }}</option>
                   @endforeach
            </select>
           </div>
           <div class="dropdown-button">
            <select class="dropdown" tabindex="9" data-settings='{"wrapperClass":"flat"}' name="city">
                   <option value="">{{ trans('constants.city') }}</option>
                    @foreach($listCity as $value)
                   <option>{{ $value->city }}</option>
                   @endforeach
            </select>
           </div>
           </div>  
          <div class="contact_btn">
                 <label class="btn1 btn-2 btn-2g"><input name="submit" type="submit" id="submit" value="Search"></label>
              </div>
      </form>           
          <div class="clearfix"></div>
         </div>
   </div>
   <div class="container">
            @yield('content')
    </div>
   <div class="footer">
    <div class="container">
     <div class="footer_top">
       <h3></h3>
       <form>
    <span>
      <i><img src="{{asset(trans('constants.image'))}}/mail.png" alt=""></i>
        <input type="text" value="Enter your email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter your email';}">
        <label class="btn1 btn2 btn-2 btn-2g"> <input name="submit" type="submit" id="submit" value="Subscribe"> </label>
        <div class="clearfix"> </div>
    </span>           
     </form>
    </div>
    <div class="footer_grids">
       <div class="footer-grid">
      <h4></h4>
      <ul class="list1">
        <li><a href="contact.html"></a></li>
      </ul>
      </div>
      <div class="footer-grid">
      <h4></h4>
      <ul class="list1">
        <li><a href="#"></a></li>
      </ul>
      </div>
      <div class="footer-grid last_grid">
      <h4></h4>
      <ul class="footer_social wow fadeInLeft" data-wow-delay="0.4s">
        <li><a href=""> <i class="fb"> </i> </a></li>
        <li><a href=""><i class="tw"> </i> </a></li>
        <li><a href=""><i class="google"> </i> </a></li>
        <li><a href=""><i class="u_tube"> </i> </a></li>
      </ul>
      <div class="copy wow fadeInRight" data-wow-delay="0.4s">
              <p> {!! trans('constants.copy_right_by') !!}</p>
          </div>
      </div>
      <div class="clearfix"> </div>
     </div>
      </div>
   </div>
</body>
</html>