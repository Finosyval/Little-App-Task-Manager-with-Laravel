<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use App\Notifications\TaskAssigned;

class TaskController extends Controller
{
    /**
     * Affiche toutes les tâches d'un projet.
     */
    public function index()
    {
        if (auth()->check()) {
            // Si l'utilisateur est connecté, récupérer uniquement les tâches liées à ses projets
            $tasks = Task::with(['project', 'assignedUser'])
                ->whereHas('project', function ($query) {
                    $query->where('user_id', auth()->id());
                })
                ->get();
        } else {
            // Si l'utilisateur est un invité, aucune tâche n'est affichée
            $tasks = collect(); // Une collection vide pour éviter les erreurs
        }
    
        return view('tasks.index', compact('tasks'));
    }
    
    
    /**
     * Affiche le formulaire de création d'une tâche pour un projet.
     */
    public function create()
{
    // Récupérer tous les projets associés à l'utilisateur authentifié
    $projects = Project::where('user_id', auth()->id())->get();

    // Récupérer tous les utilisateurs sauf l'administrateur (par exemple, role 'admin')
    $users = User::where('role', '!=', 'Admin')
    ->where('id', '!=', auth()->id()) // Exclure l'utilisateur connecté
    ->get();

    // Passer les variables $projects et $users à la vue
    return view('tasks.create', compact('projects', 'users'));
}

    

 /**
     * Enregistre une nouvelle tâche pour un projet.
     */
    public function store(Request $request)
{
    // Validation des champs
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'status' => 'required|string',
        'priority' => 'required|string',
        'project_id' => 'required|exists:projects,id',
        'assigned_to' => 'nullable|exists:users,id', // Si assigné à un utilisateur
    ]);

    // Création de la tâche
    $task = Task::updateOrCreate([
        'title' => $request->title,
        'description' => $request->description,
        'status' => $request->status,
        'priority' => $request->priority,
        'project_id' => $request->project_id,
        'assigned_to' => $request->assigned_to, // Si assigné à un utilisateur
    ]);

    // Si un utilisateur est assigné, envoyer une notification
    if ($task->assigned_to) {
        $assignedUser = $task->assignedUser; // Récupérer l'utilisateur assigné
        $assignedUser->notify(new TaskAssigned($task)); // Envoi de la notification
    }

    // Rediriger après la création de la tâche
    return redirect()->route('tasks.index')->with('success', 'La tâche a été créée avec succès!');
}

    


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

//Dès ici on aura à l'utiliser

  /**
     * fonction qui vérifie que la tâche appartient bien au projet.
     */
protected function authorizeTaskBelongsToProject(Project $project, Task $task)
{
    if ($task->project_id !== $project->id) {
        abort(404, 'Cette tâche n’appartient pas au projet.');
    }
}


   /**
     * Affiche le formulaire d'édition d'une tâche.
     */
    public function edit($id)
    {
        // Récupère la tâche avec son projet associé et l'utilisateur assigné
        $task = Task::with('project')->findOrFail($id);
        
        // Récupère tous les utilisateurs pour le champ "Assigné à"
        $users = User::all();
    
        return view('tasks.edit', compact('task', 'users'));
    }
    


   
    
    public function update(Request $request, $id)
    {
        // Valider les données du formulaire
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|in:Non commencé,En cours,Terminé',
            'priority' => 'required|in:basse,moyenne,haute',
            'assigned_to' => 'nullable|exists:users,id', // Vérifie que l'utilisateur assigné existe
        ]);
    
        // Récupérer la tâche à mettre à jour
        $task = Task::findOrFail($id);
    
        // Mettre à jour les champs de la tâche avec les données validées
        $task->title = $validated['title'];
        $task->description = $validated['description'];
        $task->status = $validated['status'];
        $task->priority = $validated['priority'];
        $task->assigned_to = $validated['assigned_to'] ?? null; // Si aucun utilisateur n'est assigné, mettre null
        $task->save();
    
        // Si une nouvelle personne est assignée, envoyer une notification
        if ($task->assigned_to) {
            $assignedUser = $task->assignedUser; // L'utilisateur assigné à la tâche
            $assignedUser->notify(new TaskAssigned($task)); // Envoi de la notification
        }
    
        // Rediriger l'utilisateur avec un message de succès
        return redirect()->route('tasks.index')->with('success', 'La tâche a été mise à jour avec succès.');
    }
    
  /**
     * Supprime une tâche.
     */
    public function destroy(Project $project, Task $task)
    {
        //$this->authorizeTaskBelongsToProject($project, $task); // Vérifie l'association

        $task->delete();

        return redirect()->route('tasks.index')
            ->with('success', 'La tâche a été supprimée avec succès.');
    }
}
