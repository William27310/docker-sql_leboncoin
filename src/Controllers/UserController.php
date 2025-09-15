<?php

namespace App\Controllers;

use App\Models\User;

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

            if (empty($_POST['motdepasse2'])) {
                $errors['motdepasse2'] = "Veuillez confirmer votre mot de passe !";
            }

            if (!isset($_POST['cgu'])) {
                $errors['cgu'] = 'Veuillez valider les CGU !';
            }

            if (empty($errors)) {
                // header("Location: index.php?url=home");

                if ((User::checkMail($_POST['email']) == true)) {
                    $errors['email'] = 'Cet adresse email est déjà utilisé';
                }

                if ((User::checkUsername($_POST['pseudo']) == true)) {
                    $errors['pseudo'] = 'Ce nom d\'utilisateur est déjà utilisé';
                }
            }

            if (empty($errors)) {
                if ((User::checkUsername($_POST['pseudo']) === false) && User::checkMail($_POST['email']) === false) {
                    $userCreation = new User();
                    $addUser = $userCreation->createUser($_POST['email'], $_POST['motdepasse'], $_POST['pseudo']);
                    header("Location: index.php?url=welcome");
                      echo 'You\'ll be redirected in about 5 secs. If not, click <a href="wherever.php">here</a>.';

                }
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
        }

        require_once __DIR__ . '/../Views/login.php';
    }

    public function welcome()
    {
        header("refresh:3; index.php?url=home");

        require_once __DIR__ . "/../Views/welcome.php";
    }
}
