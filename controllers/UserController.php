<?php 
/**
 * ETML
 * Auteur: Dany Carneiro Jeremias
 * Date: 12.05.2025
 * Description: Contrôleur de l'utilisateur
 */

 error_reporting(E_ALL ^ E_NOTICE);
 require_once "../models/User.php";
 require_once "../core/View.php";
 session_start();

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
        View::render('form_addUser', title:'Création de compte');
    }
    
    /**
     * Ajoute un utilisateur
     * @return void
     */
    public function addUser() {

        $users = $this->model->getAllUsers();

        //Vérifie que l'identifiant n'existe pas déjà. Si il existe déjà, l'utilisateur doit en choisir un autre
        foreach ($users as $user) {
            if ($user['identifiant'] == $_POST['username']) {
                header('Location: addUserExists');
                exit;
            } else {
                continue;
            }
        }

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



    /**
     * Ouvre le formulaire de connexion
     * @return void
     */
    public function openConnectionForm(){
        View::render('form_connect', title:'Connexion');
    }

    /**
     * Connecte l'utilisateur
     * @return void
     */
    public function connect(){

        $users = $this->model->getAllUsers();

        foreach ($users as $user){

            if ($user['identifiant'] == $_POST['username']){

                if(password_verify($_POST['password'], $user['mot_de_passe'])){

                    $_SESSION['userConnected'] = true;
                    $_SESSION['userId'] = $user['utilisateur_id'];

                    //var_dump($_SESSION);

                    //session_write_close();

                    header('Location: /dashboard');
                    exit;

                } else {
                    header('Location: /connectFormPasswordError');
                    exit;
                }

            } else {
                continue;
            }
        }
        header('Location: /connectFormUserNotFound');
        exit;
    }

    /**
     * Déconnecte l'utilisateur
     * @return void
     */
    public function disconnect(){

        $_SESSION['userConnected'] = false;
        unset($_SESSION['userId']);

        session_write_close();

        header('Location: /home');
        exit;
    }

}

?>