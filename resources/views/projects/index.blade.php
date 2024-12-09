@extends('layouts.pageBone')

@section('title', 'Liste des projets')

@section('content')
<div class="container mx-auto mt-8">
    <h1 class="text-3xl font-bold text-blue-600 mb-6 flex items-center gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-500 animate-bounce" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m2 0a2 2 0 100-4H7a2 2 0 100 4m2 0a2 2 0 100 4h6a2 2 0 100-4M9 16H7a2 2 0 110-4h6a2 2 0 110-4H7a2 2 0 110 4h6" />
        </svg>
        Liste des projets
    </h1>

    @if(empty($projects))
        <div class="text-center">
            <p class="text-gray-500 text-lg flex items-center justify-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400 animate-pulse" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M12 2a10 10 0 100 20 10 10 0 000-20z" />
                </svg>
                Vous n'avez pas encore de projet.
            </p>
            <a href="{{ route('projects.create') }}" 
               class="text-blue-500 hover:text-blue-700 font-semibold underline mt-4">
               Créer un projet
            </a>
        </div>
    @else
        <div class="overflow-x-auto bg-white shadow-lg rounded-lg">
            <table id="projects-table"  class="table-auto w-full border-collapse border border-gray-200">
                <thead class="bg-blue-100 text-blue-800">
                    <tr>
                        <th class="px-4 py-2 text-left">Titre du projet</th>
                        <th class="px-4 py-2 text-left">Statut</th>
                        <th class="px-4 py-2 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($projects as $project)


                        <tr class="hover:bg-blue-50 transition duration-200 ease-in-out">
                            <td class="px-4 py-2 text-gray-700">
                                <a href="{{ route('tasks.index', $project) }}" 
                                   class="text-blue-500 hover:text-blue-700 font-medium text-lg flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 10l-6 6-6-6" />
                                    </svg>
                                    {{ $project->title }}
                                </a>
                            </td>
                            <td class="px-4 py-2 text-gray-700">
                                <span class="px-2 py-1 text-sm font-semibold rounded-full
                                    {{ $project->status === 'En cours' ? 'bg-yellow-100 text-yellow-600' : 'bg-green-100 text-green-600' }}">
                                    {{ $project->status }}
                                </span>
                            </td>
                            <td class="px-4 py-2 flex space-x-4">
                                <!-- Modifier -->
                                <a href="{{ route('projects.edit', $project->id) }}" 
                                   class="text-blue-500 hover:text-blue-700 font-medium flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-2.036a2.5 2.5 0 113.536 3.536L7 21H3v-4L16.732 6.732z" />
                                    </svg>
                                    Modifier
                                </a>
                                <!-- Supprimer -->
                                <form action="{{ route('projects.destroy', $project->id) }}" method="POST" 
                                      onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce projet ?');" 
                                      class="flex items-center gap-1">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="text-red-500 hover:text-red-700 font-medium flex items-center gap-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                        Supprimer
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
