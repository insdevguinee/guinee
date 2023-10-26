<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ url('comments') }}">
            @csrf
            <input type="hidden" name="commentable_type" value="\{{ get_class($model) }}" />
            <input type="hidden" name="commentable_id" value="{{ $model->id }}" />
            <div class="form-group">
                @if($model->trouver == 0)
                <label for="message">Laisser un message ici:</label>
                <textarea class="common-textarea form-control @if($errors->has('message')) is-invalid @endif" name="message" rows="3" style="border-radius: 0px !important"></textarea>
                <div class="invalid-feedback">
                    Votre message est requis.
                </div>
                @else
                <p class="text-center">Impossible de poster un message car <br>L'annonceur a defini cet objet comme étant retrouvé. </p>
                @endif
                {{-- <small class="form-text text-muted"><a target="_blank" href="https://help.github.com/articles/basic-writing-and-formatting-syntax">Markdown</a> cheatsheet.</small> --}}
            </div>
            {{-- <button type="submit" class="btn btn-sm btn-outline-success text-uppercase">Submit</button> --}}
            @if($model->trouver == 0)
            <button class="genric-btn primary" style="float: right;">Envoyer</button>
            @endif
        </form>
    </div>
</div>
<br />