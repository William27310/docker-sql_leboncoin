<?php

namespace App\Controllers;

use App\Models\Annonce;

class AnnonceController
{
    public function createAnnounce()
    {
        if (!isset($_SESSION['user'])) {
            header("Location: index.php?url=login");
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $errors = [];

            if (isset($_POST['titre'])) {

                if (empty($_POST['titre'])) {

                    $errors['titre'] = 'Titre obligatoire !';
                }
            }

            if (isset($_POST['description'])) {

                if (empty($_POST['description'])) {

                    $errors['description'] = 'Description obligatoire !';
                }
            }

            if (isset($_POST['photo'])) {

                if (empty($_POST['photo'])) {

                    $errors['photo'] = 'Photo obligatoire !';
                }
            }

            if (isset($_POST['prix'])) {

                if (empty($_POST['prix'])) {

                    $errors['prix'] = 'Prix nécessaire !';
                }
            }


            if (isset($_POST['id'])) {

                if (empty($_POST['id'])) {

                    $errors['id'] = 'ID nécessaire !';
                }
            }

            if (empty($errors)) {
                $adCreation = new Annonce();
                $addAd = $adCreation->createAnnounce($_POST['titre'], $_POST['description'], $_POST['photo'], (float)$_POST['prix'], $_POST['id']);
                header("Location: index.php?url=annonces");
            }
        }

        require_once __DIR__ . '/../Views/create.php';
    }

    public function announces()
    {
        require_once __DIR__ . "/../Views/annonces.php";
    }
}
