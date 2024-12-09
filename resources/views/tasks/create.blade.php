@extends('layouts.pageBone')

@section('title', 'Créer une Tâche')

@section('content')
<div class="container mx-auto mt-8">
    <h1 class="text-3xl font-bold text-blue-600 flex items-center gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h11m4 0h4m-9 5H9m9-5H9m9-5h3M3 5h11m3 0h4M3 15h11m9 0h-4m-3 5h-7m-3-5h7" />
        </svg>
        Créer une nouvelle tâche
    </h1>

    <form action="{{ route('tasks.store') }}" method="POST" class="mt-6 bg-white p-6 shadow-lg rounded-lg">
        @csrf

        <!-- Titre -->
        <div class="mb-4">
            <label for="title" class="block text-gray-700 font-semibold">Titre de la tâche</label>
            <input type="text" id="title" name="title" 
                   class="border border-gray-300 rounded-lg p-3 w-full focus:ring focus:ring-blue-200 focus:border-blue-500"
                   placeholder="Entrez le titre de la tâche" required>
        </div>

        <!-- Description -->
        <div class="mb-4">
            <label for="description" class="block text-gray-700 font-semibold">Description</label>
            <textarea id="description" name="description" 
                      class="border border-gray-300 rounded-lg p-3 w-full focus:ring focus:ring-blue-200 focus:border-blue-500"
                      rows="4" placeholder="Décrivez la tâche en détail" required></textarea>
        </div>

        <!-- Statut -->
        <div class="mb-4">
            <label for="status" class="block text-gray-700 font-semibold">Statut</label>
            <select id="status" name="status" 
                    class="border border-gray-300 rounded-lg p-3 w-full focus:ring focus:ring-blue-200 focus:border-blue-500"
                    required>
                <option value="Non commencé">Non commencé</option>
                <option value="En cours">En cours</option>
                <option value="Terminé">Terminé</option>
            </select>
        </div>

        <!-- Priorité -->
        <div class="mb-4">
            <label for="priority" class="block text-gray-700 font-semibold">Priorité</label>
            <select id="priority" name="priority" 
                    class="border border-gray-300 rounded-lg p-3 w-full focus:ring focus:ring-blue-200 focus:border-blue-500"
                    required>
                <option value="basse">Basse</option>
                <option value="moyenne">Moyenne</option>
                <option value="haute">Haute</option>
            </select>
        </div>

        <!-- Projet -->
        <div class="mb-4">
            <label for="project_id" class="block text-gray-700 font-semibold">Sélectionner un projet</label>
            <select id="project_id" name="project_id" 
                    class="border border-gray-300 rounded-lg p-3 w-full focus:ring focus:ring-blue-200 focus:border-blue-500"
                    required>
                <option value="" disabled selected>Choisir un projet</option>
                @foreach($projects as $project)
                    <option value="{{ $project->id }}">{{ $project->title }}</option>
                @endforeach
            </select>
        </div>

        <!-- Utilisateur assigné -->
        <div class="mb-4">
            <label for="assigned_to" class="block text-gray-700 font-semibold">Assigner à un utilisateur</label>
            <select id="assigned_to" name="assigned_to" 
                    class="border border-gray-300 rounded-lg p-3 w-full focus:ring focus:ring-blue-200 focus:border-blue-500">
                <option value="" disabled selected>Choisir un utilisateur</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Bouton Soumettre -->
        <div class="mb-4 flex justify-between items-center">
            <button type="submit" 
                    class="bg-blue-500 text-white py-2 px-6 rounded-lg shadow-md hover:bg-blue-600 transition duration-200 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M12 5l7 7-7 7" />
                </svg>
                Créer la tâche
            </button>
            <a href="{{ route('tasks.index') }}" 
               class="text-blue-500 hover:text-blue-700 flex items-center gap-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                </svg>
                Retourner à la liste des tâches
            </a>
        </div>
    </form>
</div>
@endsection
