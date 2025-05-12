<?php
require_once "../config/database.php";

$route = $_GET['route'] ?? 'home';

switch ($route) {
    default:
        include "../views/home.php";
}
