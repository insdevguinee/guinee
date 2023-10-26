@extends('admin.layouts.admin',['title'=>'Creer un compte'])
@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('users.store') }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('post')

            <div class="card ">
              {{-- <div class="card-header card-header-success">
                <h4 class="card-title">{{ __('Creation de compte') }}</h4>
                <p class="card-category"></p>
              </div> --}}
              <div class="card-body ">
                <div class="row">
                  <div class="col-md-12 text-right">
                      <a href="{{ route('users.index') }}" class="btn btn-sm btn-success">{{ __('Retour à la liste') }}</a>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Nom') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Nom') }}" value="{{ old('name') }}" required="true" aria-required="true"/>
                      @if ($errors->has('name'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Prenom') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('prenom') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('prenom') ? ' is-invalid' : '' }}" name="prenom" id="input-prenom" type="text" placeholder="{{ __('Prenom') }}" value="{{ old('prenom') }}" required="true" aria-required="true"/>
                      @if ($errors->has('prenom'))
                        <span id="prenom-error" class="error text-danger" for="input-prenom">{{ $errors->first('prenom') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Email') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="input-email" type="email" placeholder="{{ __('Email') }}" value="{{ old('email') }}" required />
                      @if ($errors->has('email'))
                        <span id="email-error" class="error text-danger" for="input-email">{{ $errors->first('email') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label" for="input-password">{{ __(' Mot de passe') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" input type="password" name="password" id="input-password" placeholder="{{ __('Mot de passe') }}" value="" required />
                      @if ($errors->has('password'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('password') }}</span>
                      @endif
                    </div>
                  </div>
                </div>

                
                <div class="row">
                  <label class="col-sm-2 col-form-label" for="input-password-confirmation">{{ __('Confirme Mot de passe') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      <input class="form-control" name="password_confirmation" id="input-password-confirmation" type="password" placeholder="{{ __('Confirme Mot de passe') }}" value="" required />
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label" for="input-password">{{ __(' Direction') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                        <select name="direction_id" id="directions" class="form-control">
                            @foreach ($directions as $direction)
                                <option value="{{ $direction->id }}">{{ $direction->libelle }}</option>
                            @endforeach
                        </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label" for="input-password">{{ __(' Role') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                        <select name="roles" id="roles" class="form-control">
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                  </div>
                </div>


              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-success">{{ __('Creer') }}</button>
              </div>
            </div>
          </form>
            
        </div>
      </div>
    </div>
  </div>
@endsection