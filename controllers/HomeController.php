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

        //Redirige l'utilisateur sur le tableau de bord s'il est déjà connecté
        if(isset($_SESSION['userConnected']) && $_SESSION['userConnected']){
            header('Location: /dashboard');
            exit;
        }

        $userCoordinates = API::getUserLocation($_SERVER['REMOTE_ADDR']);


        if($userCoordinates['isPrivate']){
            $info = null;
        } else{
            $info = API::getAirInfo($userCoordinates['location']['latitude'], $userCoordinates['location']['longitude']);
        }

        if (!isset($info) || $info['air'] == null || $info['weather'] == null){
            $data = null;
        } else {

            // Création d'un tableau de données à passer en paramètre à la vue
            $data=array();
            $data[0]=$userCoordinates;
            $data[1]=$info;
        }


        View::render('home', ['data' => $data]);
    }
}

?>