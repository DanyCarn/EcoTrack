<?php 

/**
 * ETML
 * Auteur: Dany Carneiro Jeremias
 * Date: 16.05.2025
 * Descritpion: Classe permettant d'afficher les vues avec les données récupérées par le contrôleur
 */
class View {
    /**
     * Affiche une vue dans un layout global, en y injectant des données.
     *
     * @param string $view  Le nom du fichier de la vue (sans l'extension .php)
     * @param array  $data  Les données que l'on souhaite rendre disponibles dans la vue
     *                      Chaque clé du tableau deviendra une variable accessible dans la vue.
     * @param string $title Le titre de la page (optionnel). Il sera utilisé dans la variable $title du layout.
     */
    public static function render($view, $data = [], $title = '') {
        // Rendre les éléments du tableau $data accessibles directement comme des variables
        // Exemple : ['utilisateur' => $user] → dans la vue, on peut faire $utilisateur
        extract($data);

        // Démarre la capture du contenu généré par la vue
        // Cela permet de stocker le HTML de la vue dans une variable au lieu de l'afficher immédiatement
        ob_start();

        // Inclut le fichier de la vue spécifique (ex: views/home.php)
        include(__DIR__ . '/../views/' . $view . '.php');

        // Récupère le contenu capturé et l'assigne à la variable $content
        // Cette variable sera ensuite insérée dans le layout principal
        $content = ob_get_clean();

        // Inclut le fichier du layout global (ex: views/layout.php)
        // Le layout utilise $content pour insérer la vue à l’endroit souhaité
        // et peut aussi utiliser $title pour définir le <title> HTML
        include(__DIR__ . '/../views/layout.php');
    }
}
?>