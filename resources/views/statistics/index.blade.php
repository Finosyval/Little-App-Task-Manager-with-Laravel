@extends('layouts.pageBone')
@section('title', 'Statistiques')

@section('content')

<div class="container mx-auto mt-8 px-4">
    <h1 class="text-4xl font-semibold text-blue-600 mb-6 text-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 inline-block mr-3 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v18m9-9H3" />
        </svg>
        Vos Statistiques
    </h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Statistiques Projet en Cours -->
        <div class="bg-white rounded-lg shadow-lg p-6 transform transition duration-300 hover:scale-105 hover:shadow-xl">
            <div class="flex items-center space-x-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 5h18M3 10h18M3 15h18M3 20h18" />
                </svg>
                <div>
                    <p class="text-lg font-semibold text-gray-700">Projets en cours</p>
                    <p class="text-2xl font-bold text-blue-600">{{ $ongoingProjects }}</p>
                </div>
            </div>
        </div>

        <!-- Statistiques Projets Terminés -->
        <div class="bg-white rounded-lg shadow-lg p-6 transform transition duration-300 hover:scale-105 hover:shadow-xl">
            <div class="flex items-center space-x-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4M5 12l2 2 4-4" />
                </svg>
                <div>
                    <p class="text-lg font-semibold text-gray-700">Projets terminés</p>
                    <p class="text-2xl font-bold text-blue-600">{{ $completedProjects }}</p>
                </div>
            </div>
        </div>

        <!-- Statistiques Tâches en Cours -->
        <div class="bg-white rounded-lg shadow-lg p-6 transform transition duration-300 hover:scale-105 hover:shadow-xl">
            <div class="flex items-center space-x-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M7 10l5 5 5-5" />
                </svg>
                <div>
                    <p class="text-lg font-semibold text-gray-700">Tâches en cours</p>
                    <p class="text-2xl font-bold text-blue-600">{{ $ongoingTasks }}</p>
                </div>
            </div>
        </div>

        <!-- Statistiques Tâches Terminées -->
        <div class="bg-white rounded-lg shadow-lg p-6 transform transition duration-300 hover:scale-105 hover:shadow-xl">
            <div class="flex items-center space-x-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12M6 12h12" />
                </svg>
                <div>
                    <p class="text-lg font-semibold text-gray-700">Tâches terminées</p>
                    <p class="text-2xl font-bold text-blue-600">{{ $completedTasks }}</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
