@extends('layouts.app')

@section('content')

<form>

        <form action="{{route('permis.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="Num">Numéro permis:</label>
                <input type="text" class="form-control" id="Num">
              </div>
      <div class="form-group">
        <label for="NumId">Numéro carte d'identité:</label>
        <input type="text" class="form-control" id="NumId">
      </div>
      <div class="form-group">
        <label for="Nom">Nom:</label>
        <input type="text" class="form-control" id="Nom">
      </div>
      <div class="form-group">
        <label for="Prenom">Prénom:</label>
        <input type="text" class="form-control" id="Prenom">
      </div>
      <div class="form-group">
        <label for="Lieu">Lieu:</label>
        <input type="text" class="form-control" id="Lieu">
      </div>
      <div class="form-group">
        <label for="DateEdition">Date d'édition:</label>
        <input type="date" class="form-control" id="DateEdition">
      </div>
      <div class="form-group">
        <label for="DateDelivrance">Date de délivrance:</label>
        <input type="date" class="form-control" id="DateDelivrance">
      </div>
      <div class="form-group">
        <label for="DateReussite">Date de réussite</label>
        <input type="date" class="form-control" id="DateReussite">
      </div>
      <div class="form-group">
        <label for="Description">Description</label>
        <input type="text" class="form-control" id="Description">
      </div>


      <button type="submit" class="btn btn-primary">Submit</button>

    </form>

    @endsection
