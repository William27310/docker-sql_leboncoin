<?php

namespace App\Models;

use PDO;
// Classe Php qui sert à accéder à des bases de données via une DSN
/**
 * Un DSN est une chaîne descriptive qui dit à PDO :
 *quel moteur de base utiliser,
 *où la trouver (host, port, fichier…),
 *quelle base ouvrir,
 *quel encodage utiliser.
 */

use PDOException;
// Outil qui permet de gérer proprement les erreurs liés aux bases de données dans du code Php en évitant que le script ne s'interrompt brutalement

class Database
{

    public static function createInstancePDO(): ?PDO
    // '?PDO' signifie que la méthode renvoie soit un objet PDO soit null

    {
        $db_host = 'db';
        $db_name = 'leboncoin';
        $db_user = 'root';
        $db_password = 'root';

        /*
        *Execute le code ci-dessous mais si une erreur critique survient, saute directement au bloc 'catch'
        */
        try {


            $pdo = new PDO('mysql:host=' . $db_host . ';dbname=' . $db_name . ';charset=utf8', $db_user, $db_password);
            // new PDO(...) → on instancie un objet PDO, qui représente une connexion à la base de données.

            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            /*
            *PDO::ATTR_ERRMODE → définit comment PDO doit réagir aux erreurs.
            *PDO::ERRMODE_EXCEPTION → PDO lancera une exception (PDOException) à chaque erreur (requête SQL invalide, connexion perdue, etc.).
            *C’est le mode recommandé, car il permet d’utiliser try/catch.
            *Sans ça, PDO se contente de codes d’erreurs silencieux (pas pratique).
            */

            return $pdo;
        } catch (PDOException $e) {
            return null;
        }
    }
}
