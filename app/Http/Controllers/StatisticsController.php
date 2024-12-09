<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class StatisticsController extends Controller
{
    public function index()
    {
        // recupere l'user authentifié
        $user = Auth::user();

        // compte du nombre de projets en cours et terminés
        $ongoingProjects = Project::where('user_id', $user->id)->where('status', 'En cours')->count();
        $completedProjects = Project::where('user_id', $user->id)->where('status', 'Terminé')->count();

        // compte du nombre de taches en cours et terminés
        $ongoingTasks = Task::whereHas('project', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->where('status', 'En cours')->count();
        
        $completedTasks = Task::whereHas('project', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->where('status', 'Terminé')->count();
        

        
        return view('statistics.index', compact('ongoingProjects', 'completedProjects', 'ongoingTasks', 'completedTasks'));
    }
}
