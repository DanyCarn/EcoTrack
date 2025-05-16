<?php 

 /**
 * ETML
 * Auteur: Dany Carneiro Jeremias
 * Date: 15.05.2025
 * Description: Modèle du tableua de bord
 */

 include_once "../models/Model.php";
 require_once "../models/API.php";
 require_once "../core/View.php";

 class Dashboard extends Model {

    /**
     * Récupère toutes les villes ajoutées d'un utilisateur
     * @param mixed $userId Id de l'utilisateur
     */
    public function getUserCities($userId){

        $query = "SELECT * FROM t_region INNER JOIN t_enregistrer ON t_region.region_id = t_enregistrer.region_id WHERE utilisateur_id = :userId";

        $binds = ['userId'=>$userId];

        $result = $this->queryPrepareExecute($binds, $query);

        return $this->formatData($result);
    }
 }

?>