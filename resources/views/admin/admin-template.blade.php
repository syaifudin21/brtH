<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="description" content="{{env('APP_DESKRIPSI')}}">

    <!-- Open Graph Meta-->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="{{env('APP_NAME')}}">
    <meta property="og:title" content="{{env('APP_NAME')}}">
    <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
    <meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
    <meta property="og:description" content="{{env('APP_DESKRIPSI')}}">
    <title>{{env('APP_NAME')}}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script data-ad-client="ca-pub-6778922688679043" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <!-- Main CSS-->
    <link rel="icon" href="{{asset(env('APP_ICON'))}}">
    <link rel="stylesheet" type="text/css" href="{{asset('back/css/main.css')}}">
    <!-- Font-icon css-->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    @yield('css')
  </head>
  <body class="app sidebar-mini rtl">
    <!-- Navbar-->
  <header class="app-header"  style="background-color: #ff6600" >
    <a class="app-header__logo"  style="background-color: #ff6600"  href="{{url('admin')}}">{{env('APP_NAME')}}</a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav">
        <form action="{{url('invoice.cari')}}" method="post"> @csrf
        {{-- <li class="app-search">
          <input class="app-search__input" type="search" placeholder="Search" name="invoice">
          <button class="app-search__button" type="submit"><i class="fa fa-search"></i></button>
        </li> --}}
        </form>
        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
            {{-- <li><a class="dropdown-item" href="page-user.html"><i class="fa fa-cog fa-lg"></i> Settings</a></li> --}}
            <li><a class="dropdown-item" href="{{ route('admin.profil') }}"><i class="fa fa-user fa-lg"></i> Profile</a></li>
            <li><a class="dropdown-item" href="{{ route('admin.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out fa-lg"></i>  {{ __('Logout') }}</a></li>
            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST">
                    {{ csrf_field() }}
            </form>
          </ul>
        </li>
      </ul>
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar" style="background-color: {{env('THEME_COLOR_3')}}">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="{{asset(env('APP_LOGO', 'https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg'))}}" alt="User Image" style="max-height: 64px; max-width: 64px">
        <div>
          <p class="app-sidebar__user-name">Admin</p>

          <p class="app-sidebar__user-name"><small>Admin</small></p>
        </div>
      </div>
      <ul class="app-menu">

        <li><a class="app-menu__item {{(Request::is('admin'))? 'active': ''}}" href="{{route('admin.home')}}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>

        <li><a class="app-menu__item {{(Request::is('admin/berita') OR \Request::is('admin/berita/*'))? 'active': ''}}" href="{{route('admin.berita')}}"><i class="app-menu__icon fa fa-tasks"></i><span class="app-menu__label">Berita</span></a></li>

        <li><a class="app-menu__item {{(Request::is('admin/reporter') OR \Request::is('admin/reporter/*'))? 'active': ''}}" href="{{route('admin.reporter')}}"><i class="app-menu__icon fa fa-tasks"></i><span class="app-menu__label">Reporter</span></a></li>

        <li><a class="app-menu__item {{(Request::is('admin/video') OR \Request::is('admin/video/*'))? 'active': ''}}" href="{{route('admin.video')}}"><i class="app-menu__icon fa fa-tasks"></i><span class="app-menu__label">URL YouTube</span></a></li>
        <li><a class="app-menu__item {{(Request::is('admin/album') OR \Request::is('admin/album/*'))? 'active': ''}}" href="{{route('admin.album')}}"><i class="app-menu__icon fa fa-tasks"></i><span class="app-menu__label">Galeri</span></a></li>

        <li><a class="app-menu__item {{(Request::is('admin/literasi') OR \Request::is('admin/literasi/*'))? 'active': ''}}" href="{{route('admin.literasi')}}"><i class="app-menu__icon fa fa-tasks"></i><span class="app-menu__label">Literasi</span></a></li>
        {{-- <li><a class="app-menu__item {{(Request::is('admin/berita') OR \Request::is('admin/berita/*'))? 'active': ''}}" href="{{route('admin.berita')}}"><i class="app-menu__icon fa fa-newspaper-o"></i><span class="app-menu__label"> Berita</span></a></li> --}}
        <li><a class="app-menu__item {{(Request::is('admin/atribut') OR \Request::is('admin/atribut/*'))? 'active': ''}}" href="{{route('admin.atribut')}}"><i class="app-menu__icon fa fa-tasks"></i><span class="app-menu__label">Atribut</span></a></li>
        <li><a class="app-menu__item {{(Request::is('admin/iklan') OR \Request::is('admin/iklan/*'))? 'active': ''}}" href="{{route('admin.iklan')}}"><i class="app-menu__icon fa fa-tasks"></i><span class="app-menu__label">Iklan</span></a></li>
      </ul>
    </aside>
    @yield('content')

    <!-- Essential javascripts for application to work-->
    <script src="{{asset('back/js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('back/js/popper.min.js')}}"></script>
    <script src="{{asset('back/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('back/js/main.js')}}"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="{{asset('back/js/plugins/pace.min.js')}}"></script>
    <!-- Page specific javascripts-->

    <script src="{{asset('js/sweetalert.min.js')}}"></script>

    <!-- Google analytics script-->
    @yield('script')
    <script type="text/javascript">
      if(document.location.hostname == 'pratikborsadiya.in') {
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
        ga('create', 'UA-72504830-1', 'auto');
        ga('send', 'pageview');
      }
      $("form").submit(function(){
           $(this).find(':submit').prop('disabled', true);
      });
    </script>

    @if(Session::has('alert'))
    <script>
        swal({
          {!!Session::get('alert')!!}
        });
    </script>
    @endif
  </body>
</html>
