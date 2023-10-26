@extends('admin.layouts.admin',['title'=>'Directions'])

@section('content')
<div class="row justify-content-center">
  <div class="col-md-4">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newDirection">
      Nouvelle Zone d'activité
    </button>
    
    <!-- Modal -->
    <div class="modal fade" id="newDirection" tabindex="-1" role="dialog" aria-labelledby="newDirectionTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="newDirectionTitle">Creer une Zone d'activité</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="{{ route('directions.store') }}" method="POST">
              @csrf
          <div class="modal-body">
            
              <div class="form-group">
                <input type="text" name="libelle" class="form-control" placeholder="Nom">
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-warning" data-dismiss="modal">Annuler</button>
            <button type="submit" class="btn btn-primary">Enregistrer</button>
          </div>

            </form>
        </div>
      </div>
    </div>
    <div class="table">
      <table class="table table-bordered">
        <thead>
         <tr>
            <th colspan="2" class="text-center">Nom</th>
         </tr>
        </thead>
        <tbody>
          @foreach($directions as $direction)
          <tr>
            <td class="text-capitalize">{{ $direction->libelle }}</td>
            <td>
              <a href="#">Modifier</a> | 
              <form action="{{ route('directions.destroy',$direction->id) }}" method="POST" class="d-inline-block" onsubmit="return show_alert();">
                @csrf
                @method("DELETE")
             
                <input type="submit" value="Supprimer" class="btn btn-danger"  >
               </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      {{ $directions->links() }}
    </div>
  </div>
</div>
@endsection
