<?php

require_once '../config/Database.php';

class ModelUtilisateur {
    private $conn;
    private $table_name = "UTILISATEUR";

    public function __construct() {
        $this->conn = Database::getInstance();
    }

    /**
     * Lire tous les utilisateurs
     * @return PDOStatement Résultats de la requête
     */
    public function read() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    
    public function create($nom, $prenom, $date_naiss, $adresse, $mail, $num_tel, $statut, $type) {
        $query = "INSERT INTO " . $this->table_name . "
                  (UTILISATEUR_NOM, UTILISATEUR_PRENOM, UTILISATEUR_DATE_NAISS,
                   UTILISATEUR_ADRESSE, UTILISATEUR_MAIL, UTILISATEUR_NUM_TEL,
                   UTILISATEUR_STATUT, UTILISATEUR_TYPE)
                  VALUES (:nom, :prenom, :date_naiss, :adresse, :mail, :num_tel, :statut, :type)";
        $stmt = $this->conn->prepare($query);

        // Liaison des paramètres
        $stmt->bindParam(":nom", $nom);
        $stmt->bindParam(":prenom", $prenom);
        $stmt->bindParam(":date_naiss", $date_naiss);
        $stmt->bindParam(":adresse", $adresse);
        $stmt->bindParam(":mail", $mail);
        $stmt->bindParam(":num_tel", $num_tel);
        $stmt->bindParam(":statut", $statut);
        $stmt->bindParam(":type", $type);

        try {
            return $stmt->execute();
        } catch (PDOException $e) {
            // Gérer les erreurs de duplication d'e-mail ou autres
            echo "Erreur : " . $e->getMessage();
            return false;
        }
    }
    public function modifierById($id, $nom){
        //MODIFIER LE NOM DE L'UTILISATEUR AVEC L'ID
        $query = "UPDATE " . $this->table_name . " SET UTILISATEUR_NOM = :nom WHERE UTILISATEUR_ID = :id";

    }
}