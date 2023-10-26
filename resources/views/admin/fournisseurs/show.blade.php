@extends('admin.layouts.admin',['title'=>'Caisse '.$fournisseur->name])
@section('style')
<!-- Pick a theme, load the plugin & initialize plugin -->
<link href="{{ asset('admin/dist/css/theme.default.min.css') }}" rel="stylesheet">
<style>
  .list_im{
    position: absolute;
    width: 92%;
    z-index: 1;
    height: 130px;
    overflow-y: auto;
  }

  .list_im .list-group-item{
    cursor: pointer;
  }
</style>
@endsection
@section('content')
<div class="row">
   <div class="col-lg-3 col-md-3 col-sm-6">
      <div class="card card-stats">
        <div class="card-body ">

          <div class="row">
            <div class="col-5 col-md-4">
              <div class="icon-big text-center icon-info">
                <i class="nc-icon nc-simple-remove text-warning"></i>
              </div>
            </div>
            <div class="col-7 col-md-8">
              <div class="numbers">
                <p class="card-category">{{$etat['debit']}}</p>
                <p class="card-title">DEBIT</p>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-3 col-md-3 col-sm-6">
      <div class="card card-stats">
        <div class="card-body ">
          <div class="row">
            <div class="col-5 col-md-4">
              <div class="icon-big text-center icon-info">
                <i class="nc-icon nc-simple-remove text-info"></i>
              </div>
            </div>
            <div class="col-7 col-md-8">
              <div class="numbers">
                <p class="card-category">{{$etat['credit']}}</p>
                <p class="card-title">CREDIT</p>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-3 col-md-3 col-sm-6">
      <div class="card card-stats">
        <div class="card-body ">
          <div class="row">
            <div class="col-5 col-md-4">
              <div class="icon-big text-center icon-info">
                <i class="nc-icon nc-money-coins text-info"></i>
              </div>
            </div>
            <div class="col-7 col-md-8">
              <div class="numbers">
                <p class="card-category">{{$etat['debit'] - $etat['credit']}}</p>
                <p class="card-title">TOTAL</p>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>

</div>
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <div class="col-md-3">
          @if(Auth::user()->hasRole('Admin|admin'))
            <form method="GET" action="">
            <label for="">Direction</label>
             <select class="form-control" name="direction" >
                <option value="">Toutes les directions</option>
                @foreach($directions as $direction)
                  <option value="{{ $direction->id }}" {{ ($direction->id == @$_GET['direction'])?'selected':'' }}>{{ $direction->libelle }}</option>
                @endforeach
              </select>
           <button type="submit" class="btn btn-sm btn-info" onclick="spinner();">Valider</button>
           </form>
          @endif
        </div>
        @can('add_caisses')
         <button type='button' class="btn btn-sm btn-default float-right" data-toggle="modal" data-target="#newData">
         <i class="fa fa-plus-circle" aria-hidden="true"></i> Faire un enregistrement
        </button>
        @endcan
{{--         <div class="row mb-3">
          <div class="col-md-2">
          <label for="">Date Debut</label>
          <input required type="date" name="date_start" id="date_start" class="form-control">
        </div>
        <div class="col-md-2">
          <label for="">Date Fin</label>
          <input required type="date" name="date_start" id="date_end" class="form-control">
        </div>
        <div class="col-md-3">
          <label for="">Rechercher un code</label>
          <input required type="text" name="search" id="search" class="form-control " placeholder="Code">
        </div>
        </div> --}}
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>Date</th>
              {{-- <th>Code</th> --}}
              <th>Imputation</th>
              <th>Libelle</th>
              @can('view_all_caisses')
              <th>DR</th>
              @endcan
              {{-- <th>Observation</th> --}}
              <th>N°Facture</th>
              <th>Ligne</th>
              <th>M. Paiement</th>
              <th width="100px">Reference Paiement</th>
              <th>Debit</th>
              <th>Credit</th>
              @can('view_all_caisses')
              <th>Creer Par</th>
              @endcan
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($fournisseur->caisses as $caisse)
              <tr>
                <td>{{ $caisse->date_en }}</td>
                {{-- <td>{{ $caisse->code }}</td> --}}
                
                <td>{{ @$caisse->imputation_id }}</td>
                <td>{{ $caisse->libelle }}</td>
                @can('view_all_caisses')

                <td>{{ @$caisse->direction->libelle}}</td>
                @endcan
                {{-- <td>{{ $caisse->observation }}</td> --}}
                <td>{{ $caisse->num_facture }}</td>
                
                <td>{{ $caisse->ligne_budget }}</td>
                <td>{{ $caisse->paiement }}</td>
                <td>{{ $caisse->ref_paiement }}</td>
                <td>{{ $caisse->debit}}</td>
                <td>{{ $caisse->credit }}</td>      
                @can('view_all_caisses')     
                <td>{{ @$caisse->user->name }}</td>     
                @endcan      
                <td><a href="{{ route('caisses.edit',[$caisse->id]) }}" title="Modifier">M<i class="fa fa-edit"></i></a></td>
              </tr>
            @endforeach
          </tbody>
          </table>
      </div>
    </div>
  </div>
