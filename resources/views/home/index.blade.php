@extends('layouts.pageBone')

@section('title', 'Accueil')

@section('content')
@if(session('success'))
    <div class="bg-green-500 text-white p-4 mb-4 rounded shadow-md animate-bounce">
        {{ session('success') }}
    </div>
@endif

<div class="bg-gradient-to-b from-blue-50 via-white to-blue-100 min-h-screen flex flex-col items-center justify-center">
    <!-- Section principale -->
    <div class="text-center px-6 py-12">
        <h1 class="text-5xl font-bold text-blue-600 mb-4 animate-fade-in-down">
            Bienvenue sur <span class="text-blue-800">Gestion de Tâches</span>
        </h1>
        <p class="text-lg text-gray-700 mb-8 animate-fade-in-up">
            Organisez vos projets et tâches avec simplicité. Collaborez avec vos équipes efficacement et gardez le contrôle sur vos objectifs.
        </p>

        <div class="flex justify-center space-x-4">
            <a href="{{ route('projects.index') }}"
               class="px-6 py-3 bg-blue-500 text-white rounded-lg shadow-md hover:bg-blue-600 transition transform hover:scale-105">
                <i class="fas fa-folder-open mr-2"></i> Découvrir vos Projets
            </a>
        </div>
    </div>

    <!-- Section des fonctionnalités -->
    <div class="bg-white w-full py-16">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-blue-800 mb-12 animate-fade-in-down">
                Ce que vous pouvez faire :
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12 animate-fade-in-up">
                <!-- Fonctionnalité 1 -->
                <div class="flex flex-col items-center text-center">
                    <div class="bg-blue-100 p-4 rounded-full shadow-md transform transition hover:scale-110">
                        <svg class="w-16 h-16 text-blue-500" fill="none" stroke="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 20l9-5-9-5-9 5 9 5z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 12l9-5-9-5-9 5 9 5z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-blue-800 mt-4">Créer et gérer des projets</h3>
                    <p class="text-gray-600 mt-2">Structurez vos projets, suivez leur progression et atteignez vos objectifs.</p>
                </div>

                <!-- Fonctionnalité 2 -->
                <div class="flex flex-col items-center text-center">
                    <div class="bg-blue-100 p-4 rounded-full shadow-md transform transition hover:scale-110">
                        <svg class="w-16 h-16 text-blue-500" fill="none" stroke="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16l4-4-4-4m8 8l-4-4 4-4"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-blue-800 mt-4">Collaborer efficacement</h3>
                    <p class="text-gray-600 mt-2">Assignez des tâches, partagez des idées et réalisez vos projets en équipe.</p>
                </div>

                <!-- Fonctionnalité 3 -->
                <div class="flex flex-col items-center text-center">
                    <div class="bg-blue-100 p-4 rounded-full shadow-md transform transition hover:scale-110">
                        <svg class="w-16 h-16 text-blue-500" fill="none" stroke="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4h16v16H4z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-blue-800 mt-4">Visualiser vos progrès</h3>
                    <p class="text-gray-600 mt-2">Suivez les statistiques et l’état d’avancement de vos tâches et projets.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
