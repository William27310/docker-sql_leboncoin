<?php

namespace App\Controllers;

class UserController
{
    public function profil()
    {
        require_once __DIR__ . '/../Views/profil.php';
    }
    public function register()
    {
        $regPseudo = "/^[a-zA-Z0-9]([a-zA-Z0-9-_]{1,18})[a-zA-Z0-9]$/";
        $regEmail = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $errors = [];

            if (isset($_POST['pseudo'])) {
                if (empty($_POST['pseudo'])) {
                    $errors['pseudo'] = "Nom d'utilisateur Obligatoire !";
                } else if (!preg_match($regPseudo, $_POST['pseudo'])) {
                    $errors['pseudo'] = 'Caractère non autorisé';
                }
            }

            if (isset($_POST['email'])) {
                if (empty($_POST['email'])) {
                    $errors['email'] = "Veuillez entrer un E-mail !";
                } else if (!preg_match($regEmail, $_POST['email'])) {
                    $errors['email'] = 'Caractère non autorisé';
                }
            }

            if (empty($_POST['motdepasse'])) {
                $errors['motdepasse'] = "Veuillez entrer un mot de passe !";
            }

            if (empty($_POST['motdepasse(2)'])) {
                $errors['motdepasse(2)'] = "Veuillez confirmer votre mot de passe !";
            } else if ($_POST['motdepasse(2)'] == $_POST['motdepasse']) {
                $errors['motdepasse(2)'] = "Les mots de passe ne correspondent pas !";
            }

            if (!isset($_POST['cgu'])) {
                $errors['cgu'] = 'Veuillez valider les CGU !';
            }

            if (empty($errors)) {
                header("Location: index.php?url=home");
            }
        }

        require_once __DIR__ . '/../Views/register.php';
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {

            $errors = [];

            if (empty($_POST['email'])) {
                $errors['email'] = "Veuillez entrer votre E-mail !";
            }

            if (empty($_POST['motdepasse'])) {
                $errors['motdepasse'] = "Veuillez entrer votre mot de passe !";
            }

            if (empty($errors)) {
                header("Location: index.php?url=home");
            }
        }

        require_once __DIR__ . '/../Views/login.php';
    }
}
