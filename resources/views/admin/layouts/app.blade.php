<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  @include('admin.layouts.links.head')
</head>

<body> 
	<div id="loader"></div>
     <div class="container">
        @yield('content')
     </div>
  @include('admin.layouts.links.foot')
</body>

</html>
