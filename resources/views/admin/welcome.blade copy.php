@extends('admin.layouts.admin')
@section('content')
	             
               <div class="row">
          
              <div class="col-lg-3 col-md-3 col-sm-6">
               <a href="{{ route('personnels.index') }}">
                  <div class="card card-stats">
                  <div class="card-body ">
                    <div class="row">
                      <div class="col-5 col-md-4">
                        <div class="icon-big text-center icon-info">
                          <i class="nc-icon nc-single-02 text-info"></i>
                        </div>
                      </div>
                      <div class="col-7 col-md-8">
                        <div class="numbers">
                          <p class="card-category">Ressource <br> Humaine</p>
                          </div>
                      </div>
                    </div>
                  </div>
                </div>
               </a>
              </div>
              
              {{-- <div class="col-lg-3 col-md-3 col-sm-6">
                <a href="{{ route('caisses.index') }}">
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
                          <p class="card-category">Enregistrement<br>Comptable</p>
                          {{-- <p class="card-title">0 </p> --}}
                       {{--    </div>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer ">
                    <hr>
                    <div class="stats">
                      <i class="fa fa-refresh"></i> <a href="#">Expéditions rejetées</a>
                    </div>
                  </div>
                </div>
              </a>
              </div> --}} 

                    <div class="col-lg-3 col-md-3 col-sm-6">
                <a href="{{ route('depenses.index') }}">
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
                          <p class="card-category">Menu Depense</p>
                          {{-- <p class="card-title">0 </p> --}}
                          </div>
                      </div>
                    </div>
                  </div>
               {{--    <div class="card-footer ">
                    <hr>
                    <div class="stats">
                      <i class="fa fa-refresh"></i> <a href="#">Expéditions rejetées</a>
                    </div>
                  </div> --}}
                </div>
              </a>
              </div>
              <div class="col-lg-3 col-md-3 col-sm-6">
                <a href="{{ route('abscences.index') }}">
                <div class="card card-stats">
                  <div class="card-body ">
                    <div class="row">
                      <div class="col-5 col-md-4">
                        <div class="icon-big text-center icon-info">
                          <i class="nc-icon   nc-badge  text-info"></i>
                        </div>
                      </div>
                      <div class="col-7 col-md-8">
                        <div class="numbers">
                          <p class="card-category">Gestion<br>de presence</p>
                          {{-- <p class="card-title">1.000 <sup>FCFA</sup> --}}
                            </p><p>
                        </p></div>
                      </div>
                    </div>
                  </div>
                 {{--  <div class="card-footer ">
                    <hr>
                    <div class="stats">
                      <i class="fa fa-refresh"></i> <a href="#">Ajouter des fonds</a>
                    </div>
                  </div> --}}
                </div>
                </a>
              </div>
         
              <div class="col-lg-3 col-md-3 col-sm-6">
                <a href="{{ route('budgets.index') }}">
                  <div class="card card-stats">
                  <div class="card-body ">
                    <div class="row">
                      <div class="col-5 col-md-4">
                        <div class="icon-big text-center icon-info">
                          <i class="nc-icon nc-money-coins  text-info"></i>
                        </div>
                      </div>
                      <div class="col-7 col-md-8">
                        <div class="numbers">
                          <p class="card-category"><br>Budget</p>
                            </p><p>
                        </p></div>
                      </div>
                    </div>
                  </div>
                </div>
                </a>
              </div>

              <div class="col-lg-3 col-md-3 col-sm-6">
                <a href="{{ route('paies.index') }}">
                  <div class="card card-stats">
                    <div class="card-body ">
                      <div class="row">
                        <div class="col-5 col-md-4">
                          <div class="icon-big text-center icon-info">
                            <i class="nc-icon nc-money-coins  text-info"></i>
                          </div>
                        </div>
                        <div class="col-7 col-md-8">
                          <div class="numbers">
                            <p class="card-category"><br>Paiement</p>
                              </p><p>
                          </p></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
              
              <div class="col-lg-3 col-md-3 col-sm-6">
               <a href="{{ route('fournisseurs.index') }}">
                  <div class="card card-stats">
                  <div class="card-body ">
                    <div class="row">
                      <div class="col-5 col-md-4">
                        <div class="icon-big text-center icon-info">
                          <i class="nc-icon nc-briefcase-24 text-info"></i>
                        </div>
                      </div>
                      <div class="col-7 col-md-8">
                        <div class="numbers">
                          <p class="card-category"><br>Fournisseurs</p>
                          </div>
                      </div>
                    </div>
                  </div>
                </div>
               </a>
              </div>

              {{-- <div class="col-lg-3 col-md-3 col-sm-6">
               <a href="#">
                  <div class="card card-stats">
                  <div class="card-body ">
                    <div class="row">
                      <div class="col-5 col-md-4">
                        <div class="icon-big text-center icon-info">
                          <i class="nc-icon nc-bank text-info"></i>
                        </div>
                      </div>
                      <div class="col-7 col-md-8">
                        <div class="numbers">
                          <p class="card-category"><br>Logistiques</p>
                          </div>
                      </div>
                    </div>
                  </div>
                </div>
               </a>
              </div> --}}
            </div>
<div class="justify-content-center text-center min-100" id="header" >
<div class="row mt-4">
            <div class="col-md-12">
              <h4></h4>
              <div id="partenaire">
                <img src="{{ asset('img/am.jpg') }}" style="height: 110px;border-radius: 30px;">
              </div>
              
            </div>
          </div>

  </div>


@endsection

