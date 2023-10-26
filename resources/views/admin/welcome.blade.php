@extends('admin.layouts.admin')
@section('content')	 
@php
$user = auth()->user();  
@endphp

<div class="justify-content-center text-center min-100" id="header" style="margin-bottom: 30px;">
  <div class="row mt-4">
    <div class="col-md-12">
      <h4></h4>
      <div id="partenaire">
        <img src="{{ asset('img/am.jpg') }}" style="height: 110px;border-radius: 30px;">
      </div>
      
    </div>
  </div>
</div>

<div class="row">
  <div class="col-lg-4 col-md-4 col-sm-4">      
    <div class="card card-stats h-100">
      <div class="card-header text-center">
        <h2 class="card-title text-uppercase">Ressources Humaines</h2>

        <div class="icon-big text-center icon-info">
          <i class="nc-icon nc-single-02 text-info"></i>
        </div>
      </div>
      <div class="card-body" style="padding-bottom: 10px">
        <div class="row">           
          <div class="col-12">          
            <div class="list-group list-group-flush">
              <a href="{{ route('personnels.index') }}" class="list-group-item"> <h5>Gestion du Personnels <i class="fa fa-arrow-right float-right"></i> </h5> </a>
              <a href="{{ route('abscences.index') }}" class="list-group-item"><h5>Gestion de Presence <i class="fa fa-arrow-right float-right"></i> </h5> </a>
              <a href="{{ route('paies.index') }}" class="list-group-item"> <h5>Gestion de Paie <i class="fa fa-arrow-right float-right"></i> </h5> </a>
            </div>                
          </div>
        </div>
      </div>
    </div>      
  </div>

  <div class="col-lg-4 col-md-4 col-sm-4">      
    <div class="card card-stats h-100">
      <div class="card-header text-center">
        <h2 class="card-title text-uppercase">Finances</h2>

        <div class="icon-big text-center icon-info">
          <i class="nc-icon nc-money-coins text-info"></i>
        </div>
      </div>
      <div class="card-body" style="padding-bottom: 10px">
        <div class="row">           
          <div class="col-12">          
            <div class="list-group list-group-flush">
              <a href="{{ route('budgets.index') }}" class="list-group-item"> <h5>Budgets <i class="fa fa-arrow-right float-right"></i> </h5> </a>
              <a href="{{ route('depenses.index') }}" class="list-group-item"><h5>Depenses <i class="fa fa-arrow-right float-right"></i> </h5> </a>

            </div>                
          </div>
        </div>
      </div>
    </div>      
  </div>

  <div class="col-lg-4 col-md-4 col-sm-4">      
    <div class="card card-stats h-100">
      <div class="card-header text-center">
        <h2 class="card-title text-uppercase">Logistique</h2>

        <div class="icon-big text-center icon-info">
          <i class="nc-icon nc-bank text-info"></i>
        </div>
      </div>
      <div class="card-body" style="padding-bottom: 10px">
        <div class="row">           
          <div class="col-12">          
            <div class="list-group list-group-flush"> 
              <a href="{{ route('fournisseurs.index') }}" class="list-group-item"> <h5>Gestion des Fournisseurs <i class="fa fa-arrow-right float-right"></i> </h5> </a>
              <a href="https://stock.rgph.gov.gn/auth/{{$user->uuid}}" class="list-group-item"><h5>Gestion Stocks <i class="fa fa-arrow-right float-right"></i> </h5> </a>
            </div>                
          </div>
        </div>
      </div>
    </div>      
  </div>  

</div>



@endsection

