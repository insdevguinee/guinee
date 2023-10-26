@extends('admin.layouts.admin',['title'=>'Récapitulatif'])
@php
  $mois = ['Janvier'=>1,'Fevrier'=>2,'Mars'=>3,'Avril'=>4,'Mai'=>5,'Juin'=>6,'Juillet'=>7,'Aout'=>8,'Septembre'=>9,'Octobre'=>10,'Novembre'=>11,'Decembre'=>12];
@endphp

@section('style')
<!-- Pick a theme, load the plugin & initialize plugin -->
<link href="{{ asset('admin/dist/css/theme.default.min.css') }}" rel="stylesheet">

@endsection
@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        {{-- @can('add_depenses')
         <button type='button' class="btn btn-sm btn-default float-right" data-toggle="modal" data-target="#newData">
         <i class="fa fa-plus-circle" aria-hidden="true"></i> Faire un enregistrement
        </button>
        @endcan
        @can('add_portefeuilles')
         <button type='button' class="btn btn-sm btn-info " data-toggle="modal" data-target="#addmontant">
         <i class="fa fa-plus-circle" aria-hidden="true"></i> Mise à jour du portefeuille
        </button>
        @endcan --}}
         <form action="" id="date">
          <select class="form-control col-md-2" name="mois">
         @foreach ($mois as $m => $value)
           <option value="{{ $value }}" {{ ( isset($_GET['mois']) ) ? ( ($_GET['mois'] == $value)? 'selected' : ' ' ) : ( (date('m') == $value ) ? 'selected' : ' ' ) }} >{{ $m }}</option>
         @endforeach
        </select>
        <button type="submit" class="btn btn-default col-md-2" >Valider</button>
        </form>
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th width="110px">Zone d'activité</th>
              <th>Portefeuille</th>
              <th>Solde</th>
              <th>Personnels</th>
              <th>Salaire</th>
              <th>Net à payer</th>
            </tr>
          </thead>
          <tbody>
            @foreach($directions as $direction)
            <tr>
             <td class="text-uppercase">{{ $direction['direction'] }}</td>
             <td>{{ $direction['portefeuille'] }}</td>
             <td>{{ $direction['sold'] }}</td>
             <td>{{ $direction['personnels'] }}</td>
             <td>{{ $direction['salaire'] }}</td>
             <td>{{ $direction['netPayer'] }}</td>
            </tr>
            @endforeach
          </tbody>
          </table>
      </div>
    </div>
  </div>
</div>

@endsection