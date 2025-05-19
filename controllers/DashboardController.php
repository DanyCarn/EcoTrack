<?php 
/**
 * ETML
 * Auteur: Dany Carneiro Jeremias
 * Date: 15.05.2025
 * Description: Contrôleur du tableau de bord
 */

 require_once "../models/Dashboard.php";
 require_once "../core/View.php";
 require_once "../models/API.php";

 class DashboardController {
     private $model;

     public function __construct(){
        $this->model = new Dashboard();
     }

     /**
      * Affiche le tableau de bord
      * @return void
      */
     public function showDashboard(){

      $cities = $this->model->getUserCities($_SESSION['userId']);

      for ($i = 0; $i<count($cities); $i++) {
        $data[$i] = API::getAirInfo($cities[$i]['latitude'], $cities[$i]['longitude']);
        $data[$i]['name'] = $cities[$i]['nom'];
        $data[$i]['id'] = $cities[$i]['region_id'];
      }

      View::render('dashboard', $data,  'Tableau de bord');
     }
 }
?>