<?php

use App\Controllers\AnnonceController;
use App\Controllers\HomeController;
use App\Controllers\UserController;

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

    case 'register':
        $controller = new UserController();
        $controller->register();
        break;

    case 'login':
        $controller = new UserController();
        $controller->login();
        break;

    case 'profil':
        $controller = new UserController();
        $controller->profil();
        break;

    case 'annonce':
        $controller = new AnnonceController();
        $controller->createAnnounce();
        break;

    default:
        echo "Page non trouvée (404)";
        break;
}
