@extends('admin.layouts.admin',['title'=>'Budget'])
@section('style')
<!-- Pick a theme, load the plugin & initialize plugin -->
<link href="{{ asset('admin/dist/css/theme.default.min.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="row">
  <div class="col-md-12">
     <div class="card">
      <div class="card-body">
        <div class="col-12">
            <form action="{{ route('budgets.index') }}" method="GET" class="input-group no-border">
            <input type="text" value="{{ @$_GET['search'] }}" name="search" class="form-control" placeholder="Recherche ligne budgetaire CODE">
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

    <div class="card">
      <div class="card-body">
        @if(Auth::user()->hasRole('admin'))
        <a href="{{ route('budgets.export') }}" type="button" class="btn btn-sm btn-default float-right">
         <i class="fa fa-download" aria-hidden="true"></i> Telecharger XLXS
        </a>
        @endif
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>Code1</th>
              <th>Code2</th>
              <th>Ligne budget</th>
              <th>Compta</th>
              <th>Phase Operation</th>
              <th>Libellé</th>
              <th>Montant</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($budgets as $budget)
              <tr>
                <td>{{ $budget->code1 }}</td>
                <td>{{ $budget->code2 }}</td>
                <td>{{ $budget->ligne_budget }}</td>
                <td>{{ $budget->compta }}</td> 
                <td>{{ $budget->phase_operation }}</td>
                <td>{{ $budget->libelle }}</td>
                <td>
                  @php
                    $montant = \App\Caisse::where([['ligne_budget',$budget->ligne_budget],['direction_id',Auth::user()->direction->id]])->whereYear('created_at',session('campagne'))->sum('debit');
                    // $montant2 = \App\Caisse::where([['ligne_budget',$budget->ligne_budget],['direction_id',Auth::user()->direction->id]])->sum('credit');
                  @endphp
                  {{ $montant }}
                </td>  
              </tr>
            @endforeach
          </tbody>
        </table>
        @if(!isset($_GET['search']))
        {{ $budgets->links() }}
        @endif
      </div>
    </div>
  </div>
</div>
@endsection
{{-- @section('script')
 <script src="{{ asset('admin/dist/js/jquery.tablesorter.min.js') }}"></script>
  <script src="{{ asset('admin/dist/js/jquery.tablesorter.widgets.min.js') }}"></script>
    <script>
  $(function(){
    $('table').tablesorter({
      widgets        : ['zebra', 'columns'],
      usNumberFormat : false,
      sortReset      : true,
      sortRestart    : true
    });
  });
</script>
@endsection --}}