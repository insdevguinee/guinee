@extends('admin.layouts.admin',['title'=>'Nouveau projet'])
@section('content')

<style>
  .cat{
  padding: 2px 5px;
  margin: 0 10px;
}
.ck-content.ck-editor__editable{
  min-height: 370px;
}
</style>
<div class="row">
  {!! Form::open(['method' => 'POST', 'route' => 'projets.store','style'=>'width:100%;    display: -webkit-box; ']) !!}
  
  <div class="col-md-8">
    <div class="card card-user">
      <div class="card-body" style="min-height: 0px;">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Titre du projet</label>
                <input type="text" value="" class="form-control" name="titre">
              </div>

              <div class="form-group">
                <label>Categorie du projet <em>(Maintenir <code>Ctrl</code> pour plusieurs selections)</em></label>
                <select name="categorie_id[]" class="form-control" multiple style="max-height: 150px;">
                  @foreach ($categories as $categorie)
                    <option value="{{ $categorie->id }}" class="text-uppercase d-inline-block cat">{{ $categorie->name }}</option>
                  @endforeach
                </select>
              </div>

              <div class="form-group">
                <label for="description">Description du projet</label>
                <textarea name="description" id="description"></textarea>
              </div>
            </div>
          </div>

          
      </div>
    </div>
  </div>

  <div class="col-md-4">
    <div class="card">
      <div class="card-body">
        
              

        <div class="row">
          <div class="col-md-12">
          
            <div class="form-group">
              <label>Nombre d'action</label>
              <input type="text" class="form-control num" name="action">
            </div>
            
            <div class="form-group">
              <label>Coût de l'action (FCFA)</label>
              <input type="text" class="form-control money" name="prix_action">
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label>Date d'ouverture</label>
              <input type="date" class="form-control" name="date_ouverture">
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label>Date de cloture</label>
              <input type="date" class="form-control" name="date_cloture">
            </div>
          </div>
          
          <div class="col-md-6">
            <div class="form-group">
              <label>Type de remboursement</label>
              <select name="type_rem" class="form-control">
                <option value="amortissable">Amortissable</option>
                <option value="non amortissable">Non Amortissable</option>
              </select>
            </div>
          </div>
          <div class="col-md-6">
              <div class="form-group">
              <label>Taux (%)</label>
              <input type="text" class="form-control percent" name="taux">
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label>Business Plan
                <input type="file" name="bp" id="bp">
              </label>
            </div>

            <div class="form-group">
              <label>Date de remnoursement</label>
              <input type="date" class="form-control" name="date_rem">
            </div>
            <button type="submit" class="btn btn-primary btn-round float-right">Enregistrer</button>
          </div>
          
        </div>
      </div>
    </div>
  </div>
  {!! Form::close() !!}
</div>
@endsection
@section('script')
    <script src="{{ asset('js/jquery.mask.min.js') }}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/15.0.0/classic/ckeditor.js"></script>
    <script>
        $(document).ready(function() {
             $('.money,.num').mask("# ##0 000", {reverse: true});
              $('.percent').mask('##000', {reverse: true});
        });

        // CKEDITOR.replace( 'description' );
        ClassicEditor.create( document.querySelector( '#description' ) )
        .catch( error => {
            console.error( error );
        } );
    </script>
@endsection