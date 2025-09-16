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
