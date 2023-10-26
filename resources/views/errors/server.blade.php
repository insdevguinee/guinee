@extends('mini.body',['title'=>'Erreur','hasScroll'=>true])

@section('body')
        <div style=" height: 100vh;align-items: center;
        display: flex; position: relative;
        justify-content: center">
            <div class="text-center">
                <div style="font-size: 35px;">
                    Oups, il semble avoir un problème ... 
                </div>
                <br>
                <p><a href="{{ route('home') }}">Retour à l'accueil</a></p>
            </div>
        </div>
@endsection

