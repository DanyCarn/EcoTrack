<?php 
/**
 * ETML
 * Auteur: Dany Carneiro Jeremias
 * Date: 15.05.2025
 * Description: Contrôleur du tableau de bord
 */

 include "../models/Dashboard.php";
 require_once "../core/View.php";

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
        View::render('dashboard', title:'Tableau de bord');
     }
 }
?>