</div>
{{-- Modal Caisse --}}
  <div class="modal fade" id="newData">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title text-center">Faire un enregistrement</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Fermer</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('caisses.store') }}" method="post">
            @csrf
            <div class="container">
              <div class="row">
                <div class="form-group col-md-6" >  <label for="matricule">Type d'opération</label>
                <select name="operation" id="operation" class="form-control">
                  <option value="debit">Débit</option>
                  <option value="credit">Crédit</option>
                </select>
               </div>
               <div class="form-group col-md-6" >  <label for="nom">Montant</label>

                 <input required value="{{ old('montant') }}" class="form-control  @error('montant') is-invalid @enderror" type="text" name="montant" id="montant"> 
                  @error('montant')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ @$message }}</strong>
                      </span>
                  @enderror

                </div>
                </div>
                <hr>
                <div class="row" >
                <div class="form-group col-md-6" >  <label for="nom">Date Enregistrement</label>

                 <input required value="{{ old('date_en') }}" class="form-control  @error('date_en') is-invalid @enderror" type="date" name="date_en" id="date_en"> 
                  @error('date_en')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ @$message }}</strong>
                      </span>
                  @enderror

               </div>
               <div class="form-group col-md-6" >  <label for="fonction">Ref. Paiement</label>
                <input required type="text" name="ref_paiement" class="form-control">

               </div>
                <div class="form-group col-md-6" >  <label for="imputation">Imputation</label>
                <input required type="text" class="form-control" name="imputation" id="imputation" autocomplete="off">
                  <div class="list_im" id="imp_res" style="display: none;">
                    <ul class="list-group">
                    </ul>
                  </div>
               </div>
                <div class="form-group col-md-6" >  <label for="fonction">Libellé</label>
                  <input required type="text" class="form-control" id="libelle" name="libelle">
               </div>
                <div class="form-group col-md-6" >  <label for="num_facture">N° Facture</label>

                 <input required value="{{ old('num_facture') }}" class="form-control  @error('num_facture') is-invalid @enderror" type="text" name="num_facture" id="num_facture"> 
                  @error('num_facture')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ @$message }}</strong>
                      </span>
                  @enderror

               </div>
                <div class="form-group col-md-6" >  
                  <label for="tiers">Fournisseur</label>

                 <select name="tiers" id="tiers" class="form-control">
                     <option value="{{ $fournisseur->id }}">{{ $fournisseur->name }}</option>
                 </select>

               </div>
                <div class="form-group col-md-6" >  <label for="ligne_budget">Ligne budget</label>

                 <input required value="{{ old('ligne_budget') }}" autocomplete="off" class="form-control  @error('ligne_budget') is-invalid @enderror" type="text" name="ligne_budget" id="ligne_budget"> 
                  @error('ligne_budget')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ @$message }}</strong>
                      </span>
                  @enderror
                  <div class="list_im" id="bud_res" style="display: none;">
                    <ul class="list-group">
                    </ul>
                  </div>
               </div>
                <div class="form-group col-md-6" >  <label for="numero_equipe">Type de paiement</label>
                <select name="paiement" id="paiement" class="form-control">
                  <option value="cheque">Chèque</option>
                  <option value="v_mtn">Virement MTN</option>
                  <option value="espece">Espece</option>
                </select>

               </div>
               <div class="form-group col-md-12">
                 <label for="description">Observation</label>
                 <textarea name="observation" id="observation" cols="30" rows="10" class="form-control"></textarea>
               </div>                      
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
 <script src="{{ asset('admin/dist/js/jquery.tablesorter.min.js') }}"></script>
  <script src="{{ asset('admin/dist/js/jquery.tablesorter.widgets.min.js') }}"></script>
  <script>
 /* $(function(){
    $('table').tablesorter({
      widgets        : ['zebra', 'columns'],
      usNumberFormat : false,
      sortReset      : true,
      sortRestart    : true
    });
  });*/
  $('#imputation').keyup(function() {
      var query = $(this).val(); 
      if (query.length >= 2 || query.length==0) {
        libelle_get(query); 
        $('#imp_res').show();
      }else{
          $('#imp_res').hide();
          $('#imp_res ul').html(" ");
      }
      if (query.length == 0 ) {
        $('#imp_res').hide();
        $('#imp_res ul').html(" ");
      } 
    }); 

  function libelle_get(query = '') {
      $.ajax({url: "{{ route('imputation') }}", 
        method: 'GET', 
        data: {'query': query}, 
        success:function(data){
          $('#imp_res ul').html(data);
           $('#imp_res li').click(function() {
              var code = $(this).children('span[data="code"]').text();
              var libelle = $(this).children('span[data="libelle"]').text();
              $('#imputation').val(code);
              $('#libelle').val(libelle);
              $('#imp_res').hide();
              $('#imp_res ul').html(" ");
           });
      } 
    }) 
  } 

  $('#ligne_budget').keyup(function() {
      var query = $(this).val(); 
      if (query.length >= 2 || query.length==0) {
        budget_get(query); 
        $('#bud_res').show();
      }else{
          $('#bud_res').hide();
          $('#bud_res ul').html(" ");
      }
      if (query.length == 0 ) {
        $('#bud_res').hide();
        $('#bud_res ul').html(" ");
      } 
    }); 

  function budget_get(query = '') {
      $.ajax({url: "{{ route('lignebudget') }}", 
        method: 'GET', 
        data: {'query': query}, 
        success:function(data){
          $('#bud_res ul').html(data);
           $('#bud_res li').click(function() {
              var code = $(this).text();
              $('#ligne_budget').val(code);
              $('#bud_res').hide();
              $('#bud_res ul').html(" ");
           });
      } 
    }) 
  } 
</script>
@endsection