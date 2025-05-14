<?php
/**
 * ETML
 * Auteur: Dany Carneiro Jeremias
 * Date 13.05.2025
 * Description: Contrôleur de la connexion de l'utilisateur
 */
session_start();
include_once "../models/Connection.php";

class ConnectionController {

    private $model;

    public function __construct(){
        $this->model = new Connection();
    }


}


?>