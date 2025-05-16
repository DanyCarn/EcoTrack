<?php

include_once "../models/API.php";
require_once("../core/View.php");

/**
 * ETML
 * Auteur: Dany Carneiro Jeremias
 * Date: 13.05.2025
 * Description: Contrôleur qui gère les informations à afficher dans la page d'accueil
 */
 class HomeController {

    /**
     * Récupère les informations de l'air de la zone de l'utilisateur non-connecté
     * @return void
     */
    public function showHome(){
        $userCoordinates = $this->getLocation();

        $info = API::getAirInfo($userCoordinates['location']['latitude'], $userCoordinates['location']['longitude']);

        // Création d'un tableau de données à passer en paramètre à la vue
        $data=array();
        $data[0]=$userCoordinates;
        $data[1]=$info;

        View::render('home', ['data' => $data], 'Emplacement de connection');
    }

    /**
     * Récupère la latitude et la longitude d'un utilisateur avec son adresse IP
     * @return array Un tableau contenant la latitude et la longitude
     */
    private function getLocation() {
        return API::getUserLocation();
    }
 }

?>