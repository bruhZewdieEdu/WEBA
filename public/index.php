<?php
// Autoload des fichiers nécessaires
require_once '../controllers/UtilisateurController.php';

// Initialisation du contrôleur
$controller = new UtilisateurController();

// Gestion des actions
if (isset($_GET['action'])) {
    $action = $_GET['action'];

    switch ($action) {
        case 'create':
            $controller->create(); // Ajouter un utilisateur
            break;

        case 'edit':
            if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                $controller->update(intval($_GET['id'])); // Modifier un utilisateur
            } else {
                echo "ID invalide ou manquant pour l'action 'edit'.";
            }
            break;

        case 'delete':
            if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                $controller->delete($_GET['id']);
            } else {
                echo "ID invalide ou manquant pour l'action 'delete'.";
            }
            break;

        default:
            $controller->index(); // Afficher la liste des utilisateurs
            break;
    }
} else {
    $controller->index(); // Action par défaut : liste des utilisateurs
}
