@extends('layouts.pageBone')

@section('title', 'Projets de ' . $user->name)

@section('content')
    <h1 class="text-2xl font-bold text-blue-600 mb-6 flex items-center">
        <svg class="w-6 h-6 mr-2 text-blue-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M12 2v20m10-10H2"></path>
        </svg>
        Projets de {{ $user->name }}
    </h1>

    @if ($projects->isEmpty())
        <p class="text-gray-500">Cet utilisateur n'a pas de projets pour le moment.</p>
    @else
        <ul class="space-y-4">
            @foreach ($projects as $project)
                <li class="p-4 bg-white rounded-lg shadow-md hover:shadow-lg transition-all">
                    <div class="flex items-center mb-2">
                        <svg class="w-5 h-5 text-blue-500 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                            <path d="M17 10l4-4m0 0l-4-4m4 4H3"></path>
                        </svg>
                        <strong class="text-xl text-gray-800">{{ $project->title }}</strong>
                    </div>
                    
                    <p class="text-gray-600 mb-2 line-clamp-3">{{ $project->description }}</p>
                    <p class="text-sm text-gray-500">
                        <svg class="w-4 h-4 inline mr-1 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"></circle>
                        </svg>
                        Tâches associées : <span class="font-semibold">{{ $project->tasks->count() }}</span>
                    </p>
                </li>
            @endforeach
        </ul>
    @endif
@endsection
