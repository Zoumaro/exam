<@extends('layouts.app') 
@section('content') 
<div class="container">
    <h2>Liste des Courses</h2>
    @if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
    <div class="mb-3">
        <a href="{{ route('courses.create') }}" class="btn btn-primary">Ajouter une nouvelle course</a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Point de départ</th>
                <th scope="col">Point d'arrivée</th>
                <th scope="col">Date et heure</th>
                <th scope="col">Chauffeur affecté</th>
                <th scope="col">Statut de la course</th>
            </tr>
        </thead>
        <tbody>
            @foreach($courses as $course)
            <tr>
                <td>{{ $course->id_course}}</td>
                <td>{{ $course->point_depart }}</td>
                <td>{{ $course->point_arrivee }}</td>
                <td>{{ $course->date_heure }}</td>
                <td>
                    @if($course->id_chauffeur)
                    {{ $course->id_chauffeur}}
                    @else
                    Aucun chauffeur affecté
                    @endif

                </td>
                <td>{{ $course->status }}</td>
                <td> <a href="{{ route('courses.edit', $course->id_course) }}" class="btn btn-primary">Modifier Statut</a>

                    <form action="{{ route('courses.supprimer', $course->id_course) }}" method="POST" style="display: contents;" onsubmit="return confirm('voulez vous supprimer la course ?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach

        </tbody>

    </table>
    </div>
    @endsection


  