@extends('layouts.app')

@section('content')
    <a type="button" class="btn btn-primary" href="{{URL::previous()}}">Retour</a>

    <div class="card m-3 " style="max-width: 80%; ">
        <div class="row g-0">
        <div class="col-md-8">
            <div class="card-body">
            <h5 class="card-title">Numéro permis:{{$permi->Num}}</h5>
            <p class="card-text">Numéro carte d'indentité:{{$permi->NumId}}</p>
            <p class="card-text">Lieu:{{$permi->Lieu}}</p>
            <p class="card-text">Nom:{{$permi->Nom}}</p>
            <p class="card-text">Prénom:{{$permi->Prenom}}</p>
            <p class="card-text">Description:{{$permi->Description}}</p>
            <p class="card-text">Date d'édition: {{$permi->DateEdition}}</p>
            <p class="card-text">Date de délivrance: {{$permi->DateDelivrance}}</p>
            <p class="card-text">Date de réussite: {{$permi->DateReussite}}</p>


            </div>
        </div>
        </div>
    </div>
@endsection
