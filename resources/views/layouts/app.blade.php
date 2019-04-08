<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
@if(env('APP_NAME') == 'sadcreeper' && env('APP_DEBUG') == false)
  <script>
  var _hmt = _hmt || [];
  (function() {
    var hm = document.createElement("script");
    hm.src = "https://hm.baidu.com/hm.js?ec4335b5bc7f9967785dddd770b05538";
    var s = document.getElementsByTagName("script")[0];
    s.parentNode.insertBefore(hm, s);
  })();
  </script>
@endif
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.home', 'Laravel'))</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/slicy.css') }}" rel="stylesheet">

	@if ( $_SERVER['REQUEST_URI'] == '/'  )
		<link rel="stylesheet" type="text/css" href="{{ asset('css/home/style.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/home/nivo-lightbox/nivo-lightbox.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/home/nivo-lightbox/default.css') }}">
	@endif

</head>
<body>
    <div id="app">
		@if ( $_SERVER['REQUEST_URI'] != '/' )
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        Home
                    </a>

                    <div class="navbar-brand visible-xs-block" style="padding:4px 0 0 50px">
                      <form class="navbar-form navbar-left search" style="margin:0;border:0;float:right" role="search" action="{{ route('articles.search') }}" method="post">
                          {{ csrf_field() }}
                          <div class="form-group">
                              <span class="glyphicon glyphicon-search" style="line-height:inherit"></span>
                              <input type="text" name="key" style="border: none;margin-left:5px;width:100px" placeholder="search..">
                          </div>
                      </form>
                    </div>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        <li><a href="{{ route('articles.list') }}">全部文章</a></li>
                        <li><a href="https://github.com/zhteng/Frimly" target="_blank"><img src="/icons/github.png" alt="" style="width:18px;margin-bottom:3px"></a></li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <li class="hidden-xs" style="margin-top:6px">
                            <form class="navbar-form navbar-left search" role="search" action="{{ route('articles.search') }}" method="post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <span class="glyphicon glyphicon-search"></span>
                                    <input type="text" name="key" style="border: none;margin-left:5px;width:100px" placeholder="search..">
                                </div>
                            </form>
                        </li>
                        @guest
                            <!--<li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>-->
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    @if (Auth::check())
                                        @if (Auth::id() === 1)
                                          <li><a href="/admin">管理后台</a></li>
                                          <li role="separator" class="divider"></li>
                                        @endif
                                    @endif
                                    <li>
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
		@endif

        @yield('content')

        <footer class="z-footer">
            <p class="z-text">DESIGN & FRONT-END CODE BY</p>
            <p class="z-text-big">Zteng</p>
        </footer>
    </div>

    <!-- Scripts -->
	<script src="{{ asset('js/app.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/home/jquery-2.2.4.min.js') }}"></script>
	<!-- Popper js -->
	<script type="text/javascript" src="{{ asset('js/home/popper.min.js') }}"></script>
	<!-- Bootstrap js -->
	<script type="text/javascript" src="{{ asset('js/home/bootstrap.min.js') }}"></script>
	<!-- Plugins js -->
	<script type="text/javascript" src="{{ asset('js/home/plugins.js') }}"></script>
	<!-- Active js -->
	<script type="text/javascript" src="{{ asset('js/home/active.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/home/bootstrap.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/home/nivo-lightbox.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/home/jquery.isotope.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/home/main.js') }}"></script>

    @yield('scripts')
</body>
</html>
