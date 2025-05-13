<?php

/**
 * ETML
 * Auteur: Dany Carneiro Jeremias
 * Date: 12.05.2025
 * Descritpion: Routage du site
 */
require_once "../config/database.php";
require_once "../controllers/HomeController.php";

$home = new HomeController();

$route = $_GET['route'] ?? 'home';

switch ($route) {
    default:
        $home->showHome();
}
