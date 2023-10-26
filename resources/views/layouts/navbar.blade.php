<nav class="navbar navbar-light shadow-lg bg-light navbar-expand-md sticky-top">
    <div class="container">
        <a class="navbar-brand" href="#">
        <img src="{{ env('APP_LOGO') }}" alt="" style="height: 50px;">
      {{-- 👋 Hey! --}}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse" id="navbarNav">
            <ul class="navbar-nav justify-content-center">
               
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Categories
                    </a>
                    <div class="dropdown-menu w-auto shadow mt-2 mx-lg-2 p-0 mx-0" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item d-flex flex-nowrap align-items-center px-0 py-3" href="#">
                          <div class="flex-shrink-1 text-center px-3"><i class="far fa-user-circle fa-fw fa-2x"></i></div>
                          <div class="pl-0 pr-4">
                              <h5 class="mb-0">Settings</h5>
                              Changes options and profile 
                          </div>
                      </a>
                      <a class="dropdown-item d-flex flex-nowrap align-items-center px-0 py-3" href="#">
                          <div class="flex-shrink-1 text-center px-3"><i class="far fa-dot-circle fa-fw fa-2x"></i></div>
                          <div class="pl-0 pr-4">
                              <h5 class="mb-0">Favorites</h5>
                              View your saved items
                          </div>
                      </a>
                      <a class="dropdown-item d-flex flex-nowrap align-items-center px-0 py-3" href="#">
                          <div class="flex-shrink-1 text-center px-3"><i class="far fa-arrow-alt-circle-right fa-fw fa-2x"></i></div>
                          <div class="pl-0 pr-4">
                              <h5 class="mb-0">Heading</h5>
                              Some other item can go here
                          </div>
                      </a>
                    </div>
                </li>
                 <li class="nav-item"><a href="#" class="nav-link btn btn-outline-primary">Les opportunités</a></li>
                {{-- <li class="nav-item"><a href="#" class="nav-link">Link</a></li> --}}
            </ul>
            <ul class="navbar-nav ml-auto">
                
                {{-- <li class="nav-item"><a href="#modal1" data-toggle="modal" class="nav-link">Plus d'information</a></li> --}}
                @guest
               
                <li class="nav-item">
                    <a class="nav-link " href="{{ route('login') }}">Connexion</a>
                </li>
                 @if (Route::has('register'))
                    <li class="nav-item ">
                        <a class="nav-link btn btn-primary text-light" href="{{ route('register') }}">Inscription</a>
                    </li>
                @endif
                
            @else
                <li class="nav-item dropdown">
                      <a id="navbarDropdown" class="nav-link dropdown-toggle  btn btn-primary text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="padding: 10px 20px;">
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>
                    

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    {{--    
                        <a href="{{ route('permissions.index') }}"  class="dropdown-item ">
                       Permissions
                    </a>
                    <a href="{{ route('roles.index') }}"  class="dropdown-item ">
                       Roles
                    </a> --}}
                    <a href="{{ route('admin') }}"  class="dropdown-item ">
                       Tableau de bord
                    </a> 
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
               
            @endguest     
            </ul>
        </div>
    </div>
</nav>