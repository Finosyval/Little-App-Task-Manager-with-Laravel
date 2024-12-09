@extends('layouts.pageBone')

@section('title', 'Gestion des utilisateurs')

@section('content')
    <h1 class="text-2xl font-semibold text-blue-600 mb-6">Gestion des utilisateurs</h1>

    @if ($users->isEmpty())
        <p class="text-gray-500">Aucun utilisateur trouvé.</p>
    @else
        <div class="overflow-x-auto bg-white shadow-lg rounded-xl">
            <table class="min-w-full table-auto border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-blue-100 text-blue-600">
                        <th class="border px-4 py-3 text-left">Nom</th>
                        <th class="border px-4 py-3 text-left">Email</th>
                        <th class="border px-4 py-3 text-left">Rôle</th>
                        <th class="border px-4 py-3 text-center">Projets</th>
                        <th class="border px-4 py-3 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr class="transition-all hover:bg-blue-50">
                            <td class="border px-4 py-3">{{ $user->name }}</td>
                            <td class="border px-4 py-3">{{ $user->email }}</td>
                            <td class="border px-4 py-3 capitalize">{{ $user->role }}</td>
                            <td class="border px-4 py-3 text-center">{{ $user->projects->count() }}</td>
                            <td class="border px-4 py-3 text-center space-x-4">
                                <!-- Voir les projets associés -->
                                <a href="{{ route('users.projects', $user) }}" class="text-blue-500 font-medium hover:text-blue-700 transition-colors">Voir projets</a>

                                <!-- Modifier le rôle -->
                               <!-- <a href="{{ route('users.edit', $user) }}" class="text-green-500 hover:text-green-700 transition-colors">Modifier rôle</a>-->

                                <!-- Supprimer l'utilisateur -->
                                <form action="{{ route('users.destroy', $user) }}" method="POST" class="inline-block">
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
@endsection
