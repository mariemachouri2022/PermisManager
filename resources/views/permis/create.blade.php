@extends('layouts.app')
@section('content')

<form action="{{route('permis.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="Num" class="form-label">Num </label>
            <input type="number" class="form-control" id="Num" name="Num">
        </div>
        <div class="mb-3">
            <label for="NumId" class="form-label">NumId</label>
            <input type="number" class="form-control"  id="NumId" name="NumId">
        </div>
        <div class="mb-3">
            <label for="Nom" class="form-label">Nom</label>
            <input class="form-control"  id="Nom" name="Nom">
        </div>
        <div class="mb-3">
            <label for="Prenom" class="form-label">Prenom</label>
            <input class="form-control"  id="Prenom" name="Prenom">
        </div>
        <div class="mb-3">
            <label for="Lieu" class="form-label">Lieu</label>
            <input class="form-control"  id="Lieu" name="Lieu">
        </div>
        <div class="mb-3">
            <label for="DateEdition" class="form-label">DateEdition</label>
            <input type="date" class="form-control"  id="DateEdition" name="DateEdition">
        </div>
        <div class="mb-3">
            <label for="DateDelivrance" class="form-label">DateDelivrance</label>
            <input type="date" class="form-control"  id="DateDelivrance" name="DateDelivrance">
        </div>
        <div class="mb-3">
            <label for="DateReussite" class="form-label">DateReussite</label>
            <input type="date" class="form-control"  id="DateReussite" name="DateReussite">
        </div>
        <div class="mb-3">
            <label for="Description" class="form-label">Description</label>
            <input  class="form-control"  id="Description" name="Description">
        </div>
        <a type="button" class="btn btn-secondary" href="{{route('permis.index')}}">Annuler</a>
        <button type="submit" class="btn btn-primary">Submit</button>


@endsection
