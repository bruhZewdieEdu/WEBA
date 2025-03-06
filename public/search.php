<?php
require_once '../models/ModelUtilisateur.php';
header('Content-Type: application/json');

if (isset($_GET['query'])) {
    $searchQuery = trim($_GET['query']);
    $model = new ModelUtilisateur();
    $results = $model->search($searchQuery);

    echo json_encode($results);
} else {
    echo json_encode(["error" => "Aucune requête fournie"]);
}
?>