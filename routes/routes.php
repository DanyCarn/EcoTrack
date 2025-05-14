<?php

/**
 * ETML
 * Auteur: Dany Carneiro Jeremias
 * Date: 12.05.2025
 * Descritpion: Routage du site
 */

require_once "../config/database.php";
require_once "../controllers/CityController.php";
require_once "../controllers/UserController.php";

//Instanciation de tous les contrôleurs
$city = new CityController();
$user = new UserController();

$route = $_GET['route'] ?? 'home';

//routage en fonction du paramètre donné dans le GET
switch ($route) {
    case 'addUserForm':
        $user->openAddUserForm();
        break;
    case 'addUser':
        $user->addUser();
        break;
    case 'addUserError':
        $user->openAddUserForm();
        break;
    case 'addUserPasswordError':
        $user->openAddUserForm();
        break;
    case 'addUserExists':
        $user->openAddUserForm();
        break;
    case 'connectForm':
        $user->openConnectionForm();
        break;
    case 'connect':
        $user->connect();
        break;
    case 'connectFormUserNotFound':
        $user->openConnectionForm();
        break;
    case 'connectFormPasswordError':
        $user->openConnectionForm();
        break;
    default:
        $city->showHome();
}
