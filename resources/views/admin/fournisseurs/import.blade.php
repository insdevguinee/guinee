@extends('admin.layouts.admin',['title'=>'Importation des Fournisseurs'])
@section('content')
{{-- <div class="row">
  <div class="col-md-6 mt-auto mr-auto">
    <form action="{{ route('import') }}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <label>Fichier Exel*</label>
        <input type="file" name="personnels" id="personnels" class="form-control">
      </div>
      <div class="row">
      <div class="col-12">
        <button type="submit" class="btn btn-success float-right">Enregister</button>
        <button type="reset" class="btn btn-default float-right">Annuler</button>
      </div>
    </div>
    </form>
  </div>
</div> --}}

<div class="row d-flex justify-content-center mt-60">
    <div class="col-md-6 text-center">
        <form action="{{ route('fournisseurs.post.import') }}" class="dropzone dz-clickable"  method="post" enctype="multipart/form-data">
            @csrf
            <input type="file" name="fic" id="fic" class="dz-default dz-message form-control">
            <small class="text-center text-info">Fichier au format xlsx</small>
        
            <div class="text-center m-t-20">
                <small class="d-block"><a href="{{ route('template.fournisseurs') }}">Template de remplissage</a></small>
              <button type="submit" class="btn btn-success">Importer fichier</button>
                {{-- <button class="btn btn-primary">Upload Now</button> --}}
            </div>
        </form>
    </div>
</div>

@endsection
@section('style')
<style>
  body {
    background-color: #f2f7fb
}

.mt-80 {
    margin-top: 80px
}

.card {
    border-radius: 5px;
    -webkit-box-shadow: 0 0 5px 0 rgba(43, 43, 43, .1), 0 11px 6px -7px rgba(43, 43, 43, .1);
    box-shadow: 0 0 5px 0 rgba(43, 43, 43, .1), 0 11px 6px -7px rgba(43, 43, 43, .1);
    border: none;
    margin-bottom: 30px;
    -webkit-transition: all .3s ease-in-out;
    transition: all .3s ease-in-out
}

.card .card-header {
    background-color: transparent;
    border-bottom: none;
    padding: 20px;
    position: relative
}

.card .card-header h5:after {
    content: "";
    background-color: #d2d2d2;
    width: 101px;
    height: 1px;
    position: absolute;
    bottom: 6px;
    left: 20px
}

.card .card-block {
    padding: 1.25rem
}

.dropzone.dz-clickable {
    cursor: pointer
}

.dropzone {
    min-height: 150px;
    border: 1px solid rgba(42, 42, 42, 0.05);
    background: rgba(204, 204, 204, 0.15);
    padding: 20px;
    border-radius: 5px;
    -webkit-box-shadow: inset 0 0 5px 0 rgba(43, 43, 43, 0.1);
    box-shadow: inset 0 0 5px 0 rgba(43, 43, 43, 0.1)
}

.m-t-20 {
    margin-top: 20px
}

.btn-primary,
.sweet-alert button.confirm,
.wizard>.actions a {
    background-color: #4099ff;
    border-color: #4099ff;
    color: #fff;
    cursor: pointer;
    -webkit-transition: all ease-in .3s;
    transition: all ease-in .3s
}

.btn {
    border-radius: 2px;
    text-transform: capitalize;
    font-size: 15px;
    padding: 10px 19px;
    cursor: pointer
}
</style>
@endsection