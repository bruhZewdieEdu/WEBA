<?php
// Autoload des fichiers nécessaires
require_once '../controllers/UtilisateurController.php';

$controller = new UtilisateurController();

if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'create':
            $controller->create();
            break;
        default:
            $controller->index();
            break;
    }
} else {
    $controller->index();
}