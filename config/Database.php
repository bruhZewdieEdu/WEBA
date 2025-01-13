<?php

require_once 'parameters.php';

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
                // Construction du DSN avec les constantes
                $dsn = Parameters::EDB_DBTYPE . ":host=" . Parameters::EDB_HOST .
                    ";port=" . Parameters::EDB_PORT .
                    ";dbname=" . Parameters::EDB_DBNAME . ";charset=utf8";

                $username = Parameters::EDB_USER;
                $password = Parameters::EDB_PASS;

                // Création de l'instance PDO
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
