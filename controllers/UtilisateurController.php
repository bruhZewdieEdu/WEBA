<?php
require_once '../models/ModelUtilisateur.php';

class UtilisateurController
{
    private $model;

    public function __construct()
    {
        $this->model = new ModelUtilisateur();
    }

    /**
     * Affiche la liste des utilisateurs.
     */
    public function index()
    {
        $utilisateurs = $this->model->read(); // Récupération des utilisateurs depuis le modèle
        include '../views/utilisateurs/index.php'; // Inclure la vue
    }

    /**
     * Crée un nouvel utilisateur.
     */
    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Validation et sécurité des entrées utilisateur
            $nom = htmlspecialchars($_POST['nom']);
            $prenom = htmlspecialchars($_POST['prenom']);
            $date_naiss = $_POST['date_naiss'];
            $adresse = htmlspecialchars($_POST['adresse']);
            $mail = filter_var($_POST['mail'], FILTER_SANITIZE_EMAIL);
            $num_tel = htmlspecialchars($_POST['num_tel']);
            $statut = htmlspecialchars($_POST['statut']);
            $type = htmlspecialchars($_POST['type']);
            $mdp = htmlspecialchars($_POST['mdp']);

            // Créer l'utilisateur via le modèle
            $result = $this->model->create($nom, $prenom, $date_naiss, $adresse, $mail, $num_tel, $statut, $type, $mdp);

            if ($result) {
                header('Location: index.php'); // Redirection après succès
                exit;
            } else {
                echo "Erreur lors de la création de l'utilisateur.";
            }
        } else {
            include '../views/utilisateurs/add.php'; // Afficher le formulaire
        }
    }

    /**
     * Modifie un utilisateur existant.
     */
    public function update($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Validation et sécurité des entrées utilisateur
            $data = [
                'nom' => htmlspecialchars($_POST['nom']),
                'prenom' => htmlspecialchars($_POST['prenom']),
                'date_naiss' => $_POST['date_naiss'],
                'adresse' => htmlspecialchars($_POST['adresse']),
                'mail' => filter_var($_POST['mail'], FILTER_SANITIZE_EMAIL),
                'num_tel' => htmlspecialchars($_POST['num_tel']),
                'statut' => htmlspecialchars($_POST['statut']),
                'type' => htmlspecialchars($_POST['type'])
            ];

            // Mise à jour via le modèle
            $result = $this->model->update($id, $data['nom'], $data['prenom'], $data['date_naiss'], $data['adresse'], $data['mail'], $data['num_tel'], $data['statut'], $data['type']);

            if ($result) {
                header('Location: index.php'); // Redirection après succès
                exit;
            } else {
                echo "Erreur lors de la mise à jour de l'utilisateur.";
            }
        } else {
            $user = $this->model->readById($id); // Récupérer les données de l'utilisateur
            if ($user) {
                include '../views/utilisateurs/edit.php'; // Charger la vue d'édition
            } else {
                echo "Utilisateur non trouvé.";
            }
        }
    }

    /**
     * Supprime un utilisateur.
     */
    public function delete($id)
    {
        $user = $this->model->readById($id); // Récupérer les informations de l'utilisateur
        
        if (!$user) {
            die("Utilisateur non trouvé.");
        }
        
        // Traitement de la demande de suppression
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['confirm']) && $_POST['confirm'] === 'yes') {
                if ($this->model->delete($id)) {
                    header("Location: index.php?message=Utilisateur supprimé avec succès");
                    exit;
                } else {
                    echo "<p>Erreur lors de la suppression de l'utilisateur.</p>";
                }
            } else {
                header("Location: index.php");
                exit;
            }
        }else{
            include '../views/utilisateurs/delete.php';
        }
    }
}
