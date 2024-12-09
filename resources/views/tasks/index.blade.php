@extends('layouts.pageBone')

@section('title', 'Liste des tâches')

@section('content')
<div class="container mx-auto mt-8">
    <h1 class="text-3xl font-bold text-blue-600 mb-6 flex items-center gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-500 animate-bounce" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m2 0a2 2 0 100-4H7a2 2 0 100 4m2 0a2 2 0 100 4h6a2 2 0 100-4M9 16H7a2 2 0 110-4h6a2 2 0 110-4H7a2 2 0 110 4h6" />
        </svg>
        Liste des tâches
    </h1>

    @if($tasks->isEmpty())
        <p class="text-gray-500 text-lg text-center flex items-center justify-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400 animate-pulse" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M12 2a10 10 0 100 20 10 10 0 000-20z" />
            </svg>
            Il n'y a pas encore de tâches.
        </p>
    @else
        <div class="overflow-x-auto bg-white shadow-lg rounded-lg">
            <table  id="tasks-table" class="table-auto w-full border-collapse border border-gray-200">
                <thead class="bg-blue-100 text-blue-800">
                    <tr>
                        <th class="border px-4 py-2">Titre</th>
                        <th class="border px-4 py-2">Description</th>
                        <th class="border px-4 py-2">Statut</th>
                        <th class="border px-4 py-2">Priorité</th>
                        <th class="border px-4 py-2">Projet</th>
                        <th class="border px-4 py-2">Assigné à</th>
                        <th class="border px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tasks as $task)
                        <tr class="hover:bg-blue-50 transition duration-200 ease-in-out">
                            <td class="border px-4 py-2 flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 10h16m-7 4h7" />
                                </svg>
                                {{ $task->title }}
                            </td>
                            <td class="border px-4 py-2 text-gray-700">{{ $task->description }}</td>
                            <td class="border px-4 py-2">
                                <span class="px-3 py-1 text-sm rounded-full animate-pulse 
                                    @if($task->status === 'termine')
                                        bg-green-200 text-green-800
                                    @elseif($task->status === 'en_cours')
                                        bg-yellow-200 text-yellow-800
                                    @else
                                        bg-red-200 text-red-800
                                    @endif">
                                    {{ ucfirst($task->status) }}
                                </span>
                            </td>
                            <td class="border px-4 py-2 text-gray-700">{{ $task->priority }}</td>
                            <td class="border px-4 py-2 text-gray-700">{{ $task->project->title }}</td>
                            <td class="border px-4 py-2 text-gray-700">
                                @if($task->assignedUser)
                                    <div class="flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 11c1.657 0 3-1.343 3-3S13.657 5 12 5 9 6.343 9 8s1.343 3 3 3zm0 2c-3.333 0-6 2.667-6 6v1h12v-1c0-3.333-2.667-6-6-6z" />
                                        </svg>
                                        {{ $task->assignedUser->name }}
                                    </div>
                                @else
                                    <span class="text-gray-500 italic">Aucun utilisateur assigné</span>
                                @endif
                            </td>
                            <td class="border px-4 py-2 text-center">
                                <div class="flex justify-center items-center gap-2">
                                    <a href="{{ route('tasks.edit', $task->id) }}" 
                                        class="text-blue-500 hover:text-blue-700 font-medium flex items-center gap-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-2.036a2.5 2.5 0 113.536 3.536L7 21H3v-4L16.732 6.732z" />
                                    </svg>
                                    Modifier
                                    </a>
                                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" 
                                          onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette tâche ?');">
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
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection

