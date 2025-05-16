<?php
/**
 * ETML
 * Auteur: Dany Carneiro Jeremias
 * Date: 13.05.2025
 * Description: classe mère des modèles contenant les méthodes de base des modèles
 */

 abstract class Model {

    protected $db;

    public function __construct(){
        $this->db = Database::connect();
    }

    /**
     * Exécute une requête SQL simple
     * @param mixed $query La requête à executer
     * @return bool|PDOStatement Le résultat de la requête
     */
    protected function querySimpleExecute($query) {
        return $this->db->query($query);
    }

    /**
     * Exécute une requête préparée
     * @param mixed $binds Les valeurs à lier à la requête
     * @param mixed $query La requête
     * @return bool|PDOStatement Le résultat de la requête
     */
    protected function queryPrepareExecute($binds, $query){
        $req = $this->db->prepare($query);

        foreach ($binds as $bind=>$value){
            $req->bindValue($bind, $value);
        }

        try {

            $req->execute();
        } catch (PDOException) {
            return false;
        }
        
        return $req;
    }

    /**
     * Formatte en tableau associatif le résultat de la requête
     * @param mixed $req La requête à formatter
     */
    protected function formatData($req){
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }
 }
?>