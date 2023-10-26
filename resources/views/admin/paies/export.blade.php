@extends('admin.layouts.admin',['title'=>'Etat des paiement'])
@section('content')

<div class="row d-flex justify-content-center mt-60">
    <div class="col-md-6 text-center">
        @can('pdfPaies_downloads')
        <form action="{{ route('export.paiements') }}"  method="post" enctype="multipart/form-data">
            @csrf

            <select name="direction" id="" class="form-control" required>
                <option value="0">Toutes les directions</option>
                @foreach ($directions as $cat)
                <option value="{{$cat->id}}">{{$cat->libelle}}</option>
                @endforeach
            </select>

            <select name="fonction" id="" class="form-control mt-3" required>
                <option value="">Toutes les fonctions</option>
                @foreach ($fonctions as $fonction)
                <option value="{{$fonction->id}}">{{$fonction->libelle}}</option>
                @endforeach
            </select>          

            <select class="form-control mt-3" name="mois">
                @foreach (\App\Option::mois() as $m => $value)
                    <option value="{{ $value }}" {{ ( isset($_GET['mois']) ) ? ( ($_GET['mois'] == $value)? 'selected' : ' ' ) : ( (date('m') == $value ) ? 'selected' : ' ' ) }} >{{ $m }}</option>
                @endforeach
            </select>

            <select name="personnel" id="" class="form-control mt-3">
                <option value="formations">Personnels en Formations</option>
                <option value="actif">Personnels Actifs</option>
            </select>
            <button type="submit" class="btn btn-success"  id="animer">Telecharger</button>
        </form>
        @endcan
    </div>
</div>
{{-- <div class="container"> 
    <div class="progress">
      <div class="progress-bar  progress-bar-striped bg-info" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
    </div>
  </div> --}}

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
@section('script')
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script> 
<script>

function timer(n) {
    var value = n + "%"
    $(".progress-bar").css("width", n + "%")
    // $(".progress-bar").css("width", value).text(value)
    if(n < 100) {
        setTimeout(function() {
        timer(n + 1)
        }, 20)
    }
}

$(function (){
    $("#animer").click(function() {
        timer(100)
    })
})

</script>
@endsection