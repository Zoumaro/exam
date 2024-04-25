<?php

namespace App\Http\Controllers;
use App\Models\Chauffeur;
use Illuminate\Http\Request;

class ChauffeursController extends Controller
{
    

public function create()
{
    $chauffeurs = Chauffeur::where('disponible', 'oui')->get();
    return view('courses.create', compact('chauffeurs'));
}

}
