<?php
/**
 * ETML
 * Auteur: Dany Carneiro Jeremias
 * Date: 16.05.2025
 * Description: Modèle récupérant et modifiant les villes dans la base de données
 */

 include_once "../config/database.php";
 include_once "../models/Model.php";

 class City extends Model {

    /**
     * Ajoute une ville à la base de données
     * @param mixed $cityName Le nom de la ville
     * @param mixed $cityLat La latitude de la ville
     * @param mixed $cityLong La longitude de la ville
     * @return bool Résultat de l'opération
     */
    public function addCity($cityName, $cityLat, $cityLong){

        $query = "INSERT INTO t_region (nom, latitude, longitude) VALUES (:cityName, :cityLat, :cityLong)";

        $binds = ['cityName'=>$cityName, 'cityLat'=>$cityLat, 'cityLong'=>$cityLong];

        try {
            $this->queryPrepareExecute($binds, $query);
            

        } catch (PDOException) {
            return false;
        }
    }

    /**
     * Retourne les informations d'une ville
     * @param mixed $cityName Nom de la ville
     * @param mixed $cityLat Latitude de la ville
     * @param mixed $cityLong Longitude de la ville
     */
    public function getCity($cityName, $cityLat, $cityLong){
        
        $query = "SELECT * FROM t_region WHERE nom = '$cityName' AND latitude = '$cityLat' AND longitude = '$cityLong'";

        return $this->formatData($this->querySimpleExecute($query));
    }

    /**
     * Ajoute le lien entre l'utilisateur qui a ajouté la ville et la ville
     * @param mixed $userId Identifiant de l'utilisateur
     * @param mixed $cityId Identifiant de la ville
     * @return bool|PDOStatement résultat de la requête
     */
    public function linkUserToCity($userId, $cityId){

        $query = "INSERT INTO t_enregistrer (utilisateur_id, region_id) VALUES (:userId, :cityId)";

        $binds = ['userId'=>$userId, 'cityId'=>$cityId];

        return $this->queryPrepareExecute($binds, $query);
    }
 }
?>