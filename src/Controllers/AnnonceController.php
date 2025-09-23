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

            if (!empty($_FILES['photo']) && isset($_FILES['photo']['error']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
                $fileTmpPath = $_FILES['photo']['tmp_name'];
                $fileName = $_FILES['photo']['name'];
                $fileSize = $_FILES['photo']['size'];
                $fileType = $_FILES['photo']['type'];

                $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
                $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

                if (in_array(strtolower($fileExtension), $allowedExtensions)) {
                    $newFileName = uniqid('img_') . '.' . $fileExtension;
                    $uploadDir = 'uploads/'; // <-- à adapter selon ton projet
                    $destPath = $uploadDir . $newFileName;

                    if (move_uploaded_file($fileTmpPath, $destPath)) {
                        // 🔗 Appelle ton modèle ici pour enregistrer le chemin dans la base
                        $imagePath = $destPath;
                        $annonce = new Annonce();
                        $annonce->uploadImage($imagePath);
                    } else {
                        $errors['photo'] = "Erreur lors du déplacement du fichier.";
                    }
                } else {
                    $errors['photo'] = "Format de fichier non autorisé.";
                }
            } else {
                $defaultPicture = "nophoto.png";
            }


            if (isset($_POST['prix'])) {

                if (empty($_POST['prix'])) {

                    $errors['prix'] = 'Prix nécessaire !';
                }
            }

            if (empty($errors)) {
                $adCreation = new Annonce();

                $titre = $_POST['titre'];
                $description = $_POST['description'];
                $photo = $defaultPicture ?? $newFileName;
                $prix = (float) str_replace(',', '.', $_POST['prix']);
                $userId = $_SESSION['user']['id']; // 👈 on prend l’ID du compte connecté

                $adCreation->createAnnounce($titre, $description, $prix, $photo, $userId);

                header("Location: index.php?url=profil");
            }
        }

        require_once __DIR__ . '/../Views/create.php';
    }

    public function announces()
    {
        require_once __DIR__ . "/../Views/annonces.php";
    }

    public function deleteAnnounce($a_id)
    {
        $adDelete = new Annonce();
        $adDelete->deleteById($a_id);
    }

    public function show($a_id)
    {
        $Getdetails = new Annonce();
        $touslesDetails = $Getdetails->findById($a_id);
        require_once __DIR__ . '/../Views/details.php';
    }
}
