<?php

class Database
{
    // Instance unique de la classe
    private static $instance;

    // Constructeur privé pour empêcher la création directe de l'objet
    private function __construct()
    {
    }

    // Empêcher le clonage de l'instance
    private function __clone()
    {
    }

    /**
     * Méthode pour obtenir l'instance unique de la connexion à la base de données
     * 
     * @return PDO Instance de connexion PDO
     */
    public static function getInstance()
    {
        if (!self::$instance) {
            try {
                $host = "localhost";
                $db_name = "didinho_bdd";
                $username = "root";
                $password = "";
                $dsn = "mysql:host=$host;dbname=$db_name;charset=utf8";

                self::$instance = new PDO($dsn, $username, $password);
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                // Afficher un message d'erreur si la connexion échoue
                die("Erreur de connexion à la base de données : " . $e->getMessage());
            }
        }
        return self::$instance;
    }


    public static function __callStatic($method, $arguments)
    {
        $instance = self::getInstance();
        return call_user_func_array([$instance, $method], $arguments);
    }
}
