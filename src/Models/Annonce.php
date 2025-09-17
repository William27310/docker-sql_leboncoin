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

    public function getAdByUser($u_id)
    {
        try {
            // Connexion à la base de données
            $pdo = Database::createInstancePDO();

            if (!$pdo) {
                return []; // On retourne un tableau vide si la connexion échoue
            }

            $sql = "SELECT a_picture, a_title, a_price, a_publication, users.u_username
            FROM annonces
            JOIN users ON annonces.u_id = users.u_id
            WHERE users.u_id = :u_id
            ORDER BY a_publication DESC;";

            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':u_id', $u_id, PDO::PARAM_INT); // 👈 avec le type (optionnel mais recommandé)
            $stmt->execute();

            $ad = $stmt->fetchAll();
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

    // public function findById(int $id) {}

    // public function findByUser(int $userId) {}

}
