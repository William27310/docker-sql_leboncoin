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
        require_once __DIR__ . '/../Views/register.php';
    }

    public function login()
    {
        require_once __DIR__ . '/../Views/login.php';
    }
}