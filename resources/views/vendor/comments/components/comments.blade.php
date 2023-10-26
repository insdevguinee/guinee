@if($model->comments->count() < 1)
    <div class="alert alert-warning">Aucun message.</div>
@endif

<ul class="list-unstyled">
    @foreach($model->comments->where('parent', null) as $comment)
        @include('comments::_comment')
    @endforeach
</ul>

@auth
    @include('comments::_form')
@else
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Identification requise</h5>
            <p class="card-text">Vous devez vous connecter pour poster un message.</p>
            <button type="button" href="#" class="btn btn-primary" data-toggle="modal" data-target='#login'>Connexion</button>
           {{--  <div class="text-center">
                @include('mini._login')
            </div> --}}
        </div>
    </div>
    <!-- Button trigger modal -->
    
    <!-- Modal -->
    <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-body text-center">
            @include('mini._login')
          </div>
        </div>
      </div>
    </div>
@endauth
