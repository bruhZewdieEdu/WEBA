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
    public function search($query) {
        $query = trim(htmlspecialchars($query)); // Sécurisation
        $model = new ModelUtilisateur();
        $results = $model->search($query);
        header('Content-Type: application/json');
        echo json_encode($results);
    }
    
    /**
     * Crée un nouvel utilisateur.
     */
    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Validation des champs
            $nom = !empty($_POST['nom']) ? htmlspecialchars(trim($_POST['nom'])) : null;
            $prenom = !empty($_POST['prenom']) ? htmlspecialchars(trim($_POST['prenom'])) : null;
            $date_naiss = !empty($_POST['date_naiss']) ? trim($_POST['date_naiss']) : null;
            $adresse = !empty($_POST['adresse']) ? htmlspecialchars(trim($_POST['adresse'])) : null;
            $mail = !empty($_POST['mail']) ? filter_var(trim($_POST['mail']), FILTER_SANITIZE_EMAIL) : null;
            $num_tel = !empty($_POST['num_tel']) ? htmlspecialchars(trim($_POST['num_tel'])) : null;
            $statut = !empty($_POST['statut']) ? htmlspecialchars(trim($_POST['statut'])) : null;
            $type = !empty($_POST['type']) ? htmlspecialchars(trim($_POST['type'])) : null;
            $mdp = !empty($_POST['mdp']) ? htmlspecialchars(trim($_POST['mdp'])) : null;

            // Vérifier si tous les champs requis sont remplis
            if ($nom && $prenom && $date_naiss && $adresse && $mail && $num_tel && $statut && $type && $mdp) {
                $result = $this->model->create($nom, $prenom, $date_naiss, $adresse, $mail, $num_tel, $statut, $type, $mdp);
                if ($result) {
                    header('Location: index.php');
                    exit;
                } else {
                    echo "Erreur lors de la création de l'utilisateur.";
                }
            } else {
                echo "Tous les champs sont requis.";
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
                'nom' => !empty($_POST['nom']) ? htmlspecialchars(trim($_POST['nom'])) : null,
                'prenom' => !empty($_POST['prenom']) ? htmlspecialchars(trim($_POST['prenom'])) : null,
                'date_naiss' => !empty($_POST['date_naiss']) ? trim($_POST['date_naiss']) : null,
                'adresse' => !empty($_POST['adresse']) ? htmlspecialchars(trim($_POST['adresse'])) : null,
                'mail' => !empty($_POST['mail']) ? filter_var(trim($_POST['mail']), FILTER_SANITIZE_EMAIL) : null,
                'num_tel' => !empty($_POST['num_tel']) ? htmlspecialchars(trim($_POST['num_tel'])) : null,
                'statut' => !empty($_POST['statut']) ? htmlspecialchars(trim($_POST['statut'])) : null,
                'type' => !empty($_POST['type']) ? htmlspecialchars(trim($_POST['type'])) : null,
            ];

            if (array_filter($data)) {
                // Mise à jour via le modèle
                $result = $this->model->update($id, ...array_values($data));
                if ($result) {
                    header('Location: index.php');
                    exit;
                } else {
                    echo "Erreur lors de la mise à jour de l'utilisateur.";
                }
            } else {
                echo "Tous les champs sont requis pour la mise à jour.";
            }
        } else {
            $user = $this->model->readById($id);
            if ($user) {
                include '../views/utilisateurs/edit.php';
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

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['confirm']) && $_POST['confirm'] === 'yes') {
                if ($this->model->delete($id)) {
                    header("Location: index.php?message=Utilisateur supprimé avec succès");
                    exit;
                } else {
                    echo "Erreur lors de la suppression de l'utilisateur.";
                }
            } else {
                header("Location: index.php");
                exit;
            }
        } else {
            include '../views/utilisateurs/delete.php';
        }
    }
}
