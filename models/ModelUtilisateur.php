<?php

require_once '../config/Database.php';

class ModelUtilisateur
{
    private $conn;
    private $table_name = "UTILISATEUR";

    public function __construct()
    {
        $this->conn = Database::getInstance();
    }

    /**
     * Lire tous les utilisateurs
     * @return array Résultats de la requête
     */
    public function read()
    {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Lire un utilisateur par ID
     * @param int $id ID de l'utilisateur
     * @return array|null Détails de l'utilisateur ou null si non trouvé
     */
    public function readById($id)
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE UTILISATEURID = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Créer un nouvel utilisateur
     * @param string $nom
     * @param string $prenom
     * @param string $date_naiss
     * @param string $adresse
     * @param string $mail
     * @param string $num_tel
     * @param string $statut
     * @param string $type
     * @param string $mdp
     * @return bool Résultat de l'insertion
     */
    public function create($nom, $prenom, $date_naiss, $adresse, $mail, $num_tel, $statut, $type, $mdp)
    {
        $query = "INSERT INTO " . $this->table_name . "
                  (UTILISATEUR_NOM, UTILISATEUR_PRENOM, UTILISATEUR_DATE_NAISS,
                   UTILISATEUR_ADRESSE, UTILISATEUR_MAIL, UTILISATEUR_NUM_TEL,
                   UTILISATEUR_STATUT, UTILISATEUR_TYPE, UTILISATEUR_MOT_DE_PASSE)
                  VALUES (:nom, :prenom, :date_naiss, :adresse, :mail, :num_tel, :statut, :type, :mdp)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":nom", $nom);
        $stmt->bindParam(":prenom", $prenom);
        $stmt->bindParam(":date_naiss", $date_naiss);
        $stmt->bindParam(":adresse", $adresse);
        $stmt->bindParam(":mail", $mail);
        $stmt->bindParam(":num_tel", $num_tel);
        $stmt->bindParam(":statut", $statut);
        $stmt->bindParam(":type", $type);
        $stmt->bindParam(":mdp", $mdp);

        try {
            return $stmt->execute();
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de l'insertion de l'utilisateur : " . $e->getMessage());
        }
    }

    /**
     * Mettre à jour les informations d'un utilisateur
     * @param int $id
     * @param string $nom
     * @param string $prenom
     * @param string $date_naiss
     * @param string $adresse
     * @param string $mail
     * @param string $num_tel
     * @param string $statut
     * @param string $type
     * @param string $mdp
     * @return bool Résultat de la mise à jour
     */
    public function update($id, $nom, $prenom, $date_naiss, $adresse, $mail, $num_tel, $statut, $type)
    {
        $query = "UPDATE " . $this->table_name . "
                  SET UTILISATEUR_NOM = :nom,
                      UTILISATEUR_PRENOM = :prenom,
                      UTILISATEUR_DATE_NAISS = :date_naiss,
                      UTILISATEUR_ADRESSE = :adresse,
                      UTILISATEUR_MAIL = :mail,
                      UTILISATEUR_NUM_TEL = :num_tel,
                      UTILISATEUR_STATUT = :statut,
                      UTILISATEUR_TYPE = :type
                  WHERE UTILISATEURID = :id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
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
            throw new Exception("Erreur lors de la mise à jour de l'utilisateur : " . $e->getMessage());
        }
    }

    /**
     * Supprimer un utilisateur
     * @param int $id
     * @return bool Résultat de la suppression
     */
    public function delete($id)
    {
        $query = "DELETE FROM " . $this->table_name . " WHERE UTILISATEURID = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);

        try {
            return $stmt->execute();
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de la suppression de l'utilisateur : " . $e->getMessage());
        }
    }
}
