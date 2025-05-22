<?php

/**
 * ETML
 * Auteur: Dany Carneiro Jeremias
 * Date: 12.05.2025
 * Descritpion: Routage du site
 */

require_once "../config/database.php";
require_once "../controllers/HomeController.php";
require_once "../controllers/UserController.php";
require_once "../controllers/DashboardController.php";
require_once "../controllers/CityController.php";

//Instanciation de tous les contrôleurs
$home = new HomeController();
$user = new UserController();
$dashboard = new DashboardController();
$city = new CityController();

$route = $_GET['route'] ?? 'home';

//routage en fonction du paramètre donné dans le GET
switch ($route) {
    case 'addUserForm':
        $user->openAddUserForm();
        break;
    case 'addUser':
        $user->addUser();
        break;
    case 'connectForm':
        $user->openConnectionForm();
        break;
    case 'connect':
        $user->connect();
        break;
    case 'disconnect':
        $user->disconnect();
        break;
    case "dashboard":
        $dashboard->showDashboard();
        break;
    case "addCityForm":
        $city->addCityForm();
        break;
    case "addCity":
        $city->addCity();
        break;
    case "deleteCity":
        $city->deleteCity();
        break;
    default:
        $home->showHome();
}

?>
