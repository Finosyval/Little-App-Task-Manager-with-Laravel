<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StatisticsController;
Route::get('/', function () {
    return view('home.index');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//routes pour le profil utilisateur 
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//inclusion des routes d'authentification
require __DIR__.'/auth.php';

// Afficher tous les projets sans authentification
Route::get('projects', [ProjectController::class, 'index'])->name('projects.index');
Route::get('projects/create', [ProjectController::class, 'create'])->name('projects.create');
// Afficher toutes les tâches sans authentification
Route::get('tasks', [TaskController::class, 'index'])->name('tasks.index');
Route::get('tasks/create', [TaskController::class, 'create'])->name('tasks.create');
// Routes protégées, nécessitant l'authentification pour la création, modification, etc.
Route::middleware(['Auth.warning'])->group(function () {
    Route::resource('projects', ProjectController::class)->except([ 'index', 'create']);
    Route::resource('tasks', TaskController::class)->except([ 'index', 'create']);
});


//pour l'admin

Route::middleware(['auth', 'An admin'])->group(function () {
    Route::resource('users', UserController::class)->only(['index', 'edit', 'update', 'destroy']);
    // Route pour voir les projets d'un utilisateur
    Route::get('users/{user}/projects', [UserController::class, 'projects'])->name('users.projects');

});

//statistiques

Route::middleware('auth')->get('/statistics', [StatisticsController::class, 'index'])->name('statistics');

//notifications

Route::post('/notifications/{id}/read', [UserController::class, 'markNotificationAsRead'])->name('notifications.markAsRead');

