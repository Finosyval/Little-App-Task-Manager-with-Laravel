@extends('layouts.pageBone')

@section('title', 'Modifier la tâche')

@section('content')
<div class="container mx-auto mt-8">
    <h1 class="text-3xl font-bold text-blue-600 flex items-center gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M12 5l7 7-7 7" />
        </svg>
        Modifier la tâche : <span class="text-gray-800 ml-2">{{ $task->title }}</span>
    </h1>

    <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="mt-6 bg-white p-6 shadow-lg rounded-lg">
        @csrf
        @method('PUT')

        <!-- Titre -->
        <div class="mb-4">
            <label for="title" class="block text-gray-700 font-semibold">Titre de la tâche</label>
            <input type="text" id="title" name="title" 
                   class="border border-gray-300 rounded-lg p-3 w-full focus:ring focus:ring-blue-200 focus:border-blue-500"
                   value="{{ old('title', $task->title) }}" required>
        </div>

        <!-- Description -->
        <div class="mb-4">
            <label for="description" class="block text-gray-700 font-semibold">Description</label>
            <textarea id="description" name="description" 
                      class="border border-gray-300 rounded-lg p-3 w-full focus:ring focus:ring-blue-200 focus:border-blue-500"
                      rows="4" required>{{ old('description', $task->description) }}</textarea>
        </div>

        <!-- Statut -->
        <div class="mb-4">
            <label for="status" class="block text-gray-700 font-semibold">Statut</label>
            <select id="status" name="status" 
                    class="border border-gray-300 rounded-lg p-3 w-full focus:ring focus:ring-blue-200 focus:border-blue-500"
                    required>
                <option value="Non commencé" {{ old('status', $task->status) == 'Non commencé' ? 'selected' : '' }}>Non commencé</option>
                <option value="En cours" {{ old('status', $task->status) == 'En cours' ? 'selected' : '' }}>En cours</option>
                <option value="Terminé" {{ old('status', $task->status) == 'Terminé' ? 'selected' : '' }}>Terminé</option>
            </select>
        </div>

        <!-- Priorité -->
        <div class="mb-4">
            <label for="priority" class="block text-gray-700 font-semibold">Priorité</label>
            <select id="priority" name="priority" 
                    class="border border-gray-300 rounded-lg p-3 w-full focus:ring focus:ring-blue-200 focus:border-blue-500"
                    required>
                <option value="basse" {{ old('priority', $task->priority) == 'basse' ? 'selected' : '' }}>Basse</option>
                <option value="moyenne" {{ old('priority', $task->priority) == 'moyenne' ? 'selected' : '' }}>Moyenne</option>
                <option value="haute" {{ old('priority', $task->priority) == 'haute' ? 'selected' : '' }}>Haute</option>
            </select>
        </div>

        <!-- Assigné à -->
        <div class="mb-4">
            <label for="assigned_to" class="block text-gray-700 font-semibold">Assigné à</label>
            <select id="assigned_to" name="assigned_to" 
                    class="border border-gray-300 rounded-lg p-3 w-full focus:ring focus:ring-blue-200 focus:border-blue-500">
                <option value="">Aucun utilisateur assigné</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ old('assigned_to', $task->assigned_to) == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
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
                Mettre à jour la tâche
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
