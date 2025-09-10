<?php

namespace App\Controllers;

class AnnonceController
{
    public function index()
    {
        require_once __DIR__. '/../Views/annonces.php';
    }

    public function create()
    {
        require_once __DIR__. '/../Views/details.php';
    }

    public function show(?int $id)
    {
        require_once __DIR__. '/../Views/details.php';    
    }

}