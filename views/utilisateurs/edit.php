<?php
require_once '../../config/database.php';
require_once '../../controllers/UtilisateurController.php';

$database = new Database();
$db = $database->getConnection();
$controller = new UtilisateurController($db);

if (!isset($_GET['id'])) {
    die("ID utilisateur manquant.");
}

$id = $_GET['id'];
$user = $controller->model->read()->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = [
        'nom' => $_POST['nom'],
        'prenom' => $_POST['prenom'],
        'date_naiss' => $_POST['date_naiss'],
        'adresse' => $_POST['adresse'],
        'mail' => $_POST['mail'],
        'num_tel' => $_POST['num_tel'],
        'statut' => $_POST['statut'],
        'type' => $_POST['type']
    ];
    if ($controller->update($id, $data)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Erreur lors de la mise à jour de l'utilisateur.";
    }
}
?>

<h1>Modifier un utilisateur</h1>
<form method="POST">
    <label>Nom :</label>
    <input type="text" name="nom" value="<?= $user['UTILISATEUR_NOM']; ?>" required>
    <br>
    <label>Prénom :</label>
    <input type="text" name="prenom" value="<?= $user['UTILISATEUR_PRENOM']; ?>" required>
    <br>
    <label>Date de naissance :</label>
    <input type="date" name="date_naiss" value="<?= $user['UTILISATEUR_DATE_NAISS']; ?>" required>
    <br>
    <label>Adresse :</label>
    <input type="text" name="adresse" value="<?= $user['UTILISATEUR_ADRESSE']; ?>" required>
    <br>
    <label>Email :</label>
    <input type="email" name="mail" value="<?= $user['UTILISATEUR_MAIL']; ?>" required>
    <br>
    <label>Numéro de téléphone :</label>
    <input type="text" name="num_tel" value="<?= $user['UTILISATEUR_NUM_TEL']; ?>" required>
    <br>
    <label>Statut :</label>
    <input type="text" name="statut" value="<?= $user['UTILISATEUR_STATUT']; ?>" required>
    <br>
    <label>Type :</label>
    <input type="text" name="type" value="<?= $user['UTILISATEUR_TYPE']; ?>" required>
    <br>
    <button type="submit">Mettre à jour</button>
</form>
<a href="index.php">Retour à la liste</a>
