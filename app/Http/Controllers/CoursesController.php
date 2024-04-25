<?php

namespace App\Http\Controllers;


use App\Models\Course;
use App\Models\Chauffeur;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CoursesController extends Controller
{
    public function create()
    {
        $chauffeurs = Chauffeur::where('disponible', 'oui')->get();
        return view('create', compact('chauffeurs'));
    }


    public function store(Request $request)
    {


        $request->validate([
            'point_depart' => 'required',
            'point_arrivee' => 'required',
            'date_heure' => 'required|date',
            'chauffeur_affecte' => 'nullable|exists:chauffeurs,id_chauffeur',
        ]);
        $course = new Course([
            'point_depart' => $request->input('point_depart'),
            'point_arrivee' => $request->input('point_arrivee'),
            'date_heure' => $request->input('date_heure'),
            'id_chauffeur' => $request->input('chauffeur_affecte'),
            // 'status' => 'en_attente',
        ]);

        $course->save();



        return redirect()->route('courses.index')->with('success', 'Course ajoutée avec succès!');
    }

    public function show(Course $course)
    {
        return view('courses.show', compact('course'));
    }


    public function edit(Course $course)

    {
        $course = Course::findorFail($course->id_course);
        return view('edit', compact('course'));
    }


    public function update(Request $request, Course $course)
    {
        $validateData = $request->validate([
            'status' => 'required|in:en_cours,terminer',
        ]);

       $updatedCourse = Course::where('id_course', $course->id_course)->first();
       $updatedCourse->status = $request->status;
$updatedCourse->save();
        return redirect()->route('courses.index')->with('success', 'status de la course mis à jour avec succès!');
    }


    public function index()
    {
        $courses = Course::all();
        return view('index', compact('courses'));
    }


    public function supprimer(Course $course)
    {
        $course->delete();
        return redirect()->route('courses.index')->with('success', 'Course supprimée avec succès!');
    }
}
