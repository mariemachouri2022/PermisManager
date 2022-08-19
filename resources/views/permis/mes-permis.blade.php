@extends('layouts.app')

@section('content')


    <a type="button" href="{{route('permis.create')}}" class="btn btn-primary">Ajouter</a>



    @include('layouts.liste-permis')






@endsection
