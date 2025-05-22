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

        //Redirige l'utilisateur sur le tableau de bord s'il est déjà connecté
        if(isset($_SESSION['userConnected']) && $_SESSION['userConnected']){
            header('Location: /dashboard');
            exit;
        }
        
        View::render('form_addUser', title:'Création de compte');
        exit;
    }
    
    /**
     * Ajoute un utilisateur
     * @return void
     */
    public function addUser() {

        //Redirige l'utilisateur sur la page d'accueil si la méthode de requête n'est pas POST
        if($_SERVER['REQUEST_METHOD'] !== 'POST'){
            header('Location: /home');
            exit;
        }

        $users = $this->model->getAllUsers();

        //Vérifie que l'identifiant n'existe pas déjà. Si il existe déjà, l'utilisateur doit en choisir un autre
        foreach ($users as $user) {
            if ($user['identifiant'] == $_POST['username']) {

                //Redirectionau formulaire si le nom d'utilisateur existe déjà
                $data['error'] = 'userExists';
                View::render('form_addUser', ['data'=>$data], 'Création de compte' );
                exit;
            } else {
                continue;
            }
        }

        if ($_POST['password'] == $_POST['password_confirm']){

            $username = $_POST['username'];

            $hashedpassword = password_hash($_POST['password'], PASSWORD_BCRYPT);

            if ($this->model->addUser($username, $hashedpassword) == false) {

                $data['error'] = 'error';
                View::render('form_addUser', ['data'=>$data], 'Création de compte' );
                exit;
            } else {
                header('Location: /home');
            }

        } else {
            $data['error'] = 'passwordError';
            View::render('form_addUser', ['data'=>$data], 'Création de compte' );
            exit;
        }

    }



    /**
     * Ouvre le formulaire de connexion
     * @return void
     */
    public function openConnectionForm(){

        //Redirige l'utilisateur sur le tableau de bord s'il est déjà connecté
        if(isset($_SESSION['userConnected']) && $_SESSION['userConnected']){
            header('Location: /dashboard');
            exit;
        }

        View::render('form_connect', title:'Connexion');
        exit;
    }

    /**
     * Connecte l'utilisateur
     * @return void
     */
    public function connect(){

        //Redirige l'utilisateur sur la page d'accueil si la méthode de requête n'est pas POST
        if($_SERVER['REQUEST_METHOD'] !== 'POST'){
            header('Location: /home');
            exit;
        }

        $users = $this->model->getAllUsers();

        foreach ($users as $user){

            if ($user['identifiant'] == $_POST['username']){

                if(password_verify($_POST['password'], $user['mot_de_passe'])){

                    $_SESSION['userConnected'] = true;
                    $_SESSION['userId'] = $user['utilisateur_id'];

                    header('Location: /dashboard');
                    exit;

                } else {
                    $data['error'] = 'passwordError';
                    View::render('form_connect', ['data'=>$data], 'Connexion' );
                    exit;
                }

            } else {
                continue;
            }
        }

        $data['error'] = 'userError';
        View::render('form_connect', ['data'=>$data], 'Connexion' );
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