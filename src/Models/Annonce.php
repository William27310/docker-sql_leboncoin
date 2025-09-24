<?php

namespace App\Models;

use App\Models\Database;

use PDO;
use PDOException;

class Annonce
{

    public string $title;
    public string $description;
    public float $price;
    public string $picture;
    public int $userId;

    public function createAnnounce(string $title, string $description, float $price, ?string $picture, int $userId): bool
    {
        try {

            $pdo = Database::createInstancePDO();

            if (!$pdo) {

                return false;
            }

            $sql = 'INSERT INTO `annonces` (`a_title`, `a_description`, `a_price`, `a_picture`, `u_id`) VALUES (:title, :description, :price, :picture, :id)';

            $stmt = $pdo->prepare($sql);

            $stmt->bindValue(':title', $title);
            $stmt->bindValue(':description', $description);
            $stmt->bindValue(':price', $price);
            $stmt->bindValue(':picture', $picture);
            $stmt->bindValue(':id', $userId);

            return $stmt->execute();
        } catch (PDOException $e) {


            return false;
        }
    }

    public function modifyAnnounce(string $title, string $description, float $price, ?string $picture): bool
    {
        try {

            $pdo = Database::createInstancePDO();

            if (!$pdo) {

                return false;
            }

            $sql = 'UPDATE annonces SET a_title = :title, a_description = :description", a_price = :price, a_picture = :picture WHERE a_id = :id';

            $stmt = $pdo->prepare($sql);

            $stmt->bindValue(':title', $title);
            $stmt->bindValue(':description', $description);
            $stmt->bindValue(':price', $price);
            $stmt->bindValue(':picture', $picture);

            return $stmt->execute();
        } catch (PDOException $e) {

            return false;
        }
    }

    public function deleteById($a_id)
    {
        try {

            $pdo = Database::createInstancePDO();

            if (!$pdo) {

                return false;
            }

            $sql = 'DELETE FROM annonces WHERE a_id = :a_id';

            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':a_id', $a_id);

            return $stmt->execute();
        } catch (PDOException $e) {


            return false;
        }
    }

    public static function getByUserId($userId)
    {
        try {
            // Connexion à la base de données
            $pdo = Database::createInstancePDO();

            if (!$pdo) {
                return []; // On retourne un tableau vide si la connexion échoue
            }

            // Requête pour récupérer toutes les annonces de l'utilisateur
            $sql = 'SELECT * FROM annonces WHERE u_id = :userId ORDER BY a_publication';

            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':userId', $userId, \PDO::PARAM_INT);
            $stmt->execute();

            // Retourne toutes les annonces sous forme de tableau associatif
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            // Tu peux logger l'erreur ici si besoin
            return []; // En cas d’erreur, on retourne un tableau vide
        }
    }

    public function uploadImage($picture)
    {
        try {
            $pdo = Database::createInstancePDO();

            if (!$pdo) {
                return [];
            }

            $sql = "INSERT INTO annonces (a_picture) VALUES (:picture)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':picture', $picture);
            $stmt->execute();
        } catch (\PDOException $e) {
            return [];
        }
    }

    public function findAll(): array
    {
        try {
            // Connexion à la base de données
            $pdo = Database::createInstancePDO();

            if (!$pdo) {
                return []; // On retourne un tableau vide si la connexion échoue
            }

            // Requête pour récupérer toutes les annonces de l'utilisateur
            $sql = 'SELECT a_id, a_title, a_description, a_price, a_picture, a_publication, users.u_username FROM annonces LEFT JOIN users ON annonces.u_id = users.u_id';

            $stmt = $pdo->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            // Tu peux logger l'erreur ici si besoin
            return []; // En cas d’erreur, on retourne un tableau vide
        }
    }

    // public static function checkTitle(string $title): bool
    // {
    //     try {
    //         $pdo = Database::createInstancePDO();

    //         if ($pdo) {

    //             return false;
    //         }

    //         $sql = 'SELECT 1 FROM `annonce` WHERE `a_title` = :title LIMIT 1';

    //         $stmt = $pdo->prepare($sql);


    //         $stmt->bindValue(':title', $title, PDO::PARAM_STR);

    //         $stmt->execute();

    //         $result = $stmt->fetchColumn();

    //         if ($result !== false) {

    //             return true;
    //         } else {

    //             return false;
    //         }
    //     } catch (PDOException $e) {
    //         return false;
    //     }
    // }

    // public function findAll() {}

    public function findById(int $a_id)
    {
        try {

            $pdo = Database::createInstancePDO();

            if (!$pdo) {

                return false;
            }

            $sql = 'SELECT * FROM `annonces` WHERE a_id = :a_id';

            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':a_id', $a_id);
            $stmt->execute();

            return $stmt->fetch(\PDO::FETCH_ASSOC);
        } catch (PDOException $e) {


            return false;
        }
    }

    // public function findByUser(int $userId) {}

}
