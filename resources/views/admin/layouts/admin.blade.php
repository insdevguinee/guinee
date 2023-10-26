<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  @include('admin.layouts.links.head')
</head>

<body class="" style="    background-color: #f4f3ef;">
  {{-- <div id="loader"></div> --}}
  <div class="wrapper ">
    <div class="main-panel">
      @include('admin.layouts.links.navbar')
      <div class="content">
         <div class="row">
          <div class="col-12">
            <h4 class="d-inline-block float-left" style="margin: 0px;">{{ @$title }}</h4>
            <div class="clearfix"></div>
            <hr>
          </div>
        </div>
        @yield('content')
            <!-- Button trigger modal -->
    {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#campagneModal">
      Launch demo modal
    </button> --}}

    @include('flash::message')
    @if(!session('campagne'))
    <!-- Modal -->
    <div class="modal fade" id="campagneModal" tabindex="-1" role="dialog" aria-labelledby="campagneModalTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-center" id="campagneModalTitle">Année Exercice</h5>
           {{--  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button> --}}
          </div>
           <form action="{{ route('campagne') }}" method="POST">
            @csrf
          <div class="modal-body">
              <div class="form-group">
                <select name="campagne" id="campagne" class="form-control">
                  @foreach(\App\Campagne::get() as $campagne)
                  <option value="{{ $campagne->name }}" {{ ($campagne->name == session('campagne'))?'selected':' ' }}>{{ $campagne->name }}</option>
                  @endforeach
                </select>
              </div>  
          </div>
          <div class="modal-footer justify-content-center">
            {{-- <button type="button" class="btn btn-primary" data-dismiss="modal">Annuler</button> --}}
            <button type="submit" class="btn btn-primary mb-auto">Valider</button>
          </div>
           </form>
        </div>
      </div>
    </div>
    @endif

      </div>
    
      <footer class="footer footer-black  footer-white ">
        <div class="container">
          <div class="row">
          
              <div class="col-12 text-center">
                {{-- <script>
                  document.write(new Date().getFullYear())
                </script>, {{ env('APP_NAME') }}   --}}
                {{-- @include('admin.layouts.us') --}}
              </div>
            
          </div>
        </div>
      </footer>
    </div>
  </div>

  @include('admin.layouts.links.foot')

  @yield('script')
   @if(!session('campagne'))
  <script>
    jQuery(document).ready(function($) {
      $('#campagneModal').modal(
        {
          show:true,
          backdrop: 'static',
          keyboard: false
       } )
    });
  </script>
  @endif
</body>

</html>
