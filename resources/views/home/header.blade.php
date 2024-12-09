<header class="bg-blue-50 shadow">
    <div class="container mx-auto px-4 py-4 flex justify-between items-center">
        <!-- Titre -->
        <h1 class="text-2xl font-bold text-blue-600 flex items-center space-x-2">
            <a href="{{ route('home') }}" class="hover:text-blue-800 transition">
                <i class="fas fa-tasks"></i>
                Gestion de Tâches
            </a>
        </h1>

        <!-- Navigation -->
        <nav class="flex items-center space-x-4">
            <!-- Liens communs -->
            <a href="{{ route('projects.index') }}" class="text-blue-500 hover:text-blue-700 transition">
                <i class="fas fa-folder"></i> Projets
            </a>
            <a href="{{ route('tasks.index') }}" class="text-blue-500 hover:text-blue-700 transition">
                <i class="fas fa-tasks"></i> Tâches
            </a>

            @guest
                <!-- Liens invités -->
                <a href="{{ route('login') }}" class="text-blue-500 hover:text-blue-700 transition">
                    <i class="fas fa-sign-in-alt"></i> Connexion
                </a>
                <a href="{{ route('register') }}" class="text-blue-500 hover:text-blue-700 transition">
                    <i class="fas fa-user-plus"></i> Inscription
                </a>
            @endguest

            @auth
                <!-- Liens authentifiés -->

                <a href="{{ route('statistics') }}" class="text-blue-500 hover:text-blue-700 transition">
                    <i class="fas fa-chart-line text-blue-500 hover:text-blue-700 transition duration-300 transform hover:scale-110"></i>
                    Statistiques
                </a>


                @if ($authRole === 'Admin')
                    <a href="{{ route('users.index') }}" class="text-blue-500 hover:text-blue-700 transition">
                        <i class="fas fa-users"></i> Gestion des utilisateurs
                    </a>
                @endif

                <a href="{{ route('projects.create') }}" class="text-blue-500 hover:text-blue-700 transition">
                    <i class="fas fa-plus"></i> Créer un Projet
                </a>
                <a href="{{ route('tasks.create') }}" class="text-blue-500 hover:text-blue-700 transition">
                    <i class="fas fa-plus-circle"></i> Créer une Tâche
                </a>

                <!-- Dropdown utilisateur -->
                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open" class="flex items-center space-x-2 text-blue-500 hover:text-blue-700 transition">
                        <span>{{ Auth::user()->name }}</span>
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div x-show="open" x-transition 
                         class="absolute right-0 mt-2 w-48 bg-white border rounded shadow-md z-20">
                        <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-gray-700 hover:bg-blue-100">
                            <i class="fas fa-user-circle"></i> Profil
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" 
                                    class="block w-full text-left px-4 py-2 text-gray-700 hover:bg-blue-100">
                                <i class="fas fa-sign-out-alt"></i> Déconnexion
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Notifications avec compteur -->
                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open" class="relative text-blue-500 hover:text-blue-700 transition">
                        <i class="fas fa-bell text-2xl"></i>
                        @if (auth()->user()->unread_notifications_count > 0)
                            <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full px-2 py-1 animate-pulse">
                                {{ auth()->user()->unread_notifications_count }}
                            </span>
                        @endif
                    </button>

                    <!-- Fenêtre des notifications -->
                    <div x-show="open" x-transition 
                         class="absolute top-12 right-0 bg-white border border-gray-300 shadow-md rounded-md p-4 w-72 z-10">
                        <h3 class="font-bold text-lg mb-2 text-blue-600">
                            <i class="fas fa-envelope"></i> Notifications
                        </h3>
                        <ul>
                            @forelse (auth()->user()->unreadNotifications as $notification)
                                <li class="mb-2">
                                    <p class="text-gray-700">
                                        <i class="fas fa-check-circle text-green-500"></i>
                                        {{ $notification->data['sender_name'] }} vous a assigné une tâche
                                        <span class="font-bold">"{{ $notification->data['project_name'] }}"</span>.
                                    </p>
                                </li>
                            @empty
                                <p class="text-gray-500">Aucune notification.</p>
                            @endforelse
                        </ul>
                        <button @click="open = false" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded-md w-full">
                            Fermer
                        </button>
                    </div>
                </div>
            @endauth
        </nav>
    </div>
</header>
