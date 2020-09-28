<!DOCTYPE HTML>
<html>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Edu System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="" />
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700,900" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Animate.css -->
    <link rel="stylesheet" href="/css/shablon/animate.css">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="/css/shablon/icomoon.css">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="/css/shablon/bootstrap.css">
    <link rel="stylesheet" href="/dist/css/AdminLTE.min.css">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="/css/shablon/magnific-popup.css">
    
    <!-- Flexslider  -->
    <link rel="stylesheet" href="/css/shablon/flexslider.css">
<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="/css/shablon/owl.carousel.min.css">
    <link rel="stylesheet" href="/css/shablon/owl.theme.default.min.css">
    
    <!-- Flaticons  -->
    <link rel="stylesheet" href="/fonts/flaticon/font/flaticon.css">

    <!-- Theme style  -->

    <link rel="stylesheet" href="/css/shablon/style.css">
    <link rel="stylesheet" href="/css/shablon/my.css">
    <link rel="stylesheet" href="/css/shablon/new__css.css">
        @yield('css')
    <link rel="stylesheet" href="/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Modernizr JS -->
    <script src="/js/shablon/modernizr-2.6.2.min.js"></script>
    <!-- FOR IE9 below -->
    <!--[if lt IE 9]>
    <script src="js/respond.min.js"></script>
    <![endif]-->

    </head>
    <body>
        
    <div class="colorlib-loader"></div>
    <div id="page">
        <nav class="colorlib-nav" role="navigation">
            <div class="top-menu">
                <div class="">
                    <div class="row">
                        <div class="col-md-1">
                            <div id="colorlib-logo"><a href="/">Edu Portal</a></div>
                        </div>
                        <div class="col-md-7 text-right menu-1">
                            <ul>
                                <li  class=" {{ Request::route()->getName()=='welcome' ? 'active' : ''}} "><a href="/">@lang('messages.bosh_sah')</a></li>
                                <li class="has-dropdown  {{ Request::route()->getName()=='books' ? 'active' : ''}} ">
                                    <a href="#">@lang('messages.library')</a>
                                    <ul class="dropdown">
                                        @foreach($categories as $category)
                                        <li><a href="{{ route('bookCategory', ['id'=>$category->id]) }}">{{ $category->{'name_'.\App::getLocale()} }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li class=" {{ Request::route()->getName()=='posts' ? 'active' : ''}} "><a href="/posts">@lang('messages.posts')</a></li>
                                <li class="has-dropdown {{ Request::route()->getName()=='audios' ? 'active' : ''}} ">
                                    <a href="#">@lang('messages.audios')</a>
                                    <ul class="dropdown">
                                        @foreach($audio_cats as $cat)
                                        <li><a href="{{ route('getAudios', ['id'=>$cat->id]) }}">{{ $cat->{'name_'.\App::getLocale()} }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li class="has-dropdown {{ Request::route()->getName()=='videos' ? 'active' : ''}} ">
                                    <a href="#">@lang('messages.videos')</a>
                                    <ul class="dropdown">
                                        @foreach($video_cats as $cat)
                                        <li><a href="{{ route('getVideos', ['id'=>$cat->id]) }}">{{ $cat->{'name_'.\App::getLocale()} }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>

                                
                                <li class="has-dropdown">
                                    <a href="#">@lang('messages.for_abi')</a>
                                    <ul class="dropdown">
                                        
                                        <li><a href="{{ route('applicants') }}">@lang('messages.posts')</a></li>
                                        <li><a href="{{ route('results') }}">@lang('messages.dtm')</a></li>
                                     
                                    </ul>
                                </li>
                                <li class="has-dropdown ">
                                    <a href="#">@lang('messages.vacancy')</a>
                                    <ul class="dropdown">
                                        
                                        <li><a href="{{ route('getJobs') }}">@lang('messages.job')</a></li>
                                        <li><a href="{{ route('jobSeeker') }}">@lang('messages.seeker')</a></li>
                                        
                                    </ul>
                                </li>

                            </ul>
                        </div>
                        <div class="col-md-2 lang">
                            <div class="btn-group">
                              <button type="button" class="btn btn-default">@lang('messages.lang')</button>
                              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                <span class="caret"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                              </button>
                              <ul class="dropdown-menu" role="menu">
                                <li><a href="/lang/uz">UZB</a></li>
                                <li><a href="/lang/ru">RUS</a></li>
                                <li><a href="/lang/en">ENG</a></li>
                              </ul>
                            </div>
                        </div>
                        <div class="col-m">
                            @if (Route::has('login'))
                                <div class="top-right links">
                                    @auth
                                        @if(Request::route()->getName()=='home')
                                            <li class="nav-item dropdown">
                                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                    {{ Auth::user()->name }} <span class="caret"></span>
                                                </a>

                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                                       onclick="event.preventDefault();
                                                                     document.getElementById('logout-form').submit();">
                                                        {{ __('Logout') }}
                                                    </a>

                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                        @csrf
                                                    </form>
                                                </div>
                                            </li>
                                        @else
                                            <a href="{{ url('/home') }}">@lang('messages.home')</a>
                                        @endif
                                    @else
                                        <i class="login_icon fas fa-sign-in-alt"></i>
                                        <a href="{{ route('login') }}">@lang('messages.login')</a>

                                        @if (Route::has('register'))
                                            <i class="user_edit fas fa-user-edit"></i>
                                            <a href="{{ route('register') }}">@lang('messages.register')</a>
                                        @endif
                                    @endauth
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        @if(session('flash'))
        <div class="col-lg-4 col-xs-12 alert msg alert-success alert-dismissible" >
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4><i class="icon fa fa-check"></i> @lang('messages.msg_sent')</h4>
          {{ session('flash')  }}
        </div>
        @endif
         @if(session('error'))
        <div class="col-lg-4 alert msg alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4><i class="fas fa-exclamation-triangle"></i> error!</h4>
          {{ session('error')  }}
        </div>
        @endif
        @yield('content')

        <footer id="colorlib-footer">
            <div class="container">
            <div class="row row-pb-md">
                <div class="col-md-3 colorlib-widget">
                    <h4>@lang('messages.info')</h4>
                    <ul class="colorlib-footer-links">
                        <li>Farg'ona shahar <br> A.Navoiy 37</li>
                        <li><a href="tel://1234567920"><i class="icon-phone"></i> +99899 603 11 10</a></li>
                        <li><a href="mailto:info@yoursite.com"><i class="icon-envelope"></i> info@yoursite.com</a></li>
                        <li><a href="http://luxehotel.com"><i class="icon-location4"></i> yourwebsite.com</a></li>
                    </ul>
                </div>
                <div class="col-md-2 colorlib-widget">
                    <h4>@lang('messages.pages')</h4>
                    <p>
                        <ul class="colorlib-footer-links">
                            <li><a href="/"><i class="icon-check"></i>@lang('messages.bosh_sah')</a></li>
                            <li><a href="/posts"><i class="icon-check"></i>@lang('messages.posts')</a></li>
                            <li><a href="/books"><i class="icon-check"></i>@lang('messages.library')</a></li>
                            <li><a href="/audios"><i class="icon-check"></i> @lang('messages.audios')</a></li>
                            <li><a href="/videos"><i class="icon-check"></i> @lang('messages.videos')</a></li>
                            <li><a href="/about"><i class="icon-check"></i> @lang('messages.aboutus')</a></li>
                            
                        </ul>
                    </p>
                </div>
                <div class="col-md-2 colorlib-widget">
                    <h4>@lang('messages.library')</h4>
                    <p>
                        <ul class="colorlib-footer-links">
                            @foreach($categories as $category)
                            <li><a href="{{ route('bookCategory', ['id'=>$category->id]) }}"><i class="icon-check"></i>{{ $category->{'name_'.\App::getLocale()} }} </a></li>
                            @endforeach
        
                        </ul>
                    </p>
                </div>

                <div class="col-md-2 colorlib-widget">
                    <h4>Support</h4>
                    <p>
                        <ul class="colorlib-footer-links">
                            <li><a href="#"><i class="icon-check"></i> Documentation</a></li>
                            <li><a href="#"><i class="icon-check"></i> Forums</a></li>
                            <li><a href="#"><i class="icon-check"></i> Help &amp; Support</a></li>
                            <li><a href="#"><i class="icon-check"></i> Scholarship</a></li>
                            <li><a href="#"><i class="icon-check"></i> Student Transport</a></li>
                            <li><a href="#"><i class="icon-check"></i> Release Status</a></li>
                        </ul>
                    </p>
                </div>

                <div class="col-md-3 colorlib-widget">
                    <h4>@lang('messages.latest_post')</h4>
                    @foreach($posts as $post)
                    <div class="f-blog">
                        <a href="blog.html" class="blog-img" style="background-image: url({{ $post->image }});">
                        </a>
                        <div class="desc">
                        <h2><a href="{{ route('viewPost', $post->id) }}">{{ $post->{'title_'.\App::getLocale()} }}</a></h2>
                        <p class="admin"><span>{{ $post->created_at->format('d M, Y') }}</span></p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            </div>      
        </footer>
    </div>

    <div class="gototop js-top">
        <a href="#" class="js-gotop"><i class="icon-arrow-up2"></i></a>
    </div>
    
    <!-- jQuery -->
    <script src="/js/shablon/jquery.min.js"></script>
    <!-- jQuery Easing -->
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
     <script src="/js/my.js"></script>
    <script src="/js/shablon/jquery.easing.1.3.js"></script>
    <!-- Bootstrap -->
    <script src="/js/shablon/bootstrap.min.js"></script>
    <!-- Waypoints -->
    <script src="/js/shablon/jquery.waypoints.min.js"></script>
    <!-- Stellar Parallax -->
    <script src="/js/shablon/jquery.stellar.min.js"></script>
    <!-- Flexslider -->
    <script src="/js/shablon/jquery.flexslider-min.js"></script>
    <!-- Owl carousel -->
    <script src="/js/shablon/owl.carousel.min.js"></script>
    <!-- Magnific Popup -->
    <script src="/js/shablon/jquery.magnific-popup.min.js"></script>
    <script src="/js/shablon/magnific-popup-options.js"></script>
    <!-- Counters -->
    <script src="/js/shablon/jquery.countTo.js"></script>
    <!-- Main -->
    <script src="/js/shablon/main.js"></script>

<script src="/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

    </body>
</html>

