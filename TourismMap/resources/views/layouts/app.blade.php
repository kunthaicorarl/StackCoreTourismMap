<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
     <link href="{{ asset('css/common.css') }}" rel="stylesheet">  
     <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
     <link href="{{ asset('libs/google-map/maps.css') }}" rel="stylesheet">  
     <link href="{{ asset('libs/alertify/alertify.css') }}" rel="stylesheet"/>  
     <script src="http://malsup.github.com/jquery.form.js"></script>   
     <link href="{{ asset('libs/alertify/default.css') }}" rel="stylesheet"/>
     <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet"/>     
     <script src="{{ asset('libs/alertify/alertify.js') }}"></script> 
     <script src="{{URL::asset('libs/sweetalert-master/dist/sweetalert.min.js')}}"></script>
     <link rel="stylesheet" type="text/css" href="{{URL::asset('libs/sweetalert-master/dist/sweetalert.css')}}">
   {{--  <script src="http://www.dropzonejs.com/js/dropzone.js?v=6"></script>  --}}
    {{--  <script src="{{URL::asset('libs/loadingoverlay/loadingoverlay.min.js')}}"></script>  
    <script src="{{URL::asset('libs/loadingoverlay/loadingoverlay_progress.min.js')}}"></script>    --}}
 </head>
<body>
    <div id="app">
   
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    <div class="container">
        @section('sidebar')
           @if (!Auth::guest())
       <div class="col-md-2 panel-default">
<ul class="nav nav-rb navbar-default sidebar panel panel-default nav-list">
       <li>
                            <a href="{{url('admin')}}" class="active"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                         <li>
                            <a href="{{url('admin/gallerys')}}" class="active"><i class="fa fa-table fa-fw"></i> Gallery</a>
                        </li>
                         <li>
                            <a class="accordion-heading" data-toggle="collapse" data-target="#subMedia">
      <span class="nav-header-primary"><i class="fa fa-wrench fa-fw"></i>  Media <b class="caret"></b></span>
    </a>
      <ul class="nav nav-list collapse" id="subMedia">
      <li><a href="{{url('admin/images')}}" title="Title">Images</a></li>
      <li><a href="#" title="Title">Videos</a></li>
    </ul>
                           
                        </li>
                         <li>
                            <a href="{{url('admin/provinces')}}" class="active"><i class="fa fa-table fa-fw"></i> Province</a>
                        </li>
                         <li>
                            <a href="{{url('admin/tourisms')}}" class="active"><i class="fa fa-dashboard fa-fw"></i> Tourisms</a>
                        </li>
  <li>
    <a class="accordion-heading" data-toggle="collapse" data-target="#submenu">
      <span class="nav-header-primary"><i class="fa fa-wrench fa-fw"></i>  Setting <b class="caret"></b></span>
    </a>
      <ul class="nav nav-list collapse" id="submenu">
      <li><a href="#" title="Title">Roles</a></li>
      <li><a href="#" title="Title">Permissions</a></li>
      <li><a href="/admin/users" title="Title">Users</a></li>
    </ul>
  </li>
</ul>

        {{-- <div class="navbar-default sidebar panel panel-default" role="navigation">
                <div class="sidebar-nav">
                    <ul class="nav in" id="side-menu">
                        <li>
                            <a href="{{url('admin')}}" class="active"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                         <li>
                            <a href="{{url('admin/provinces')}}" class="active"><i class="fa fa-dashboard fa-fw"></i> Province</a>
                        </li>
                         <li>
                            <a href="{{url('admin/tourisms')}}" class="active"><i class="fa fa-dashboard fa-fw"></i> Tourisms</a>
                        </li>
                        <li class="">
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Setting<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse" aria-expanded="false" style="height: 0px;">
                                <li>
                                    <a href="flot.html">Roles</a>
                                </li>
                                <li>
                                    <a href="morris.html">Permission</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                      
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div> --}}
        </div>
            @endif
        @show
        @yield('content')
    </div>
    </div>
    <!-- Scripts -->
    
  <script src="{{ asset('js/app.js') }}"></script> 
 
  {{-- <script src="{{ asset('js/jquery.min.js') }}"></script> 
  <script src="{{ asset('libs/formoid-solid-red.js') }}"></script>
  <link href="{{ asset('libs/formoid-solid-red.css') }}" rel="stylesheet">    --}}
  
</body>
</html>
