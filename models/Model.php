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
        try{
            $req = $this->db->query($query);
        } catch(PDOException) {
            return false;
        }

        return $req;

    }

    /**
     * Exécute une requête préparée
     * @param mixed $binds Les valeurs à lier à la requête
     * @param mixed $query La requête
     * @return bool|PDOStatement Le résultat de la requête
     */
    protected function queryPrepareExecute($binds, $query){
        try {
        $req = $this->db->prepare($query);

        foreach ($binds as $bind=>$value){
            $req->bindValue($bind, $value);
        }

        $req->execute();

        } catch (PDOException $e) {
            return $e;
        }
        
        return $req;
    }

    /**
     * Formatte en tableau associatif le résultat de la requête
     * @param mixed $req La requête à formatter
     */
    protected function formatData($req){

        if(!$req){
            return false;
        } else {
            return $req->fetchAll(PDO::FETCH_ASSOC);
        }
    }
 }
?>