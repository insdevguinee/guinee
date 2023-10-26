<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <title>Connexion - {{ env('APP_NAME') }} DEMO</title>
    <link rel="icon" type="image/png" href="{{ env('APP_FACIVON') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('admin/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/styles.css" />
  </head>
  <body>

    <div class="jumbotron mb-0 d-flex align-items-center flex-column justify-content-center text-center min-100" id="header" style="background-image: url({{asset('img/bg2.jpg')}});background-size: cover;background-repeat: no-repeat;">
     <!--   <img src="{{ asset(env('APP_FACIVON')) }}" alt="" style="height: 50px;"> -->
      <p class="text-black-50"> UBF</p>
      <h4 class="text-light">Connexion</h4>
      <div class="lead">
          <div class="row">
            <div class="col-md-12 mt-auto mr-auto ml-auto">
              <div class="card bg-faded border-0 mb-3">
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}" style="width: 100% !important">
                        @csrf

                        <div class="form-group row">
                       
                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
                            </div>
                        </div>

                        <div class="form-group row">
                        
                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Mot de passe">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ @$message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Connexion') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                       Mot de passe oublié ?
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                    </div>
                  </div>
                       @error('email')
                                   <div class="card-body">
                                      <span class="invalid-feedback" role="alert">
                                        <strong>{{ @$message }}</strong>
                                    </span>
                                   </div>
                                @enderror
            </div>
          </div>
         
      </div>
       <div class="row mt-4">
            <div class="col-md-12">
              <h4></h4>
              <div id="partenaire">
                <img src="{{ asset('img/partenaires/logo_1.jpeg') }}" style="height: 100px;border-radius: 30px;">
              </div>
              
            </div>
          </div>

  </div>

  @include('flash::message')
  <script src="{{ asset('admin/js/core/jquery.min.js')}}"></script>
  <script src="{{ asset('admin/js/core/bootstrap.min.js')}}"></script>
  <script src="{{ asset('admin/js/core/popper.min.js')}}"></script>
  <script>
    $('#flash-overlay-modal').modal();
  </script>
</html>