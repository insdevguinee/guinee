<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  @include('layouts.links.head')
  <script src="{{ URL::to('assets/libs/jquery-ui-touch/jquery.ui.touch-punch.min.js')}}"></script>
</head>

<body> 
     <div class="container">
        @yield('content')
     </div>
  @include('layouts.links.foot')
  <script>
        var resizefunc = [];
    </script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

    <script src="{{ URL::to('assets/libs/jquery-ui-touch/jquery.ui.touch-punch.min.js')}}"></script>
    <script src="{{ URL::to('assets/libs/jquery-detectmobile/detect.js')}}"></script>
    <script src="{{ URL::to('assets/libs/jquery-animate-numbers/jquery.animateNumbers.js')}}"></script>
    <script src="{{ URL::to('assets/libs/ios7-switch/ios7.switch.js')}}"></script>
    <script src="{{ URL::to('assets/libs/fastclick/fastclick.js')}}"></script>
    <script src="{{ URL::to('assets/libs/jquery-blockui/jquery.blockUI.js')}}"></script>
    <script src="{{ URL::to('assets/libs/bootstrap-bootbox/bootbox.min.js')}}"></script>
    <script src="{{ URL::to('assets/libs/jquery-slimscroll/jquery.slimscroll.js')}}"></script>
    <script src="{{ URL::to('assets/libs/jquery-sparkline/jquery-sparkline.js')}}"></script>
    <script src="{{ URL::to('assets/libs/nifty-modal/js/classie.js')}}"></script>
    <script src="{{ URL::to('assets/libs/nifty-modal/js/modalEffects.js')}}"></script>
    <script src="{{ URL::to('assets/libs/sortable/sortable.min.js')}}"></script>
    <script src="{{ URL::to('assets/libs/bootstrap-fileinput/bootstrap.file-input.js')}}"></script>
    <script src="{{ URL::to('assets/libs/bootstrap-select/bootstrap-select.min.js')}}"></script>

  <script src="{{ URL::to('assets/js/select2.min.js') }}"></script>
    {{-- <script src="{{ URL::to('assets/libs/bootstrap-select2/select2.min.js')}}"></script> --}}
    <script src="{{ URL::to('assets/libs/magnific-popup/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{ URL::to('assets/libs/pace/pace.min.js')}}"></script>
    <script src="{{ URL::to('assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
    <script src="{{ URL::to('assets/libs/jquery-icheck/icheck.min.js')}}"></script>

    <script src="{{ URL::to('assets/libs/prettify/prettify.js') }}"></script>

    <script src="{{ URL::to('assets/js/init.js') }}"></script>
    <script src="{{URL::to('assets/js/scripts.js')}}"></script>
    <script>
        jQuery(document).ready(function($) {
            $.get('{{ route('commande.notif') }}', function(data) {
                console.log(data);
                $('.commande').text(data[1]);
                $('.ntfannuler').text(data[2]);
                $('.allnotif').text( data[1] + data[2] );
            });
        });
    </script>
    @yield('scripts')

</body>

</html>
