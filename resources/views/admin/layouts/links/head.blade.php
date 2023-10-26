<meta charset="utf-8" />
  
  <link rel="icon" type="image/png" href="{{ env('APP_FACIVON') }}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}

  <title>{{ config('app.name', 'UBF') }}</title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  
  <script src="https://use.fontawesome.com/9c74960bc3.js"></script>

  <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
  <!-- CSS Files -->
  <link href="{{ asset('admin/css/bootstrap.min.css')}}" rel="stylesheet" />
  <link href="{{ asset('admin/css/paper-dashboard.css')}}?v=2.0.0" rel="stylesheet" />
  <link href="{{ asset('admin/tl/tl.css')}}" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
  @yield('style')