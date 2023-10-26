@extends('admin.layouts.admin')
@section('content')

<div class="row">
  <div class="col-md-4">
    <div class="card card-user">
      <div class="image">
        <img src="{{ env('APP_LOGO') }}">
      </div>
      <div class="card-body">
        <div class="author">
          <a href="#">
            <img class="avatar border-gray" src="{{ asset($user->photo) }}" alt="...">
            <h5 class="title">{{ $user->name.' '.$user->prenom }}</h5>
          </a>
          <p class="description">
            {{ $user->email }}
          </p>
        </div>
        <p class="description text-center">
          Contact : {{ $user->phone }}<br>
          Zone d'activité : {{ @$user->direction->libelle }} <br>
          Role : {{ $user->roles->first()->name }}
        </p>
      </div>
      <div class="card-footer">
        <hr>
        <div class="button-container">
          <div class="row">
            <div class="col-lg-3 col-md-6 col-6 ml-auto">
              {{-- <h5>12<br><small>Files</small></h5> --}}
            </div>
            <div class="col-lg-4 col-md-6 col-6 ml-auto mr-auto">
              <h5>{{ @$user->direction->personnels->count() }}<br><small>Personnels</small></h5>
            </div>
            <div class="col-lg-3 mr-auto">
              {{-- <h5>24,6$<br><small>Spent</small></h5> --}}
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Membres de léquipe</h4>
      </div>
      <div class="card-body">
        <ul class="list-unstyled team-members">
          @if(!empty($users ))
          @foreach($users as $u)

          <li>
            <div class="row">
              <div class="col-md-2 col-2">
                <div class="avatar">
                  <img src="{{ asset($u->photo) }}" alt="Image" class="img-circle img-no-padding img-responsive">
                </div>
              </div>
              <div class="col-md-7 col-7">
                {{ $u->name.' '.$u->prenom }}
                <br>
                <span class="text-muted"><small>{{ $u->roles->first()->name  }}</small></span>
              </div>
              <div class="col-md-3 col-3 text-right">
                <a href="{{ route('users.show',$u->id) }}" class="btn btn-sm btn-outline-success btn-round btn-icon"><i class="fa fa-eye"></i></a>
              </div>
            </div>
          </li>
          @endforeach
          @endif
        </ul>
      </div>
    </div>
  </div>
  <div class="col-md-8">
    <div class="card card-user">
      <div class="card-header">
        <h5 class="card-title">Modifier le profil</h5>
      </div>
       
      <div class="card-body">
        {!! Form::open(['method' => 'PUT', 'route' => ['users.update', $user->id] ]) !!}
          <div class="row">
            <div class="col-md-6 pr-1">
              <div class="form-group">
                <label>Email (desactivé)</label>
                <input type="text" class="form-control" disabled="" placeholder="email" value="{{ $user->email }}">
              </div>
            </div>
            <div class="col-md-6 pl-1">
              <div class="form-group">
                <label>Contact</label>
                <input type="text" class="form-control" placeholder="Contact" value="{{ $user->phone }}" name="phone">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 pr-1">
              <div class="form-group">
                <label>Nom</label>
                <input type="text" class="form-control" value="{{ $user->name }}" name="name">
              </div>
            </div>
            <div class="col-md-6 pl-1">
              <div class="form-group">
                <label>Prenom(s)</label>
                <input type="text" class="form-control" name="prenom" value="{{ $user->prenom }}">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="update ml-auto mr-auto">
              <button type="submit" class="btn btn-primary btn-round">Mettre à jour</button>
            </div>
          </div>
        {!! Form::close() !!}
      </div>
    </div>

    <div class="card card-user">
      <div class="card-header">
        <h5 class="card-title">Mot de passe</h5>
      </div>
       
      <div class="card-body">
        {!! Form::open(['method' => 'PUT', 'route' => ['users.update', $user->id] ]) !!}
          <div class="row">
            <div class="col-md-6">
               <div class="form-group">
                <label for="motdepasse">Mot de passe</label>
                <input type="password" class="form-control" placeholder="modifier le mot passe" name="newPassword">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="motdepasse">Confirmation</label>
                <input type="password" class="form-control" placeholder="repeter le mot passe" name="newPassword_confirmation">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="update ml-auto mr-auto">
              <button type="submit" class="btn btn-primary btn-round">Mettre à jour</button>
            </div>
          </div>
        {!! Form::close() !!}
      </div>
    </div>

    @if(Auth::user()->hasRole('admin|Admin'))
    <div class="card card-user">
      <div class="card-header">
        <h5 class="card-title">Zone d'activité</h5>
      </div>
       
      <div class="card-body">
        <form action="{{ route('setDirection') }}" method="POST">
          @csrf
          @foreach($directions as $direction)
          <div class="form-control d-inline-block" style="width: auto; margin: 10px;">
            <input type="checkbox" class="form-check-input" {{ (@$user->directions->contains(@$direction))?'checked':'' }} id="exampleCheck{{ @$direction->id }}" name="directions[]" value="{{ @$direction->id }}" >
            <input type="number" name="user" value="{{ $user->id }}" style="display: none;">
            <label class="form-check-label"  for="exampleCheck{{ @$direction->id }}">{{ @$direction->libelle }}</label>
          </div>
          @endforeach
         <div class="row">
            <div class="update ml-auto mr-auto">
              <button type="submit" class="btn btn-primary btn-round">Mettre à jour</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    @endif
  </div>
</div>
@endsection