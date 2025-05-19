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
        $data['error'] = false;
        View::render('form_addCity', ['data'=>$data], 'Ajouter ville');
    }

    /**
     * Ajoute une ville 
     * @return void
     */
    public function addCity(){

        $coordinates = API::getCityCoordinates($_POST['city'], $_POST['country']);

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
    }

 }
?>