<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Gestion de Tâches')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js']) 

    <!-- datatable dependances css-->
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css">
        
     <!-- Inclure FontAwesome via CDN -->
     <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
   
   <script>
        @if (session('warning'))
            window.flashMessage = {
                type: 'warning',
                message: @json(session('warning'))
            };
        @endif
    </script>
    

</head>
<body class="bg-gray-100">
    @include('home.header') <!-- Le header commun à toutes les pages -->

    <main>
        @if(session('warning'))
    <div class="alert alert-warning text-center bg-yellow-100 text-yellow-800 p-4 rounded mb-4">
        {{ session('warning') }}
    </div>
@endif
        @yield('content') <!-- Section dynamique pour le contenu spécifique -->
    </main>
   <!-- datatable dependances js-->
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
  <script src="//cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>  

  <script>
    // Initialisation de DataTables
    $(document).ready(function() {
        $('#projects-table').DataTable();  // Pour la table des projets
        $('#tasks-table').DataTable();     // Pour la table des tâches
    });
</script>
</body>
</html>
