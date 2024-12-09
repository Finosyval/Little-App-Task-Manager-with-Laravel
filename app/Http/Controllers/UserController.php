<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class UserController extends Controller
{
    //
    public function index()
    {
        $users = User::with('projects')->get(); // Charge les projets associés
        return view('users.index', compact('users'));
    }
    

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'role' => 'required|in:Admin,User',
        ]);

        $user->update($validatedData);
        return redirect()->route('users.index')->with('success', 'Utilisateur mis à jour.');
    }


    public function projects(User $user)
    {
        $projects = $user->projects()->with('tasks')->get(); // Charge les projets et leurs tâches associées
        return view('users.projects', compact('user', 'projects'));
    }
    


    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Utilisateur supprimé.');
    }


    public function markNotificationAsRead($notificationId)
    {
        $user = Auth::user(); // Récupérer l'utilisateur actuellement authentifié
        $user->markUserNotificationAsRead($notificationId); // Appeler la méthode du modèle User
    
        // Retourner une réponse ou rediriger
        return response()->json(['success' => true]);
    }

}
