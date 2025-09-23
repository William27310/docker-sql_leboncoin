<?php

namespace App\Controllers;

use App\Models\Database;
use App\Models\Annonce;

use PDO;
use PDOException;

class HomeController
{
    public function index()
    {
        $Getall = new Annonce();
        $toutesLesAnnonces = $Getall->findAll();
 
        require_once __DIR__ . '/../Views/home.php';
    }
}
