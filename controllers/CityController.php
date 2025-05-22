<?php 
/**
 * ETML
 * Auteur: Dany Carneiro Jeremias
 * Date: 16.05.2025
 * Description: Contrôleur de villes. Permet l'ajout, la recherche de villes ainsi que leur suppression
 */

require_once "../models/City.php";
require_once "../core/View.php";

 class CityController {

    private $model;

    public function __construct() {
        $this->model = new City();
    }

    /**
     * Affiche le formulaire d'ajout de ville
     * @return void
     */
    public function addCityForm(){

        //Redirige l'utilisateur sur la page d'accueil s'il n'est pas connecté
        if(!isset($_SESSION['userConnected']) || !$_SESSION['userConnected']){
            header('Location: /home');
            exit;
        }

        $data['error'] = false;
        View::render('form_addCity', ['data'=>$data], 'Ajouter ville');
    }

    /**
     * Ajoute une ville 
     * @return void
     */
    public function addCity(){

        //Redirige l'utilisateur sur la page d'accueil s'il n'est pas connecté
        if((!isset($_SESSION['userConnected']) || !$_SESSION['userConnected']) || $_SERVER['REQUEST_METHOD'] !== 'POST'){
            header('Location: /home');
            exit;
        }

        //Remplacement des caractères spéciaux par des valeurs lisibles par l'API de localisation
        $city = str_replace(' ', '%20', $_POST['city']);
        $city = str_replace('é', '%C3%A9', $city);
        $city = str_replace('è', '%C3%A8', $city);
        $city = str_replace('ç', '%C3%A7', $city);

        $country = str_replace(' ', '%20', $_POST['country']);
        $country = str_replace('é', '%C3%A9', $country);
        $country = str_replace('è', '%C3%A8', $country);
        $country = str_replace('ç', '%C3%A7', $country);

        $coordinates = API::getCityCoordinates($city, $country);

        //Si la requête réussi renvoie sur le tableau de bord, sinon, retourne sur le formulaire indiquant une erreur
        if (isset($coordinates[0])) {

            //Traitement des données de latitude et longitude afin qu'elles aient la bonne taille
            $latitude = explode('.', $coordinates[0]['lat']);
            $latitudeDecimals = mb_strimwidth($latitude[1], 0, 7);
            $finalLatitude = $latitude[0] .'.'. $latitudeDecimals;

            $longitude = explode('.', $coordinates[0]['lon']);
            $longitudeDecimals = mb_strimwidth($longitude[1], 0, 7);
            $finalLongitude = $longitude[0] .'.'. $longitudeDecimals;

            $name = explode(',', $coordinates[0]['display_name'])[0];

            //Si la ville n'existe pas encore dans la base de données, la crée
            if(!isset($this->model->getCity($name, $finalLatitude, $finalLongitude)[0])){
             
                $this->model->addCity($name, $finalLatitude, $finalLongitude);
            }

            $city = $this->model->getCity($name, $finalLatitude, $finalLongitude)[0];

            //Ajoute l'enregistrement dans la table t_enregistrer et redirige vers le tableau de bord si ça réussi
            if($this->model->linkUserToCity($_SESSION['userId'], $city['region_id'])){
                header('Location: /dashboard');
                exit;
            }
        }

        $data['error'] = true;
        View::render('form_addCity', ['data'=>$data], 'Ajouter ville');
        exit;
    }

    /**
     * Supprime une ville de la liste de villes de l'utilsiateur
     * @return void
     */
    public function deleteCity(){

        //Si l'utilisateur n'est pas connecté, le renvoie à la page d'accueil
        if ((!isset($_SESSION['userConnected']) || !$_SESSION['userConnected']) || !isset($_GET['cityId'])) {
            header('Location: /home');
            exit;
        }

        $this->model->UnlinkUser($_SESSION['userId'], $_GET['cityId']);

        header('Location: /dashboard');
        exit;
    }

 }
?>