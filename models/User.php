<?php 
/**
 * ETML
 * Auteur: Dany Carneiro Jeremias
 * Date: 14.05.2025
 * Descritption: Modèle des utilisateurs
 */

include_once "../models/Model.php";

 class User extends Model {

     /**
      * Ajoute un utilisateur à la base de données
      * @param mixed $username Nom de l'utilisateur
      * @param mixed $password mot de passe chiffré
      * @return bool|PDOStatement résultat de la requête
      */
     public function addUser($username, $password){
     
         $query = 'INSERT INTO t_utilisateur (identifiant, mot_de_passe) VALUES (:username, :password)';
     
         $binds = ['username'=>$username, 'password'=>$password];
     
         $result = $this->queryPrepareExecute($binds, $query);

         return $result;
         }
 }
?>