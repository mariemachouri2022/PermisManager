@extends('layouts.app')

@section('content')

    <form action="{{route('permis.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="Num" class="form-label">Numéro permis: </label>
            <input  class="form-control" id="Num" name="Num">
        </div>
        <div class="mb-3">
            <label for="NumId" class="form-label">Numéro carte d'identité: </label>
            <input  class="form-control" id="NumId" name="NumId">
        </div>
        <div class="mb-3">
            <label for="Nom" class="form-label">Nom: </label>
            <input  class="form-control" id="Nom" name="Nom">
        </div>
        <div class="mb-3">
            <label for="Prenom" class="form-label">Prénom: </label>
            <input  class="form-control" id="Prenom" name="Prenom">
        </div>
        <div class="mb-3">
            <label for="nom" class="form-label">Nom: </label>
            <input  class="form-control" id="nom" name="nom">
        </div>
        <div class="form-floating">
            <textarea class="form-control" placeholder="Description" id="description" name="description"></textarea>
            <label for="description">Description</label>
        </div>
        <div class="mb-3">
            <label for="Lieu" class="form-label">Lieu: </label>
            <input  class="form-control" id="Lieu" name="Lieu">
        </div>
        <div class="mb-3">
            <label for="DateEdition" class="form-label">Date d'édition: </label>
            <input  type="date" class="form-control" id="DateEdition" name="DateEdition">
        </div>
        <div class="mb-3">
            <label for="DateDelivrance" class="form-label">Date de délivrance: </label>
            <input  type="date" class="form-control" id="DateDelivrance" name="DateDelivrance">
        </div>
        <div class="mb-3">
            <label for="DateReussite" class="form-label">Date de réussite: </label>
            <input  type="date" class="form-control" id="DateReussite" name="DateReussite">
        </div>

        <div class="mb-3">
            <label for="poster" class="form-label">Poster</label>
            <input class="form-control" type="file" id="poster" name="poster" accept="image/png, image/jpeg">
        </div>

        <a type="button" class="btn btn-secondary" href="{{route('permis.index')}}">Annuler</a>
        <button type="submit" class="btn btn-primary">Submit</button>

    </form>

@endsection
