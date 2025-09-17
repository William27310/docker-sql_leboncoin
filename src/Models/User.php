<?php

namespace App\Models;

use App\Models\Database;

use PDO;
use PDOException;

class User
{

    public int $id;
    public string $email;
    public string $password;
    public string $username;
    public string $inscription;

    public function createUser(string $email, string $password, string $username): bool
    {
        try {
            // try → on commence un bloc qui peut générer une exception (ici PDOException).
            $pdo = Database::createInstancePDO();
            // Database::createInstancePDO() → méthode statique qui retourne une instance PDO (connexion à la base).

            if (!$pdo) {
                // Vérifie si la connexion a échoué (si createInstancePDO() a retourné null).
                return false;
            }


            $sql = 'INSERT INTO `users` (`u_email`, `u_password`, `u_username`) VALUES (:email, :password, :username)';
            // Les :email, :password, :username sont des paramètres nommés (placeholders).
            // Les backticks (`) sont des guillemets inversés utilisés dans MySQL pour entourer : Les noms de tables - Les noms de colonnes.

            $stmt = $pdo->prepare($sql);
            // prepare → permet d’utiliser des requêtes préparées, sécurisées contre l’injection SQL.

            $stmt->bindValue(':email', $email, PDO::PARAM_STR);
            $stmt->bindValue(':password', password_hash($password, PASSWORD_DEFAULT), PDO::PARAM_STR);
            $stmt->bindValue(':username', $username, PDO::PARAM_STR);



            return $stmt->execute();
        } catch (PDOException $e) {


            return false;
        }
    }

    public static function checkMail(string $email): bool

    {
        try {
            $pdo = Database::createInstancePDO();
            // Permet d’essayer un bloc de code susceptible de générer une exception (ici PDOException).
            // Si une erreur survient, le flux saute directement dans le bloc catch.
            // Database::createInstancePDO() → méthode statique qui retourne une connexion PDO ou null.

            if (!$pdo) {

                return false;
            }


            $sql = 'SELECT 1 FROM `users` WHERE `u_email` = :email LIMIT 1';
            // Sélectionne une valeur fixe 1 (inutile de récupérer toutes les colonnes) dans la table users pour vérifier si l’email existe.
            // :email → paramètre nommé sécurisé (évite l’injection SQL).
            // LIMIT 1 → optimisation : on ne récupère qu’une ligne, pas toute la table.

            $stmt = $pdo->prepare($sql);


            $stmt->bindValue(':email', $email, PDO::PARAM_STR);

            $stmt->execute();

            $result = $stmt->fetchColumn();
            // Récupère la première colonne de la première ligne du résultat.
            // Ici, si l’email existe → $result vaut 1.
            // Sinon → $result vaut false.

            if ($result !== false) {

                return true;
            } else {

                return false;
            }
        } catch (PDOException $e) {
            return false;
        }
    }

    public static function checkUsername(string $username): bool
    {
        try {
            $pdo = Database::createInstancePDO();
            // Création/récupération d'une instance PDO via une méthode de votre classe Database. Si cette méthode échoue elle peut retourner null ou lancer une exception (selon son implémentation).

            if (!$pdo) {

                return false;
            }

            $sql = 'SELECT 1 FROM `users` WHERE `u_username` = :username LIMIT 1';

            $stmt = $pdo->prepare($sql);

            $stmt->execute();

            $result = $stmt->fetchColumn();
            // Si la requête a réussi, fetchColumn() récupère la première colonne de la première ligne — pour SELECT 1 ce sera la string '1'. Si aucune ligne, fetchColumn() renverra false.

            if ($result !== false) {

                return true;
            } else {

                return false;
            }
        } catch (PDOException $e) {

            return false;
        }
    }

    public static function deleteUser(string $email, string $username, string $password): bool
    {
        try {
            // try → on commence un bloc qui peut générer une exception (ici PDOException).
            $pdo = Database::createInstancePDO();
            // Database::createInstancePDO() → méthode statique qui retourne une instance PDO (connexion à la base).

            if (!$pdo) {
                // Vérifie si la connexion a échoué (si createInstancePDO() a retourné null).
                return false;
            }

            $sql = 'DELETE FROM `users` (`u_email`, `u_password`, `u_username`) WHERE (:email, :password, :username)';
            // Les :email, :password, :username sont des paramètres nommés (placeholders).
            // Les backticks (`) sont des guillemets inversés utilisés dans MySQL pour entourer : Les noms de tables - Les noms de colonnes.

            $stmt = $pdo->prepare($sql);
            // prepare → permet d’utiliser des requêtes préparées, sécurisées contre l’injection SQL.

            $stmt->bindValue(':email', $email, PDO::PARAM_STR);
            $stmt->bindValue(':password', password_hash($password, PASSWORD_DEFAULT), PDO::PARAM_STR);
            $stmt->bindValue(':username', $username, PDO::PARAM_STR);



            return $stmt->execute();
        } catch (PDOException $e) {


            return false;
        }
    }


    public function getUserInfosByEmail(string $email): bool
    {
        try {
            // Creation d'une instance de connexion à la base de données
            $pdo = Database::createInstancePDO();

            // test si la connexion est ok
            if (!$pdo) {
                // pas de connexion, on return false
                return false;
            }

            $sql = 'SELECT * FROM `users` WHERE `u_email` = :email';

            $stmt = $pdo->prepare($sql);



            $stmt->bindValue(':email', $email);

            $stmt->execute();

            $user = $stmt->fetch(PDO::FETCH_OBJ);

            $this->id = $user->u_id;
            $this->email = $user->u_email;
            $this->password = $user->u_password;
            $this->username = $user->u_username;
            $this->inscription = $user->u_inscription;

            return true;
        } catch (PDOException $e) {


            return false;
        }
    }
    
}
