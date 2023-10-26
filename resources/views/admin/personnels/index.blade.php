@extends('admin.layouts.admin',['title'=>'Agents en Activité ('.$stat['total_personnels'].')' ])
@section('style')

<style>
  #table_id_filter label{
    float: right;
  }
</style>

@endsection
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <div class="col-12">
            <form action="{{ route('personnels.index') }}" method="GET" class="input-group no-border">
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
    <div class="row">
  <div class="col-12 float-right">
    <a href="{{ route('personnels.formation') }}" class="btn btn-info btn-sm">Agents en Formation</a>
    <a href="{{ route('personnels.attente') }}" class="btn btn-warning btn-sm">Agents en Attente</a>
    <a href="{{ route('personnels.index') }}" class="btn btn-success btn-sm">Agents en Activité</a>

    <a href="{{ route('export.all.personnels',[2, @$_GET['fonction'], @$_GET['direction']]) }}" class="btn btn-default btn-sm float-right"> <i class="fa fa-download" aria-hidden="true"></i> Exporter tous en Excel</a>    
    <a href="{{ route('personnels.generateallompdf', [10]) }}" class="btn btn-default btn-sm float-right d-none"> <i class="fa fa-print"></i> Générer tous pdf</a>       
  </div>
</div>
    <div class="card">
      <div class="card-body">

        <div class="row">
        <div class="col-8">
          <a href="{{ route('personnels.index') }}" class="btn btn-success btn-sm">Effectif des Agents en Activité</a>
          <form action="{{ route('personnels.index') }}" method="GET" style="display: inline-flex;">
            <select class="form-control" name="fonction" >
              <option value="">LISTE DES FONCTIONS</option>
              @foreach ($fonctions as $fonction)
                <option value="{{ $fonction->libelle }}" {{ ($fonction->libelle == @$_GET['fonction'])? 'selected':'' }}>
                  @php
                    if (Auth::user()->can('all_personnels') OR Auth::user()->hasRole('admin|Admin')){
                      $count_p = @\App\personnel::active()->where('fonction_id',$fonction->id)->count();
                    }else{
                      $count_p = @\App\personnel::active()->where([['fonction_id',$fonction->id],['direction_id',Auth::user()->direction->id]])->count();
                    }
                  @endphp

                  {{ $fonction->libelle.' ('.$count_p.')'}}
                </option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-sm">Valider</button>
          </form>
        </div>          
        <div class="col-4 text-right"> 

          <form action="{{ route('personnels.active.activite') }}" method="POST" style="display: inline-flex;">
            @csrf
            <input type="number" id="" class="form-control form-control-sm text-center" name="number" placeholder="definir le nombre" min="1" required />

            <button type="submit" class="btn">Valider</button>
          </form>

        </div>
        </div>
       
        <!-- <button type='button' class="btn btn-sm btn-default float-right" data-toggle="modal" data-target="#newPersonnel">
          Ajouter un personnel
        </button> -->
        <hr>
        <div class="clearfix"></div>
        <div class=" table-responsive">
          {{ $personnels->links() }}
        <table class="table table-bordered table-hover" id="table_id">
          <thead>
            <tr>
              <th>matricule</th>
              <th>prenoms</th>
              <th>nom</th>
              <th>fonction</th>
              <th>numero orange money</th>
              <th>contact</th>
              <th>zone d'activité</th>
              <th>N°Eq</th>
              <th>Ordre de mission</th>
              <th>notes</th>
              <th>statut</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($personnels as $personnel)
              <tr>
                <td> <a href="#"> {{ $personnel->matricule }} </a> </td>
                <td>{{ $personnel->prenoms }}</td>
                <td>{{ $personnel->nom }}</td>
               
                <td>{{ @$personnel->fonction->libelle }}</td>
                <td>{{ $personnel->mm_numero }}</td>
                <td>{{ $personnel->contact }}</td>
                <td>
                  
                   @foreach(App\Affectation::where('personnel_id', '=', $personnel->id)->get() as $p)
                    {{App\Direction::where('id', '=', $p->direction_id)->first()->libelle }} <a href="{{route('supprimer.affectation', $p->id)}}"> <sup><i class="fa fa-times fa-sm text-danger"></i></sup> </a> <br>
                   @endforeach
                  
                </td>
                <td>
                   @foreach(App\Affectation::where('personnel_id', '=', $personnel->id)->get() as $p)
                    {{$p->team_number}} <br>
                   @endforeach
                </td>
                <!-- <td class="text-center">
                  @php
                      $teams = explode(",", $personnel->numero_equipe);
                  @endphp
                  @foreach ($teams as $team)
                  {{-- <a href="{{ route('pdfom',[$personnel->id]) }}" class=""> //$team <i class="fa fa-download"></i></a> &nbsp; --}}
                  <a href="{{ route('pdfordremission', [$personnel->id, $team]) }}" class=""> <?= $team ?> <i class="fa fa-download"></i></a> &nbsp;
                  @endforeach
                </td> -->
                <td class="text-center">
                  @php
                      //$teams = $personnel->directions();
                  @endphp

                  @if($personnel->fonction_id == 21 || $personnel->fonction_id == 22)
                    <a href="{{ route('pdfom1',[$personnel->id]) }}" class=""><i class="fa fa-download"></i></a>
                  @elseif($personnel->fonction_id == 1000)
                    <!-- load -->

                  @else
                    <!-- <a href="{{ route('pdfom2',[$personnel->id]) }}" class=""><i class="fa fa-download"></i></a> -->
                    @foreach ($personnel->directions as $affection)
                    <a href="{{ route('pdfordremission', [$affection->pivot->direction_id, $affection->pivot->team_number]) }}" class=""> 
                      <?= $affection->pivot->team_number ?> <i class="fa fa-download"></i>
                    </a> &nbsp;
                    @endforeach
                    
                  @endif

                </td>
                <td>{{ $personnel->note }}</td>
                <td>
                  @can('edit_personnels')
                    <a href="{{ route('personnels.edit',[$personnel->id]) }}" title="Modifier" class="btn btn-info btn-sm">M<i class="fa fa-edit"></i></a>
                    {{-- 
                    {!! Form::open(['method' => 'PUT', 'route' => ['personnels.update', $personnel->id] ,'style'=>'display:inline-block !important;margin:0;']) !!}
                      <input  type="submit" class="btn btn-warning btn-sm" onclick="return show_alert();" value="Attente" name='etat'>
                    {!! Form::close() !!}
                    
                    {!! Form::open(['method' => 'PUT', 'route' => ['personnels.update', $personnel->id] ,'style'=>'display:inline-block !important;margin:0;']) !!}
                      <input  type="submit" class="btn btn-default btn-sm" onclick="return show_alert();" value="Formation" name='etat'>
                    {!! Form::close() !!}
                    --}}
                  @endcan

                  @can('delete_personnels')
                  {!! Form::open(['method' => 'PUT', 'route' => ['personnels.update', $personnel->id] ,'style'=>'display:inline-block !important;margin:0;']) !!}
                  <input type="submit" class="btn btn-danger btn-sm" onclick="return show_alert();" value="X" name='etat'>
                  {!! Form::close() !!}
                  {{-- 
                    {!! Form::open(['method' => 'DELETE', 'route' => ['personnels.destroy', $personnel->id] ,'style'=>'display:inline-block !important;margin:0;','onsubmit'=>'return show_alert();']) !!}
                    <input type="submit" onsubmit='return show_alert();' class="btn btn-danger btn-sm" name="statut" value="X" />
                    {!! Form::close() !!}
                    --}}
                  @endcan
                </td>
              </tr>
            @endforeach
          </tbody>
          </table>
        </div>
        {{ $personnels->links() }}

      </div>
    </div>
  </div>
</div>
  <div class="modal fade" id="newPersonnel">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title text-center">Ajouter une nouvelle personne</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Fermer</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('personnels.store') }}" method="post">
            @csrf
            <div class="container">
              <div class="row" id="tablePersonnelAdd">
                
                <div class="form-group col-md-6" >  <label for="matricule">matricule</label>

                 <input value="{{ old('matricule') }}" class="form-control  @error('matricule') is-invalid @enderror" type="text" name="matricule" id="matricule"> 
                  @error('matricule')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ @$message }}</strong>
                      </span>
                  @enderror

               </div>
                <div class="form-group col-md-6" >  <label for="nom">nom</label>

                 <input value="{{ old('nom') }}" class="form-control  @error('nom') is-invalid @enderror" type="text" name="nom" id="nom"> 
                  @error('nom')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ @$message }}</strong>
                      </span>
                  @enderror

               </div>
                <div class="form-group col-md-6" >  <label for="prenoms">prenoms</label>

                 <input value="{{ old('prenoms') }}" class="form-control  @error('prenoms') is-invalid @enderror" type="text" name="prenoms" id="prenoms"> 
                  @error('prenoms')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ @$message }}</strong>
                      </span>
                  @enderror

               </div>
                <div class="form-group col-md-6" >  <label for="fonction">fonction</label>
                 <select name="fonction" id="fonction" class="form-control @error('fonction') is-invalid @enderror">
                   @foreach ($fonctions as $fonction)
                     <option value="{{ $fonction->id }}" class="text-uppercase">{{ $fonction->libelle }}</option>
                   @endforeach
                 </select>
                  @error('fonction')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ @$message }}</strong>
                      </span>
                  @enderror

               </div>
                <div class="form-group col-md-6" >  <label for="mm_numero">numero_mobile money</label>

                 <input value="{{ old('mm_numero') }}" class="form-control  @error('mm_numero') is-invalid @enderror" type="text" name="mm_numero" id="mm_numero"> 
                  @error('mm_numero')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ @$message }}</strong>
                      </span>
                  @enderror

               </div>
                <div class="form-group col-md-6" >  <label for="contact">contact</label>

                 <input value="{{ old('contact') }}" class="form-control  @error('contact') is-invalid @enderror" type="text" name="contact" id="contact"> 
                  @error('contact')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ @$message }}</strong>
                      </span>
                  @enderror

               </div>
                <div class="form-group col-md-6" >  <label for="direction_id">Zone d'activité</label>

                 {{-- <input value="{{ old('direction_id') }}" class="form-control  @error('direction_id') is-invalid @enderror" type="text" name="direction_id" id="direction_id">  --}}
                 <select name="direction_id" id="direction" class="form-control">
                  @foreach($directions as $direction)
                   <option value="{{ $direction->id }}">{{ $direction->libelle }}</option>
                  @endforeach
                 </select>
                  @error('direction_id')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ @$message }}</strong>
                      </span>
                  @enderror

               </div>
                <div class="form-group col-md-6" >  <label for="numero_equipe">numero_equipe</label>

                 <input value="{{ old('numero_equipe') }}" class="form-control  @error('numero_equipe') is-invalid @enderror" type="number" name="numero_equipe" id="numero_equipe"> 
                  @error('numero_equipe')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ @$message }}</strong>
                      </span>
                  @enderror

               </div>
                         <div class="clearfix"></div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <button type="submit" class="btn btn-success float-right">Enregister</button>
                {{-- <button type="button" class="btn btn-primary float-left" id="newRow">Ajouter une ligge</button> --}}
                <button type="reset" class="btn btn-default float-right">Annuler</button>
              </div>
            </div>
          </form>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

@endsection
@section('script')
<script type="text/javascript" charset="utf8" src="{{ asset('plugin/DataTables/DataTables-1.10.21/js/jquery.dataTables.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugin/DataTables/datatables.min.js') }}"></script>
<script>
  $(document).ready(function() {
    $('#table_id').DataTable();
   });
</script>
@endsection