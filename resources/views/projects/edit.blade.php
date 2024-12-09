@extends('layouts.pageBone')

@section('title', 'Modifier le projet')

@section('content')
<div class="container mx-auto mt-8">
    <h1 class="text-3xl font-bold text-blue-600 flex items-center gap-2 mb-6">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m6 4h-2a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2v7a2 2 0 01-2 2zM7 16H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2v7a2 2 0 01-2 2z" />
        </svg>
        Modifier le projet : <span class="text-gray-800">{{ $project->title }}</span>
    </h1>

    <form action="{{ route('projects.update', $project->id) }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
        @csrf
        @method('PUT')

        <!-- Titre du projet -->
        <div class="mb-4">
            <label for="title" class="block text-gray-700 font-semibold">Titre du projet</label>
            <input type="text" id="title" name="title" 
                   value="{{ old('title', $project->title) }}" 
                   class="border border-gray-300 rounded-lg p-3 w-full focus:ring focus:ring-blue-200 focus:border-blue-500" 
                   required>
        </div>

        <!-- Description du projet -->
        <div class="mb-4">
            <label for="description" class="block text-gray-700 font-semibold">Description</label>
            <textarea id="description" name="description" 
                      class="border border-gray-300 rounded-lg p-3 w-full focus:ring focus:ring-blue-200 focus:border-blue-500" 
                      rows="4" required>{{ old('description', $project->description) }}</textarea>
        </div>

        <!-- Date limite -->
        <div class="mb-4">
            <label for="deadline" class="block text-gray-700 font-semibold">Date limite</label>
            <input type="date" id="deadline" name="deadline" 
                   value="{{ old('deadline', $project->deadline) }}" 
                   class="border border-gray-300 rounded-lg p-3 w-full focus:ring focus:ring-blue-200 focus:border-blue-500" 
                   required>
        </div>

        <!-- Statut -->
        <div class="mb-4">
            <label for="status" class="block text-gray-700 font-semibold">Statut</label>
            <select id="status" name="status" 
                    class="border border-gray-300 rounded-lg p-3 w-full focus:ring focus:ring-blue-200 focus:border-blue-500" 
                    required>
              
                <option value="en_cours" {{ old('status', $project->status) == 'en_cours' ? 'selected' : '' }}>En cours</option>
                <option value="termine" {{ old('status', $project->status) == 'termine' ? 'selected' : '' }}>Terminé</option>
            </select>
        </div>

        <!-- Bouton de soumission -->
        <div class="flex justify-between items-center">
            <button type="submit" 
                    class="bg-blue-500 text-white py-2 px-6 rounded-lg shadow hover:bg-blue-600 transition duration-200 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 16h16M4 12h16M4 8h16" />
                </svg>
                Modifier le projet
            </button>

            <a href="{{ route('projects.index') }}" 
               class="text-blue-500 hover:text-blue-700 flex items-center gap-1 transition duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                </svg>
                Retourner à la liste des projets
            </a>
        </div>
    </form>
</div>
@endsection
