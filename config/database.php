<?php

/**
 * ETML
 * Auteur: Dany Carneiro Jeremias
 * Date: 12.05.2025
 * Description: Connexion à la base de données
 */
class Database {
    private static $conn;

    /**
     * Crée la connexion avec la base de données
     */
    public static function connect() {

        $json = file_get_contents('../secrets/database.json');

        $jsonContent = json_decode($json, true);

        if (!isset(self::$conn)) {
            try {
                self::$conn = new PDO("mysql:host=" . $jsonContent['host'] . ";port=" . $jsonContent['port'] . ";dbname=" . $jsonContent['db_name'], username: $jsonContent['username'], password: $jsonContent['password']);
                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Erreur de connexion: " . $e->getMessage());
            }
        }
        return self::$conn;
    }
}