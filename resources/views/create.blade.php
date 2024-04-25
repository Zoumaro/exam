@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Ajouter une nouvelle course</h2>
    <form action="{{ route('courses.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="point_depart">Point de départ:</label>
            <input type="text" class="form-control" id="point_depart" name="point_depart" required>
        </div>
        <div class="form-group">
            <label for="point_arrivee">Point d'arrivée:</label>
            <input type="text" class="form-control" id="point_arrivee" name="point_arrivee" required>
        </div>
        <div class="form-group">
            <label for="date_heure">Date et heure prévues:</label>
            <input type="datetime-local" class="form-control" id="date_heure" name="date_heure" required>
        </div>
    
        <div class="form-group">
    <label for="chauffeur_affecte">Chauffeur affecté:</label>
    <select class="form-control" id="chauffeur_affecte" name="chauffeur_affecte">
        <option value="">Sélectionnez un chauffeur</option>
        @foreach($chauffeurs as $chauffeur)
            <option value="{{ $chauffeur->id_chauffeur }}">{{ $chauffeur->nom }} {{ $chauffeur->prenoms }}</option>
        @endforeach
    </select>
    </div>
    <br>
    <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
</div>
@endsection
