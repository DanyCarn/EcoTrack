<?php
///Date : 12.05.2025
///Auteur : Dany Carneiro Jeremias
///Description : Controller qui gère la localisation d'un utilisateur

///TODO MOVE CONTENT TO API CONTROLLER
$user_ip = $_SERVER['REMOTE_ADDR'];

echo $user_ip;

$url = "https://api.geoapify.com/v1/ipinfo?&apiKey=ef557d20ce33439984950b29b36dce74";

$ch = curl_init($url);

curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);

$response = curl_exec($ch);

curl_close($ch);

$info = json_decode($response, true);

echo "<pre>";
var_dump($info);
echo "</pre>";

echo $info['location']['latitude'] . "<br>";
echo $info['location']['longitude'];

class LocationController {
    /**
     * Récupère la latitude et la longitude d'un utilisateur avec son adresse IP
     */
    public function getLocation {

    }
}

?>