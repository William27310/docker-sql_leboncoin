<?php

use App\Controllers\HomeController;

// Recherche de paramètre ($_GET)
// ?? 'home' si pas présente, tu lui donne la valeur home
$url = $_GET['url'] ?? 'home';

// Je récupère ce qu'il y a à gauche et à droite de l'url
$parts = explode('/', $url);

switch ($parts[0]) {
    case 'home':
        $controller = new HomeController();
        $controller->index();
        break;


    default:
        echo "Page non trouvée (404)";
        break;
}