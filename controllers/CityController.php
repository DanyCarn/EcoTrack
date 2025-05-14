<?php

include_once "../controllers/APIController.php";

/**
 * ETML
 * Auteur: Dany Carneiro Jeremias
 * Date: 13.05.2025
 * Description: Contrôleur qui gère les informations à afficher dans la page d'accueil
 */
 class CityController {

    /**
     * Récupère les informations de l'air de la zone de l'utilisateur non-connecté
     * @return void
     */
    public function showHome(){
        $userCoordinates = $this->getLocation();

        $info = APIController::getAirInfo($userCoordinates['location']['latitude'], $userCoordinates['location']['longitude']);

        include("../views/home.php");
    }

    /**
     * Récupère la latitude et la longitude d'un utilisateur avec son adresse IP
     * @return array Un tableau contenant la latitude et la longitude
     */
    private function getLocation() {
        return APIController::getUserLocation();
    }
 }

?>