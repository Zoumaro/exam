@extends('layouts.app')

@section('content')
<div class="container">
@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
    <h2>Mettre à jour le statut de la course</h2>
    <form action="{{ route('courses.update', $course->id_course) }}" method="post" style="display: contents;" onsubmit="return confirm('voulez vous modifier la statut de la course ?');"> 
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="status">Statut de la course:</label>
            <select class="form-control" id="status" name="status">
                <option value="en_cours">En cours</option>
                <option value="terminer">Terminer</option>
            </select>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>
@endsection


