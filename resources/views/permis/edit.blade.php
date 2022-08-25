@extends('layouts.app')

@section('content')


    <form action="{{route('permis.update',[$permi])}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="Num"  class="form-label">Numéro permis: </label>
            <input  class="form-control" id="Num" name="Num" value="{{old('Num',$permi->Num)}}">
        </div>
        <div class="mb-3">
            <label for="NumId"  class="form-label">Numéro carte d'identité: </label>
            <input  class="form-control" id="NumId" name="NumId" value="{{old('NumId',$permi->NumId)}}">
        </div>
        <div class="mb-3">
            <label for="Nom"  class="form-label">Nom: </label>
            <input  class="form-control" id="Nom" name="Nom" value="{{old('Nom',$permi->Nom)}}">
        </div>
        <div class="mb-3">
            <label for="Prenom"  class="form-label">Prénom: </label>
            <input  class="form-control" id="Prenom" name="Prenom" value="{{old('Prenom',$permi->Prenom)}}">
        </div>

        <div class="mb-3">
            <label for="Lieu" class="form-label">Lieu: </label>
            <input  class="form-control" id="Lieu" name="Lieu" value="{{old('Lieu',$permi->Lieu)}}">
        </div>
        <div class="mb-3">
            <label for="Description" class="form-label">Description </label>
            <input  class="form-control" id="Description" name="Description" value="{{old('Description',$permi->Description)}}">
        </div>
        <div class="mb-3">
            <label for="DateEdition" class="form-label">Date d'édition: </label>
            <input  type="date" class="form-control" id="DateEdition" name="DateEdition" value="{{old('DateEdition',$permi->DateEdition)}}">
        </div>
        <div class="mb-3">
            <label for="DateDelivrance" class="form-label">Date de délivrance: </label>
            <input  type="date" class="form-control" id="DateDelivrance" name="DateDelivrance" value="{{old('DateDelivrance',$permi->DateDelivrance)}}">
        </div>
        <div class="mb-3">
            <label for="DateReussite" class="form-label">Date de réussite: </label>
            <input  type="date" class="form-control" id="DateReussite" name="DateReussite" value="{{old('DateReussite',$permi->DateReussite)}}">
        </div>


        <a type="button" class="btn btn-secondary" href="{{route('permis.index')}}">Annuler</a>
        <button type="submit" class="btn btn-primary">Submit</button>

    </form>

@endsection
