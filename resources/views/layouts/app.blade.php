<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Laravel SMS Commande</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
        }
        .sidebar {
            width: 250px;
            height: 100vh;
            background-color: #343a40;
            color: white;
        }
        .sidebar a {
            color: white;
            padding: 10px 20px;
            display: block;
            text-decoration: none;
        }
        .sidebar a:hover {
            background-color: #495057;
        }
        .main-content {
            flex-grow: 1;
            padding: 20px;
        }
    </style>
</head>
<body>

    <div class="sidebar">
        <h4 class="text-center py-3">Menu</h4>
        <a href="{{ url('/dashboard') }}">Dashboard</a>
        <a href="{{ url('/commandes') }}">Gestion des commandes</a>
        <a href="{{ url('/produits') }}">Gestion des produits</a>
    </div>

    <div class="main-content">
        @yield('content')
    </div>

</body>
</html>

