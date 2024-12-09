@extends('layouts.pageBone')

@section('title', 'Créer un projet')

@section('content')
<div class="container mx-auto mt-8">
    <h1 class="text-3xl font-bold text-blue-600 flex items-center gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h11M9 21V3m12 7l-4-4m0 0l4-4m-4 4H9" />
        </svg>
        Créer un nouveau projet
    </h1>

    <form action="{{ route('projects.store') }}" method="POST" class="mt-6 bg-white p-6 shadow-lg rounded-lg">
        @csrf

        <!-- Titre -->
        <div class="mb-4">
            <label for="title" class="block text-gray-700 font-semibold">Titre du projet</label>
            <input type="text" id="title" name="title" 
                   class="border border-gray-300 rounded-lg p-3 w-full focus:ring focus:ring-blue-200 focus:border-blue-500"
                   placeholder="Entrez le titre du projet" required>
        </div>

        <!-- Description -->
        <div class="mb-4">
            <label for="description" class="block text-gray-700 font-semibold">Description</label>
            <textarea id="description" name="description" 
                      class="border border-gray-300 rounded-lg p-3 w-full focus:ring focus:ring-blue-200 focus:border-blue-500"
                      rows="4" placeholder="Décrivez le projet" required></textarea>
        </div>

        <!-- Date limite -->
        <div class="mb-4">
            <label for="deadline" class="block text-gray-700 font-semibold">Date limite</label>
            <input type="date" id="deadline" name="deadline" 
                   class="border border-gray-300 rounded-lg p-3 w-full focus:ring focus:ring-blue-200 focus:border-blue-500"
                   required>
        </div>

        <!-- Bouton Soumettre -->
        <div class="mb-4 flex justify-between items-center">
            <button type="submit" 
                    class="bg-blue-500 text-white py-2 px-6 rounded-lg shadow-md hover:bg-blue-600 transition duration-200 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h11M9 21V3m12 7l-4-4m0 0l4-4m-4 4H9" />
                </svg>
                Créer le projet
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
