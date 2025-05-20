<?php 

/**
 * ETML
 * Auteur: Dany Carneiro Jeremias
 * Date: 12.05.2025
 * Description: Contrôleur qui gère les requêtes des API
 */
class API {

     /**
      * Execute les requêtes API
      * @param mixed $url URL de la requête
      * @return void Réponse de l'API ou FALSE si une erreur est survenue
      */
     private static function execRequest($url): array | bool {

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);

        $response = curl_exec($ch);

        if (curl_errno($ch)){
            return false;
        }

        curl_close($ch);

        $data=json_decode($response, true);

        return $data;
     }

    /**
     * Récupération de la localisation de l'utilisateur grâce à son adresse IP
     * @return array-key Les coordonnées de l'utilisateur ou FALSE si une erreur s'est produite
     */
    public static function getUserLocation($ipAdress){

        $json = file_get_contents('../secrets/api_keys.json');
        $apiKey = json_decode($json, true);

        $url = "https://api.geoapify.com/v1/ipinfo?ip=$ipAdress&apiKey=".$apiKey['geoapify'];

        return self::execRequest($url);

        }

    /**
     * Récupère les informations de l'air d'un endroit
     * @param mixed $lat La latitude de l'endroit
     * @param mixed $long La longitude de l'endroit
     * @return array Un tableau contenant les informations meteo et de la qualité de l'air
     */
    public static function getAirInfo($lat, $long): array {

        //Récupération de l'info météo
        $weatherURL = "https://api.open-meteo.com/v1/forecast?latitude=".$lat."&longitude=".$long."&hourly=temperature_2m&current=temperature_2m,precipitation,wind_speed_10m";
        $info['weather'] = self::execRequest($weatherURL)['current'];

        //récupération de l'info de la qualité de l'air
        $airQualityURL = "https://air-quality-api.open-meteo.com/v1/air-quality?latitude=".$lat."&longitude=".$long."&current=european_aqi,pm10,pm2_5,nitrogen_dioxide,ozone";
        $info['air'] = self::execRequest($airQualityURL)['current'];

        return $info;
    }

    /**
     * Récupère les coordonnées d'une ville grâce à son nom et au pays dans lequel elle se situe
     * @param mixed $cityName Nom de la ville
     * @param mixed $country Pays où se situe la ville
     */
    public static function getCityCoordinates($cityName, $country){

        $apiKey = json_decode(file_get_contents('../secrets/api_keys.json'), true);

        $url = "https://us1.locationiq.com/v1/search?key=".$apiKey['locationIq']."&q=".$cityName."%20" .$country."&format=json&";

        //retourne uniquement le premier endroit retourné en résultat qui est celui qui colle le plus à la recherche
        return self::execRequest($url);
    }
}
?>