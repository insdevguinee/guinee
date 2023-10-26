@extends('admin.layouts.admin',['title'=>'Paiement' ])

@section('content')
<style>
  .disable{
    background: #9e9e9e;
  }
</style>
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <div class="col-12">
            <form action="{{ route('paies.index',['personnel'=>'formations']) }}" method="GET" class="input-group no-border">
            <input type="text" value="{{ @$_GET['search'] }}" name="search" class="form-control" placeholder="Recherche de matricule">
            <div class="input-group-append">
              <div class="input-group-text">
                <i class="nc-icon nc-zoom-split"></i>
              </div>
            </div>
            </form>
            <small>Appuyer sur <code>Entrer</code> pour valider la recherche</small>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-body">
        <div class="row">

            <div class="col-md-4">
          <form action="" method="GET" class="form-group">
          {{-- @csrf --}}
          <label for="">Mois</label>
          <select class="form-control" name="mois">
         @foreach (\App\Option::mois() as $m => $value)
           <option value="{{ $value }}" {{ ( isset($_GET['mois']) ) ? ( ($_GET['mois'] == $value)? 'selected' : ' ' ) : ( (date('m') == $value ) ? 'selected' : ' ' ) }} >{{ $m }}</option>
         @endforeach
        </select>
        <label for="">Fonction</label>
            <select class="form-control" name="fonction" >
                <option value="">Toutes les fonctions</option>
                @foreach ($fonctions as $f)
                    @php
                      if (Auth::user()->can('all_personnels') OR Auth::user()->hasRole('admin|Admin')){
                        if (isset($_GET['personnel'])) {
                            $users = @\App\personnel::formation()->where('fonction_id',$f->id)->count();

                        }else{

                            $users = @\App\personnel::active()->where('fonction_id',$f->id)->count();
                        }

                      }else{
                        if (isset($_GET['personnel'])) {
                            # code...
                            $users = @\App\personnel::formation()->where([['fonction_id',$f->id],['direction_id',Auth::user()->direction->id]])->count();
                        }else{

                            $users = @\App\personnel::active()->where([['fonction_id',$f->id],['direction_id',Auth::user()->direction->id]])->count();
                        }
                      }
                    @endphp
                    @if($users != 0)
                      <option value="{{ $f->libelle }}" {{ (@$_GET['fonction'] == $f->libelle) ? 'selected':' ' }}>
                    {{ $f->libelle.' ('.$users.')'}})
                    </option>
                    @endif

                  @endforeach
              </select>
            {{-- <button type="reset" class="btn btn-default">Annuler</button> --}}
            <a href="{{ route('paies.index') }}" class="btn btn-sm btn-default">Annuler</a>

            <button type="submit" class="btn btn-sm btn-info" onclick="spinner();">Valider</button>
           </form>
        </div>
        <div class="col-md-5"></div>
        <div class="col-md-3 float-right">
         {{--  @can('pdfPaies_downloads')
          <a href="#" class="btn btn-default btn-block btn-sm" onclick="spinner();">
             <i class="fa fa-setting" aria-hidden="true"></i> Configuration
          </a>
          @endcan --}}

          @can('add_paies')
          <a href="#" class="btn btn-default btn-block btn-sm" data-toggle="modal" data-target="#prime2">  <i class="fa fa-plus-circle" aria-hidden="true"></i> Enregistrer un montant</a>
          {{-- <a href="#" class="btn btn-success btn-block">Imprimer</a> --}}
          @endcan

          @can('xlsPaies_downloads')
          <a href="{{ route('exportPaie',['mois'=>(isset($_GET['mois'])? $_GET['mois'] : date('m')) , 'fonction'=> (isset($_GET['fonction'])? $_GET['fonction'] : 'all'),'personnel'=>(isset($_GET['personnel'])? 'formations' : false) ]) }}" class="btn btn-success btn-block btn-sm" onclick="spinner();">
             <i class="fa fa-download" aria-hidden="true"></i> Telecharger Excel
          </a>
          @endcan

          {{-- @can('pdfPaies_downloads')
          <a href="{{ route('pdf',['mois'=>(isset($_GET['mois'])? $_GET['mois'] : date('m')) , 'fonction'=> (isset($_GET['fonction'])? $_GET['fonction'] : 'all'),'personnel'=>(isset($_GET['personnel'])? 'formations' : false) ]) }}" class="btn btn-info btn-block btn-sm" onclick="spinner();">
             <i class="fa fa-download" aria-hidden="true"></i> Telecharger PDF
          </a>
          @endcan --}}

           @can('pdfPaies_downloads')
          <a href="{{ route('pdf',['mois'=>(isset($_GET['mois'])? $_GET['mois'] : date('m')) , 'fonction'=> (isset($_GET['fonction'])? $_GET['fonction'] : 'all'),'personnel'=>(isset($_GET['personnel'])? 'formations' : false) ]) }}" class="btn btn-info btn-block btn-sm" onclick="spinner();">
             <i class="fa fa-download" aria-hidden="true"></i> Telecharger PDF
          </a>
          @endcan

          {{-- <a href="{{ route('paies.index') }}" class="btn btn-success btn-block">Annuler</a> --}}
        </div>
        </div>
        <table class="table table-bordered table-hover table-responsive" id="table_id">
          <thead>
            <tr class="text-capitalize">
              <th>matricule</th>
              <th>nom prenoms</th>
              <th>fonction</th>
              <th>mm_numero</th>
              <th class="{{ (@$config['salaire'] == 0 ) ? 'disable':''}} ">salaire brut</th>
              <th>sp</th>
              <th class="{{ (@$config['transport'] == 0 ) ? 'disable':''}} ">Transport</th>
              <th class="{{ (@$config['mise_route'] == 0 ) ? 'disable':''}} ">Mise en route</th>
              <th class="{{ (@$config['prime'] == 0 ) ? 'disable':''}} ">prime</th>
              <th class="{{ (@$config['conges'] == 0 ) ? 'disable':''}} ">conges</th>
              <th class="{{ (@$config['gratification'] == 0 ) ? 'disable':''}} ">gratification</th>
              <th class="{{ (@$config['carburant'] == 0 ) ? 'disable':''}} ">carburant</th>
              <th class="{{ (@$config['communication'] == 0 ) ? 'disable':''}} ">communication</th>
              <th class="{{ (@$config['perdiem'] == 0 ) ? 'disable':''}} ">perdiem</th>
              <th class="{{ (@$config['internet'] == 0 ) ? 'disable':''}} ">internet</th>
              <th class="{{ (@$config['guide'] == 0 ) ? 'disable':''}} ">Guide</th>
              @if (@$_GET['personnel'] != 'formations')
                  
              <th>Brute Fiscal /mois</th>
              <th>Nbre Jours</th>
              <th>BRUT Fiscal /Jour</th>
              <th class="{{ (@$config['prime_ni'] == 0 ) ? 'disable':''}} ">Primes non imposables</th>
              <th>Brut social</th>
              @endif
              <th>Frais / Salaire</th>
              <th class="{{ (@$config['avance'] == 0 ) ? 'disable':''}} ">Avance</th>
              <th>Salaire NET</th>
              <th>NET A PAYER</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($personnels as $personnel)
            <tr class="personnel">
              <td>{{$personnel['matricule'] }}
              
              </td>
              <td>{{$personnel['nom'] }}</td>
              <td>{{$personnel['fonction'] }}</td>
              <td>{{$personnel['mm'] }}</td>
              @if ($personnel['etat'] == 2)
              <td class="{{ (@$config['salaire'] == 0 ) ? 'disable':''}} ">{{$personnel['salaireformationbrute'] }}</td>
              @else
              <td class="{{ (@$config['salaire'] == 0 ) ? 'disable':''}} ">{{$personnel['salaireBrute'] }}</td>
              @endif
              
              <td >{{$personnel['direction'] }}</td>
              <td  class="{{ (@$config['transport'] == 0 ) ? 'disable':''}} ">{{@$personnel['transport']  }}</td>
              <td  class="{{ (@$config['mise_route'] == 0 ) ? 'disable':''}} ">{{@$personnel['mise_route'] }}</td>
              <td  class="{{ (@$config['prime'] == 0 ) ? 'disable':''}} ">{{@$personnel['prime'] }}</td>
              <td  class="{{ (@$config['conges'] == 0 ) ? 'disable':''}} ">{{@$personnel['conges'] }}</td>
              <td  class="{{ (@$config['gratification'] == 0 ) ? 'disable':''}} ">{{@$personnel['gratification'] }}</td>
              <td  class="{{ (@$config['carburant'] == 0 ) ? 'disable':''}} ">{{@$personnel['carburant'] }}</td>
              <td  class="{{ (@$config['communication'] == 0 ) ? 'disable':''}} ">{{@$personnel['communication'] }}</td>
              <td  class="{{ (@$config['perdiem'] == 0 ) ? 'disable':''}} ">{{@$personnel['perdiem'] }}</td>
              <td  class="{{ (@$config['internet'] == 0 ) ? 'disable':''}} ">{{@$personnel['internet'] }}</td>
              <td  class="{{ (@$config['guide'] == 0 ) ? 'disable':''}} ">{{@$personnel['guide'] }}</td>
              @if ($personnel['etat'] != 2)
              <td>{{@$personnel['b_fiscal'] }}</td>
              <td>{{@$personnel['jour'] }}</td>
              <td>{{@$personnel['brut_fical_jour'] }}</td>
              <td  class="{{ (@$config['prime_ni'] == 0 ) ? 'disable':''}} ">{{@$personnel['prime_ni'] }}</td>
              <td>{{$personnel['brut_social'] }}</td>
              @endif

              
              @if ($personnel['etat'] == 2)
              <td>{{\App\Option::calcul_frais_mtn( $personnel['salaireformation']) }} </td>
              @else
              <td>{{\App\Option::calcul_frais_mtn( $personnel['brut_social']) }} </td>
              @endif


              
              <td   class="{{ (@$config['avance'] == 0 ) ? 'disable':''}} ">{{@$personnel['avance'] }}</td>
              @if ($personnel['etat'] == 2)
              <td class="{{ (@$config['salaire'] == 0 ) ? 'disable':''}} ">{{$personnel['salaireformationbrute'] }}</td>
              @else
              <td>{{@$personnel['salairenet'] }}</td>
              @endif
              
              @if ($personnel['etat'] == 2)
              <td class="{{ (@$config['salaire'] == 0 ) ? 'disable':''}} ">{{$personnel['salaireformation'] }}</td>
              @else
              <td>{{@$personnel['salaire'] }}</td>
              @endif

             </tr>
            @endforeach
          </tbody>
        </table>
         {{-- {{ @$personnels->links() }} --}}
      @can('add_paies')
      <div class="modal fade" id="prime">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
              </button>
            </div>
            <div class="modal-body">
             <form action="{{ route('prime') }}" method="post">
              @csrf
              <div class="form-group">
                <label for="personnel">Matricule</label>
                <input type="text" name="personnel" mat="personnel" placeholder="Matricule" class="form-control" required>
              </div>

              <div class="form-group">
                <label for="prime">Type de prime</label>
                <select id="prime" name="primePaie" class="form-control" required>
                  <option>Selectionnez la prime</option>
                  @if(@$config['prime'] == 1 )
                  <option value="prime">Prime</option>
                  @endif

                  @if(@$config['transport'] == 1 )
                  <option value="transport">Transport</option>
                  @endif
                  @if(@$config['mise_route'] == 1 )
                  <option value="mise_route">Mise en route</option>
                  @endif
                  @if(@$config['conges'] == 1 )
                  <option value="conges">Congé</option>
                  @endif
                  @if(@$config['gratification'] == 1 )
                  <option value="gratification">Gratification</option>
                  @endif
                  @if(@$config['carburant'] == 1 )
                  <option value="carburant">Carburant</option>
                  @endif
                  @if(@$config['guide'] == 1 )
                  <option value="guide">Guide</option>
                  @endif
                  @if(@$config['communication'] == 1 )
                  <option value="communication">Communication</option>
                  @endif
                  @if(@$config['perdiem'] == 1 )
                  <option value="perdiem">Perdiem</option>
                  @endif
                  @if(@$config['internet'] == 1 )

                  <option value="internet">Internet</option>
                  @endif
                  @if(@$config['prime_ni'] == 1 )

                  <option value="prime_ni">Primes non imposables</option>
                  @endif
                  @if(@$config['avance'] == 1 )
                  <option value="avance">Avance</option>
                  @endif
                 </select>
              </div>

              <div class="form-group">
                <label for="montant">Montant</label>
                <input type="text" name="mois" value="{{ (@$_GET['mois']) ? @$_GET['mois']:date('m') }}" style="display: none;">
                <input type="text" name="prime" id="montant" class="form-control" placeholder="Montant">
              </div>

              <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
              <button type="submit" class="btn btn-primary">Enregistrer</button>
              
             </form>
             @can('pdfPaies_downloads')
             <form action="{{ route('export.paiements')}}"  method="POST">
              @csrf
              <input type="text" name="mois" value="{{ (@$_GET['mois']) ? @$_GET['mois']:date('m') }}" style="display: none;">
              <input type="text" name="personnel" value="{{ (isset($_GET['personnel'])? 'formations' : false) }}" style="display: none;">

              <input type="text" style="display: none" name="fonction" value="{{@$_GET['fonction']}}">

              <input type="text" name="matricule" mat="personnel" placeholder="Matricule" class="form-control" required>
              <button type="submit" class="btn btn-primary">Telecharger le rapport</button>
             </form>
              {{-- <a href="{{ route('pdf',['mois'=>(isset($_GET['mois'])? $_GET['mois'] : date('m')) , 'fonction'=> (isset($_GET['fonction'])? $_GET['fonction'] : 'all'),'personnel'=>(isset($_GET['personnel'])? 'formations' : false) , 'matricule'=>". class='matri' ."]) }}" class="btn btn-info btn-block btn-sm">
                <i class="fa fa-download" aria-hidden="true"></i>
              </a> --}}
              @endcan
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->

       <div class="modal fade" id="prime2">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
              </button>
            </div>
            <div class="modal-body">
             <form action="{{ route('prime') }}" method="post">
              @csrf
              <div class="form-group">
                <label for="fonction">Fonction</label>
                {{-- <input type="text" name="personnel" id="personnel" placeholder="Matricule" class="form-control" required> --}}
                <select name="fonction"  class="form-control">
                  <option value="*">--Fonction--</option>
                  @foreach ($fonctions as $f)
                    @php
                      if (Auth::user()->can('all_personnels') OR Auth::user()->hasRole('admin|Admin')){
                        $users = @\App\personnel::active()->where('fonction_id',$f->id)->count();
                      }else{
                        $users = @\App\personnel::active()->where([['fonction_id',$f->id],['direction_id',Auth::user()->direction->id]])->count();
                      }
                    @endphp
                    @if($users != 0)
                      <option value="{{ $f->id }}" {{ (@$_GET['fonction'] == $f->libelle) ? 'selected':' ' }}>
                    {{ $f->libelle }}
                    </option>
                    @endif

                  @endforeach
                </select>
              </div>

              <div class="form-group">
                <label for="prime">Type de prime</label>
                <select id="primePaie" name="primePaie" class="form-control" required>
                   <option>Selectionnez la prime</option>
                    @if(@$config['prime'] == 1 )
                    <option value="prime">Prime</option>
                    @endif

                    @if(@$config['transport'] == 1 )
                    <option value="transport">Transport</option>
                    @endif
                    @if(@$config['mise_route'] == 1 )
                    <option value="mise_route">Mise en route</option>
                    @endif
                    @if(@$config['conges'] == 1 )
                    <option value="conges">Congé</option>
                    @endif
                    @if(@$config['gratification'] == 1 )
                    <option value="gratification">Gratification</option>
                    @endif
                    @if(@$config['carburant'] == 1 )
                    <option value="carburant">Carburant</option>
                    @endif
                    @if(@$config['guide'] == 1 )
                    <option value="guide">Guide</option>
                    @endif
                    @if(@$config['communication'] == 1 )
                    <option value="communication">Communication</option>
                    @endif
                    @if(@$config['perdiem'] == 1 )
                    <option value="perdiem">Perdiem</option>
                    @endif
                    @if(@$config['internet'] == 1 )

                    <option value="internet">Internet</option>
                    @endif
                    @if(@$config['prime_ni'] == 1 )

                    <option value="prime_ni">Primes non imposables</option>
                    @endif
                    @if(@$config['avance'] == 1 )
                    <option value="avance">Avance</option>
                    @endif
                </select>
              </div>

              <div class="form-group">
                <input type="text" name="mois" value="{{ (@$_GET['mois']) ? @$_GET['mois']:date('m') }}" style="display: none;">
                <label for="montant">Montant</label>
                <input type="text" name="montant" class="form-control" placeholder="Montant">
              </div>
              @can('all_personnels')
               <div class="form-group">
                <label for="directions">Région</label>
                <select id="directions" name="direction" class="form-control">
                  @foreach($directions as $direction)
                  <option value="{{ $direction['id'] }}" class="text-capitalize">{{ $direction['libelle' ]}}</option>
                  @endforeach
                </select>
              </div>
              @endcan
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
              <button type="submit" class="btn btn-primary">Enregistrer</button>
             </form>
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->
      @endcan
      </div>
    </div>
  </div>
</div>
@endsection
@section('script')

<script type="text/javascript" charset="utf8" src="{{ asset('plugin/DataTables/DataTables-1.10.21/js/jquery.dataTables.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugin/DataTables/datatables.min.js') }}"></script>
@can('add_paies')
<script>
  $(document).ready(function() {

    $('#montant').focus(function(event) {
      var name = $('#prime option:selected').val();
      $(this).attr('name', name);
    });
    $('.personnel').click(function() {
      $('#prime').modal({
          show: true
        });
      var matricule = $(this).children('td:first-child').text();
      $("input[mat='personnel']").val(matricule);
    });
  });
</script>
@endcan

@endsection

@section('style')
<link rel="stylesheet" href="{{ url('https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugin/DataTables/datatables.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('plugin/DataTables/DataTables-1.10.21/css/jquery.dataTables.css') }}">
<style>
  .personnel{
    cursor: auto;
  }
</style>
@endsection
