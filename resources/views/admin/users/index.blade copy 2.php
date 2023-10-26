@extends('admin.layouts.admin',['title'=> 'Gestion des comptes'])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
{{--               <div class="card-header card-header-info">
                <h4 class="card-title ">{{ __('Comptes ') }}</h4>
                <p class="card-category"> {{ (@$_GET['role']) ? $_GET['role'] : __('Tous les comptes') }}</p>
              </div> --}}
              <div class="card-body">
                @if (session('status'))
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                        <span>{{ session('status') }}</span>
                      </div>
                    </div>
                  </div>
                @endif
                <div class="row">
                  <div class="col-12 text-right">
                    {{-- <a href="{{ route('users.index') }}" class="btn btn-default btn-sm btn-red text-uppercase">
                    TOUS LES UTILISATEURS
                </a> --}}
                @foreach ($roles as $role)
                <a href="{{ route('users.index') }}?role={{ $role }}" class="btn btn-sm btn-default btn-amber text-uppercase">
                    {{ $role }} <span class="badge-success badge">{{ \App\User::role($role)->count()}}</span>
                </a>
                @endforeach

                <a href="{{ route('users.create') }}" class="btn btn-default btn-sm btn-green text-uppercase pull-right">
                    <i class="fa fa-user-plus"></i>
                </a>
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table">
                   <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Prenoms</th>
                            <th>Email</th>
                            {{-- <th>Contact</th> --}}
                            <th>Zone d'activité</th>
                            <th>Role</th>
                            <th>Statut</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $user['name'] }}</td>
                                <td>{{ $user['prenom'] }}</td>
                                <td>{{ $user['email'] }}</td>
                                {{-- <td>{{ $user['telephone'] }}</td> --}}
                                <td>
                                  @foreach($user['directions'] as $d)
                                    {{ $d['libelle'] }} ||| 
                                  @endforeach
                                  <br>
                                  Actif : {{ @$user['direction']['libelle'] }}
                                </td>
                                <td class="text-uppercase">{{ @$user->roles->first()->name  }}</td>
                                <td>
                                {{--@can('edit_users') --}}
                                 @if($user['id'] != 1)
                                  {!! Form::open(['method' => 'PUT', 'route' => ['users.update', $user['id']] ,'style'=>'display:inline-block !important;margin:0;']) !!}

                                <input  type="submit" class="btn btn-{{ ($user['statut'] == 'active')?'success':'default' }} btn-sm" name="statut" value="active">
                                <input  type="submit" class="btn btn-{{ ($user['statut'] == 'bloqué')?'warning':'default' }} btn-sm" name="statut" value="bloqué">
                                {{-- <input  type="submit" class="btn btn-{{ ($user['statut'] == 'supprimé')?'danger':'default' }} btn-sm" name="statut" value="supprimé"> --}}
                                  {!! Form::close() !!}
                                   @endif
                                  {{--@endcan --}}
                                </td>
                                <td>                                
                                    {{--@can('view_users') --}}
                                      <a href="{{ route('users.show',[$user['id']]) }}" class="btn btn-info btn-sm"><i class="nc-icon nc-circle-10"></i> Modifier</a>
                                    {{--@endcan --}}
                                  @if($user['id'] != 1)
                                    {{--@can('delete_users') --}}
                                    {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user['id']] ,'style'=>'display:inline-block !important;margin:0;float:right;','onsubmit'=>'return show_alert();' ]) !!}
                                        <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i>Supprimer</button>
                                    {!! Form::close() !!}
                                    {{--@endcan --}}
                                  @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                  </table>
                  {{ @$users->appends(request()->except('page'))->links() }}
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection