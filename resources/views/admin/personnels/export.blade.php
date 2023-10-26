@extends('admin.layouts.admin',['title'=>'Telechargement la liste du personnel'])
@section('content')

<div class="row d-flex justify-content-center mt-60">
    <div class="col-md-6 text-center">
        <form action="{{ route('export.personnels') }}"  method="post" enctype="multipart/form-data">
            @csrf
            
            <select name="cat" id="" class="form-control">
                <option value="0">Tout le personnel</option>
                @foreach ($cats as $cat)
                <option value="{{$cat->id}}">{{$cat->libelle}}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-success">Telecharger</button>
        </form>
    </div>
</div>

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