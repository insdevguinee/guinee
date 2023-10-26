@extends('admin.layouts.admin',['title'=>'Modifier le personnel '.$personnel->matricule])
@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="card">
      
      <div class="card-body">
        {{--Form::model($personnel, ['route' => array('personnels.update', $personnel->id), 'method' => 'GET','style'=>'width:100%;display:contents !important', 'enctype'=>"multipart/form-data"])--}}
           <form action="{{route('personnels.modifier')}}" method="POST">
           @csrf
            <div class="container">
              <div class="row" id="tablePersonnelAdd">
                
                <div class="form-group col-md-6" >  <label for="matricule">matricule</label>

                 <input value="{{ $personnel->matricule }}" class="form-control  @error('matricule') is-invalid @enderror" type="text" name="matricule" id="matricule"> 
                  @error('matricule')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ @$message }}</strong>
                      </span>
                  @enderror

               </div>
                <div class="form-group col-md-6" >  <label for="nom">nom</label>

                 <input value="{{  $personnel->nom }}" class="form-control  @error('nom') is-invalid @enderror" type="text" name="nom" id="nom"> 
                  @error('nom')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ @$message }}</strong>
                      </span>
                  @enderror

               </div>
                <div class="form-group col-md-6" >  <label for="prenoms">prenoms</label>

                 <input value="{{  $personnel->prenoms }}" class="form-control  @error('prenoms') is-invalid @enderror" type="text" name="prenoms" id="prenoms"> 
                  @error('prenoms')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ @$message }}</strong>
                      </span>
                  @enderror

               </div>
                <div class="form-group col-md-6" >  <label for="fonction">fonction</label>
                 <select name="fonction" id="fonction" class="form-control @error('fonction') is-invalid @enderror">
                   @foreach ($fonctions as $fonction)
                     <option value="{{ $fonction->id }}" class="text-uppercase" {{ ($personnel->fonction_id == $fonction->id )? 'selected':' ' }}>{{ $fonction->libelle }}</option>
                   @endforeach
                 </select>
                  @error('fonction')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ @$message }}</strong>
                      </span>
                  @enderror

               </div>
                <div class="form-group col-md-6" >  <label for="mm_numero">numero_mobile money</label>

                 <input value="{{  $personnel->mm_numero }}" class="form-control  @error('mm_numero') is-invalid @enderror" type="text" name="mm_numero" id="mm_numero"> 
                  @error('mm_numero')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ @$message }}</strong>
                      </span>
                  @enderror

               </div>
                <div class="form-group col-md-6" >  <label for="contact">contact</label>

                 <input value="{{  $personnel->contact }}" class="form-control  @error('contact') is-invalid @enderror" type="text" name="contact" id="contact"> 
                  @error('contact')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ @$message }}</strong>
                      </span>
                  @enderror

               </div>
               @foreach(App\Affectation::where('personnel_id', '=', $personnel->id)->get() as $k => $p)
                <div class="form-group col-md-6">  <label for="direction_id">Zone d'activité</label>
                  <select name="direction_id[]" id="direction" class="form-control">

                      @foreach($directions as $l => $direction)
                        <option value="{{ $direction->id }}" {{ (App\Direction::where('id', '=', $p->direction_id)->first()->id == $direction->id)?'selected':' ' }} default={{$direction->libelle}}>{{ $direction->libelle }}</option>
                      @endforeach

                  </select>
                  @error('direction_id')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ @$message }}</strong>
                      </span>
                  @enderror

               </div>
                <div class="form-group col-md-6" >  <label for="numero_equipe">Numéro équipe</label>

                  <input value="{{  $p->team_number }}" class="form-control  @error('numero_equipe') is-invalid @enderror" type="number" name="numero_equipe[]" id="numero_equipe"> 
                    @error('numero_equipe')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ @$message }}</strong>
                        </span>
                    @enderror
               </div>
               @endforeach


                <div class="clearfix"></div>
                <div class="container">
                  <div id="mat" class="row"></div>
                </div>
                <div class="clearfix"></div>
                <p class="text-center">
                       <a href="#end" id="addLine" class="add btn btn-sm btn-info"><span class="fa fa-plus-square-o fa-lg"></span> Ajouter une zone</a>
                    </p>
              </div>
            </div>
            <input type="hidden" name="id" value="{{$id}}">
            @can('edit_personnels')
            <div class="row">
              <div class="col-12">
                <button type="submit" class="btn btn-success float-right">Modifier</button>
                {{-- <button type="button" class="btn btn-primary float-left" id="newRow">Ajouter une ligge</button> --}}
                {{-- <button type="reset" class="btn btn-default float-right">Annuler</button> --}}
                <a href="/tableau-bord/personnels" class="btn btn-default float-right">Annuler</a>
              </div>
            </div>
            @endcan
        </form>
        {{--Form::close()--}}
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script>
    jQuery(document).ready(function($) {

        $('#addLine').click(function(event) {

          var code = "<div class=\"form-group col-md-12\" style=\"display:inline-block; width: 50%;\">  <label for=\"direction_id\">Zone d'activité</label><select name=\"direction_id[]\" id=\"direction\" class=\"form-control\">@foreach($directions as $direction) <option value=\"{{ $direction->id }}\" {{ ($personnel->direction_id == $direction->id)?'selected':' ' }}>{{ $direction->libelle }}</option>@endforeach</select>@error('direction_id[]')<span class=\"invalid-feedback\" role=\"alert\"><strong>{{ @$message }}</strong></span>@enderror</div><div class=\"form-group col-md-6\" style=\"display:inline-block; width: 50%;\">  <label for=\"numero_equipe\">Numero équipe</label><input value=\"{{  $personnel->numero_equipe }}\" class=\"form-control  @error('numero_equipe') is-invalid @enderror\" type=\"number\" name=\"numero_equipe[]\" id=\"numero_equipe\">@error('numero_equipe')<span class=\"invalid-feedback\" role=\"alert\"><strong>{{ @$message }}</strong></span>@enderror</div>";
          $('#mat').append("<div style=\"width: 100%\">"+code+"</div>");
            $('select').select2({
            placeholder: "Search for a repository",
          });
          $('.remove').click(function(event) {
            $(this).parent('.mat').remove();
          });
        });

        $(".numero").inputmask({"mask": "9999/9999"});
         $('#active-bons').addClass('active');
    });

  </script>
@endsection
