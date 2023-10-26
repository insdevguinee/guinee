@extends('admin.layouts.admin',['title'=>'Modification du Fournisseur '.$fournisseur->name])
@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="card">
      
      <div class="card-body">
        {{ Form::model($fournisseur, ['route' => array('fournisseurs.update', $fournisseur->id), 'method' => 'PUT','style'=>'width:100%;display:contents !important', 'enctype'=>"multipart/form-data"]) }}
            <div class="container">
              <div class="row" id="tablePersonnelAdd">
                
                <div class="form-group col-md-6" >  <label for="codef">CODE FOURNISSEUR</label>

                  <input value="{{ $fournisseur->codef }}" class="form-control  @error('codef') is-invalid @enderror" type="text" name="codef" id="codef"> 
                  @error('codef')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ @$message }}</strong>
                      </span>
                  @enderror
                </div>

                <div class="form-group col-md-6" >  <label for="name">NOM FOURNISSEUR</label>
                  <input value="{{  $fournisseur->name }}" class="form-control  @error('name') is-invalid @enderror" type="text" name="name" id="name"> 
                  @error('name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ @$message }}</strong>
                      </span>
                  @enderror
                </div>
               
                <div class="form-group col-md-6" > <label for="slug">RCCM</label>
                 <input value="{{  $fournisseur->slug }}" class="form-control  @error('slug') is-invalid @enderror" type="text" name="slug" id="slug"> 
                  @error('slug')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ @$message }}</strong>
                      </span>
                  @enderror
                </div>
               
                <div class="form-group col-md-6" > <label for="contact">CONTACT</label>
                 <input value="{{  $fournisseur->contact }}" class="form-control  @error('contact') is-invalid @enderror" type="text" name="contact" id="contact"> 
                  @error('contact')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ @$message }}</strong>
                      </span>
                  @enderror
                </div>
               
                <div class="form-group col-md-6" > <label for="email">Email</label>
                 <input value="{{  $fournisseur->email }}" class="form-control  @error('email') is-invalid @enderror" type="email" name="email" id="email"> 
                  @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ @$message }}</strong>
                      </span>
                  @enderror
                </div>
               
                <div class="form-group col-md-6" > <label for="localisation">ADRESSE</label>
                 <input value="{{  $fournisseur->localisation }}" class="form-control  @error('localisation') is-invalid @enderror" type="text" name="localisation" id="localisation"> 
                  @error('localisation')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ @$message }}</strong>
                      </span>
                  @enderror
                </div>
               
                <div class="form-group col-md-6" > <label for="siteweb">SITE WEB</label>
                 <input value="{{  $fournisseur->siteweb }}" class="form-control  @error('siteweb') is-invalid @enderror" type="text" name="siteweb" id="siteweb"> 
                  @error('siteweb')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ @$message }}</strong>
                      </span>
                  @enderror
                </div>
               
                <div class="clearfix"></div>
              </div>
            </div>
            {{-- @can('edit_personnels') --}}
            <div class="row">
              <div class="col-12">
                <button type="submit" class="btn btn-success float-right">Modifier</button>
                {{-- <button type="button" class="btn btn-primary float-left" id="newRow">Ajouter une ligge</button> --}}
                {{-- <button type="reset" class="btn btn-default float-right">Annuler</button> --}}
                <a href="{{ route('fournisseurs.index') }}" class="btn btn-default float-right">Annuler</a>
              </div>
            </div>
            {{-- @endcan --}}
        {{ Form::close() }}
      </div>
    </div>
  </div>
</div>

@endsection
