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

    case 'create':
        $controller = new AnnonceController();
        $controller->createAnnounce();
        break;

    case 'welcome':
        $controller = new UserController();
        $controller->welcome();
        break;

    case 'logout':
        $objController = new UserController();
        $objController->logout();
        break;

    case 'annonces':
        $objController = new AnnonceController();
        $objController->announces();
        break;

    case 'details':
        $objController = new HomeController();
        $objController->details();
        break;

    case "delete":

        if (isset($_GET['a_id']) && is_numeric($_GET['a_id'])) {
            $a_id = (int) $_GET['a_id'];
            // Tu peux utiliser $a_id ici
            $objController = new AnnonceController();
            $objController->deleteAnnounce($a_id);
            header("Location: index.php?url=profil");
        } else {
            echo "Paramètre manquant ou invalide.";
        }
        break;

    default:
        echo "Page non trouvée (404)";
        break;
}
