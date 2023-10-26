@extends('admin.layouts.admin',['title'=>'Liste de fournisseur' ])
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">

        <button type='button' class="btn btn-sm btn-default float-right" data-toggle="modal" data-target="#newfournisseur">
          Ajouter un fournisseur
        </button>       

        <a href="{{ route('fournisseurs.import') }}" class="btn btn-sm btn-info float-right" style="margin-left: 10px;"> Importer des Fournisseurs  </a>       

        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>Code Fournisseur</th>
              <th>Nom fournisseur</th>
              <th>contact</th>
              <th>Email</th>
              <th>RCCM</th>
              <th>SITE WEB</th>
              <th>Ville</th>
              <th>Debit</th>
              <th>Credit</th>
              <th>Total</th>
              <th>Statut</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($fournisseurs as $fournisseur)
              <tr>
                <td> <a href="{{ route('fournisseurs.edit',[$fournisseur->id]) }}"> {{ $fournisseur->codef }} </a> </td>
                <td>{{ $fournisseur->name }} </td>
                <td>{{ $fournisseur->contact }}</td>                
                <td>{{ $fournisseur->email }}</td>                
                <td>{{ $fournisseur->slug }}</td>
                <td>{{ $fournisseur->siteweb }}</td>
                <td>{{ $fournisseur->localisation }}</td>
                <td>{{ @$fournisseur->caisses->sum('debit') }}</td>
                <td>{{ @$fournisseur->caisses->sum('credit') }}</td>
                <td>{{ @$fournisseur->caisses->sum('debit') - @$fournisseur->caisses->sum('credit') }}</td>
                <td> 
                  <a href="{{ route('fournisseurs.edit',[$fournisseur->id]) }}" title="Modifier" class="btn btn-info btn-sm">M<i class="fa fa-edit"></i></a>                  
                  {!! Form::open(['method' => 'DELETE', 'route' => ['fournisseurs.destroy', $fournisseur->id] ,'style'=>'display:inline-block !important;margin:0;']) !!}
                    <input  type="submit" class="btn btn-danger btn-sm" name="statut" value="X">
                  {!! Form::close() !!}                    
                </td>
              </tr>
            @endforeach
          </tbody>
          </table>
        {{ $fournisseurs->links() }}
      </div>
    </div>
  </div>
</div>
  <div class="modal fade" id="newfournisseur">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title text-center">Nouveau fournisseur</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Fermer</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('fournisseurs.store') }}" method="post">
            @csrf
            <div class="container">
              <div class="row" id="tablefournisseurAdd">
                <div class="form-group col-md-12" >  <label for="codef">Code Fournisseur</label>

                 <input value="{{ old('codef') }}" class="form-control  @error('codef') is-invalid @enderror" type="text" name="codef" id="codef" required> 
                  @error('codef')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ @$message }}</strong>
                      </span>
                  @enderror

                </div>
                <div class="form-group col-md-6" >  <label for="name">Nom fournisseur</label>

                  <input value="{{ old('name') }}" class="form-control  @error('name') is-invalid @enderror" type="text" name="name" id="name" required> 
                  @error('name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ @$message }}</strong>
                      </span>
                  @enderror

                </div>

                <div class="form-group col-md-6" >  <label for="nom">Contact</label>

                 <input value="{{ old('contact') }}" class="form-control  @error('contact') is-invalid @enderror" type="text" name="contact" id="contact"> 
                  @error('contact')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ @$message }}</strong>
                      </span>
                  @enderror
                </div>

                <div class="form-group col-md-6" >  <label for="nom">Email</label>

                 <input value="{{ old('email') }}" class="form-control  @error('email') is-invalid @enderror" type="email" name="email" id="email"> 
                  @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ @$message }}</strong>
                      </span>
                  @enderror
                </div>

                <div class="form-group col-md-6" >  <label for="siteweb">RCCM</label>

                 <input value="{{ old('siteweb') }}" class="form-control  @error('siteweb') is-invalid @enderror" type="text" name="siteweb" id="siteweb"> 
                  @error('siteweb')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ @$message }}</strong>
                      </span>
                  @enderror

               </div>


                <div class="form-group col-md-6" >  <label for="localisation">Localisation</label>

                 <input value="{{ old('localisation') }}" class="form-control  @error('localisation') is-invalid @enderror" type="text" name="localisation" id="localisation" placeholder="Ville - Commune/Quartier"> 
                  @error('localisation')
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
                <button type="reset" class="btn btn-default float-right" data-dismiss="modal">Annuler</button>
              </div>
            </div>
          </form>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

@endsection