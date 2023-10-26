@extends('admin.layouts.admin',['title'=>'Gestion des abscences Formation' ])
@php
  $days = [1,2,3,4,5,6,7,8,9,10,11,12];
  $mois = ['Janvier'=>1,'Fevrier'=>2,'Mars'=>3,'Avril'=>4,'Mai'=>5,'Juin'=>6,'Juillet'=>7,'Aout'=>8,'Septembre'=>9,'Octobre'=>10,'Novembre'=>11,'Decembre'=>12];
@endphp
@section('style')
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" /> --}}
<style>
  table.abs td.day{
    width: 32px !important;
    height: 32px !important;
    padding: 5px !important;
    text-align: center;
    font-weight: 900;
    color: red;
  }
   table.abs td.day:hover{
    background: gray;
    cursor: pointer;
   }
</style>
@endsection
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <div class="col-12">
            <form action="{{ route('abscences.index') }}" method="GET" class="input-group no-border">
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
        <a href="{{ route('abscences.index') }}" class="btn btn-success btn-sm">Projet</a>
        <a href="{{ route('formations.index') }}" class="btn btn-info btn-sm">Formation</a>
      </div>
    </div>
    <div class="card">
      <div class="card-body">
        <form action="" id="date">
          <select class="form-control col-md-2" name="mois">
         @foreach ($mois as $m => $value)
           <option value="{{ $value }}" {{ ( isset($_GET['mois']) ) ? ( ($_GET['mois'] == $value)? 'selected' : ' ' ) : ( (date('m') == $value ) ? 'selected' : ' ' ) }} >{{ $m }}</option>
         @endforeach
        </select>
        <button type="submit" class="btn btn-default col-md-2" >Valider</button>
        </form>
        <small>Survoller la lettre <em class="text-danger">A</em> pour voir le motif de l'absence</small>
        <div class="table-responsive">
           <table class="table table-bordered abs">
          <thead>
            <tr>
              <th>Personnels</th>
              <th>1</th>
              <th>2</th>
              <th>3</th>
              <th>4</th>
              <th>5</th>
              <th>6</th>
              <th>7</th>
              <th>8</th>
              <th>9</th>
              <th>10</th>
              <th>11</th>
              <th>12</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($personnels as $personnel)
              <tr>
                <td class="text-capitalize text-left" data-user="{{ $personnel->id }}" style="padding: 5px !important">{{ $personnel->nom.' '.$personnel->prenoms }} <span class="badge badge-info">{{ @$personnel->absMois(( isset($_GET['mois']))? $_GET['mois']:date('m') )->count() }}</span></td>
                  @foreach ($days as $day)
                  <td class="day" day={{ $day }}>
                    @foreach ($personnel->absMois(( isset($_GET['mois']))? $_GET['mois']:date('m') ) as $abs)
                      {!! (\Carbon\Carbon::parse($abs->date_abs)->format('d')==$day)?'<span title="'.$abs->motif.'">A</span>':'' !!}
                    @endforeach
                  </td>
                  @endforeach
               
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

<!-- Modal -->
<div class="modal fade" id="motif" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <label class="modal-title">Motif de l'abscence</label>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <textarea name="motif" id="motifValue" class="form-control" required cols="30" rows="10"></textarea>
      </div>
      <div class="modal-footer">
        @can('add_abscences')
        <button type="submit" id="saveMotif" class="btn btn-primary">Enregistrer</button>
        @endcan
        @can('delete_abscences')
        <button type="reset" id="deleteMotif" class="btn btn-danger float-right" >Supprimer</button>
        @endcan
      </div>
    </div>
  </div>
</div>
@endsection
@section('script')
<script>
  $(document).ready(function() {
    $('td.day').click(function() { 
      $('td').each(function(index, el) {
         $(this).removeClass('selected');
      });

      $(this).addClass('selected');

      $('#motifValue').val($(this).children('span').attr('title'));
      $('#motif').modal('show');
    });

    @can('add_abscences')
    $('#saveMotif').click(function() {
      var td = $('td.selected');
      var user_id = td.parent('tr').children('td[data-user]').attr('data-user');
      var month = {{ ( isset($_GET['mois']))? $_GET['mois']:date('m') }};
      var year = {{ env('YEAR') }};
      var day = td.attr('day');  

      var motif = $('#motifValue').val();
      var abs = $('#motif').attr('motif_id');
      if ($.trim(motif) != "") {
        $.ajax({
           url: "{{ route('abscences.store') }}",
           type: 'POST',
           data: {
            'user': user_id,
            'date': year+'-'+month+'-'+day,
            'motif': motif,
            "_token": "{{ csrf_token() }}",
           },
          success:function(data){
            if (data[0]==='add') {
              $('#motif').attr('motif_id', data[1]);
              td.html("<span title="+data[2]+">A</span>");
              var badge = td.parent('tr').children('td:first-child').children('span');
              badge.text(parseInt(badge.text())+1);
              $('#motif').modal('toggle');
            }else{
              td.text(' ');
            }
          } 
       });
      } else {
        alert('Echec de l\'enregistrement, motif obligatoire');
      }
    });
    @endcan

    @can('delete_abscences')
    $('#deleteMotif').click(function() {
      var td = $('td.selected');
      var user_id = td.parent('tr').children('td[data-user]').attr('data-user');
      var month = {{ ( isset($_GET['mois']))? $_GET['mois']:date('m') }};
      var year = {{ env('YEAR') }};
      var day = td.attr('day');  
      var abs = $('#motif').attr('motif_id');
        $.ajax({
           url: "{{ route('formations.store') }}",
           type: 'POST',
           data: {
            'user': user_id,
            'date': year+'-'+month+'-'+day,
            'del': true,
            "_token": "{{ csrf_token() }}",
           },
          success:function(data){
             td.html("");
             var badge = td.parent('tr').children('td:first-child').children('span');
              badge.text(parseInt(badge.text())-1);
            $('#motif').modal('toggle');
          } 
       });
    });
    @endcan
  });

</script>
@endsection