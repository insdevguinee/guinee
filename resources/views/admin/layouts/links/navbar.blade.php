@php
  $admin = Auth::user()->hasRole('Admin|admin');
@endphp
<nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent" style="background:{{ Auth::user()->statut == 'attente' ? '#ffdb8f' : ' #fff' }} !important;position: fixed;">
        <div class="container-fluid">

          <div class="navbar-wrapper">
            <a class="navbar-brand" href="{{ route('admin') }}">
              <img src="{{ asset('img/partenaires/logo_1.jpeg') }}" alt="UBF" style="height: 60px;">
            </a>
             <form action="{{ route('direction') }}" method="POST">
                @csrf
              <select name="direction" id="direction">
                @foreach(Auth::user()->directions()->get() as $direction)
                <option value="{{ $direction->id }}" {{ ($direction->id == session('direction'))?'selected':' ' }}>{{ $direction->libelle }}</option>
                @endforeach
              </select>
              <input type="submit" value="OK">
              </form>
               ||||
            {{-- <span class="text-capitalize">{{ Auth::user()->direction->libelle  }} </span> --}}
              <form action="{{ route('campagne') }}" method="POST">
                @csrf
              <select name="campagne" id="campagne">
                @foreach(\App\Campagne::get() as $campagne)
                <option value="{{ $campagne->name }}" {{ ($campagne->name == session('campagne'))?'selected':' ' }}>{{ $campagne->name }}</option>
                @endforeach
              </select>
              <input type="submit" value="OK">
              </form>
            </span>
          </div>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav float-left">
              <li class="nav-item {{ active(route('admin'),'active') }}"><a href="{{ route('admin') }}" class="nav-link">Accueil</a></li>
               <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle" id="Gestion" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Personnels
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="Gestion">
                  <a class="dropdown-item" href="{{ route('personnels.index') }}">Agents en activité</a>
                  <a class="dropdown-item" href="{{ route('personnels.attente') }}">Agents en attente</a>
                  <a class="dropdown-item" href="{{ route('personnels.formation') }}">Agents en formation</a>
                  <hr style="margin: 0;">
<!--                   <a class="dropdown-item" href="{{ route('personnels.import') }}">Importer du personnel</a>
 -->                  <a href="{{route('export.personnels')}}"  class="dropdown-item">Exporter les données</a>
                  <hr style="margin: 0;">
                  <a class="dropdown-item" href="{{ route('abscences.index') }}">Gestion de presence</a>
                </div>
              </li>
              
              <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle" id="Gestion" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Finances
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="Gestion">
                  {{-- <a class="dropdown-item" href="{{ route('personnels.index') }}">Personnels</a> --}}

                 {{--  <a class="dropdown-item" href="{{route('caisses.index')}}">Enregistrement Comptable</a> --}}
                  <a class="dropdown-item" href="{{route('depenses.index')}}">Depenses</a>
                    <hr style="margin: 0;">
                   {{-- <a class="dropdown-item" href="{{ route('abscences.index') }}">Gestion de presence</a> --}}

                  <hr style="margin: 0;">
                   <a href="{{route('budgets.index')}}"  class="dropdown-item">Budgets</a>
                  {{-- <a class="dropdown-item" href="{{ route('personnels.attente') }}">Personnels en attente</a> --}}
                  {{-- <a class="dropdown-item" href="{{ route('personnels.formation') }}">Personnels en formation</a> --}}
                </div>
              </li>


               <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle" id="paiement" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Paiements
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="paiement">
                  {{-- <a class="dropdown-item" href="{{ route('personnels.index') }}">Personnels</a> --}}

                  <a href="{{ route('paies.index') }}"  class="dropdown-item">Personnel en Activité</a>
                  <a href="{{ route('paies.index',['personnel'=>'formations']) }}"  class="dropdown-item">Personnel en formation</a>
                  @can('pdfPaies_downloads')
                  <hr style="margin: 0;">
                  <a href="{{route('export.paiements')}}"  class="dropdown-item">Exporter les données PDF</a>
                  @endcan
                </div>
              </li>
              {{--   <li class="nav-item">
                 <a href="{{route('budgets.index')}}"  class="nav-link">Budget</a>
              </li> --}}
               {{-- <li class="nav-item">
                <a href="{{ route('paies.index') }}" class="nav-link">Paiement</a>
              </li> --}}

              @if(auth()->check())  
                @php
                    $user = auth()->user();  
                @endphp
                <li class="nav-item btn-rotate dropdown">
                  <a class="nav-link dropdown-toggle" id="Logistique" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Logistique
                  </a>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="Logistique">
                    <a class="dropdown-item" href="{{ route('fournisseurs.index') }}">Gestion Fournisseurs</a>
                    <a href="https://stock.rgph.gov.gn/auth/{{$user->uuid}}" class="dropdown-item">Gestion Stock</a> 
                  </div>
                </li>
              @endif

              {{--@if (Auth::user()->hasRole('admin|Admon')) --}}
              <li class="nav-item"> <a href="{{ route('recap') }}" class="nav-link">Recap</a> </li>
              <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle" id="admin" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Admin
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="admin">
                  <a class="dropdown-item" href="{{ route('users.index') }}">Utilisateurs</a>
                  <a class="dropdown-item" href="{{ route('directions.index') }}">Zone d'activité</a>
                  <hr style="margin: 0;">
                  <a class="dropdown-item" href="{{ route('roles.index') }}">Roles</a>
                  <a class="dropdown-item" href="{{ route('permissions.index') }}">Permissions</a>
                   <hr style="margin: 0;">
                   <a class="dropdown-item" href="{{ route('config.index') }}">Configuration</a>
                   <hr style="margin: 0;">
                </div>
              </li>
              {{--@endif --}}
            </ul>
            {{-- <form>
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Recherche de réference...">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <i class="nc-icon nc-zoom-split"></i>
                  </div>
                </div>
              </div>
            </form> --}}
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link btn-magnify" href="{{ route('index') }}">
                  <i class="nc-icon nc-layout-11"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Font</span>
                  </p>
                </a>
              </li>
              <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="nc-icon nc-circle-10"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Profil</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="{{ route('users.edit',[Auth::id()]) }}">Mon profil</a>

                  <hr style="margin: 0px;">
                  <a class="dropdown-item" href="#">Infos pratiques</a>
                   <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Deconnexion') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
