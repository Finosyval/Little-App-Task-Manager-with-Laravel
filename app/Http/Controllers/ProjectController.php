<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use Auth;


class ProjectController extends Controller
{
    // Lister tous les projets
    public function index()
    {
        if (auth()->check()) {
            $projects = auth()->user()->projects;
        } else {
            $projects = []; // Ou vous pouvez rediriger ou afficher un message spécifique.
        }
    // Retourne la vue avec les projets
    return view('projects.index', compact('projects'));
    }

     // Formulaire pour créer un projet
     public function create()
     {
         return view('projects.create');
     }
 

   // Sauvegarder un projet
   public function store(Request $request)
   {
       if (!Auth::check()) {
           // Redirection si l'utilisateur n'est pas authentifié
           return redirect()->route('login')->with('warning', 'Vous devez d\'abord vous authentifier pour soumettre un projet.');
       }
   
       $request->validate([
           'title' => 'required|string|max:255',
           'description' => 'required|string',
           'deadline' => 'required|date',
       ]);
   
       // Créer le projet et l'associer à l'utilisateur authentifié
       Auth::user()->projects()->create([
           'title' => $request->title,
           'description' => $request->description,
           'deadline' => $request->deadline,
           'status' => 'En cours', 
       ]);
           
       return redirect()->route('projects.index');
   }
   
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    // Formulaire pour modifier un projet
    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

      // Mettre à jour un projet dans la base de données
      public function update(Request $request, Project $project)
      {
          $request->validate([
              'title' => 'required|string|max:255',
              'description' => 'required|string',
              'due_date' => 'required|date',
          ]);
  
          $project->update([
              'title' => $request->title,
              'description' => $request->description,
              'due_date' => $request->due_date,
          ]);
  
          return redirect()->route('projects.index');
      }
    /**
     * Remove the specified resource from storage.
     */
   // Supprimer un projet
   public function destroy(Project $project)
   {
       $project->delete();
       return redirect()->route('projects.index');
   }
}
