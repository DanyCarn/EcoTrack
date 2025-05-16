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
            $latitude = $coordinates[0]['lat'];
            $longitude = $coordinates[0]['lon'];
            $name = explode(',', $coordinates[0]['display_name'])[0];

            //Si la ville n'existe pas encore dans la base de données, la crée
            if(!isset($this->model->getCity($name, $latitude, $longitude)[0])){
             
                $this->model->addCity($name, $latitude, $longitude);
            }

            $city = $this->model->getCity($name, $latitude, $longitude)[0];

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