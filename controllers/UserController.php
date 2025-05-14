<?php 
/**
 * ETML
 * Auteur: Dany Carneiro Jeremias
 * Date: 12.05.2025
 * Description: Contrôleur de l'utilisateur
 */

 require_once "../models/User.php";

class UserController {

    private $model;

    public function __construct() {
        $this->model = new User();
    }

    /**
     * Affiche le formulaire de création d'utilisateur
     * @return void
     */
    public function openAddUserForm(){
        include "../views/form_addUser.php";
    }
    
    /**
     * Ajoute un utilisateur
     * @return void
     */
    public function addUser() {

        if ($_POST['password'] == $_POST['password_confirm']){

            $username = $_POST['username'];

            $hashedpassword = password_hash($_POST['password'], PASSWORD_BCRYPT);

            if ($this->model->addUser($username, $hashedpassword) == false) {
                header('Location: /addUserError');
            } else {
                header('Location: /home');
            }

        } else {
            header('Location: /addUserPasswordError');
        }

    }

}

?>