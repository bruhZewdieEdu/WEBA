<?php

// Vérification de la présence de l'ID utilisateur
if (!isset($_GET['id'])) {
    die("ID utilisateur manquant.");
}

$id = intval($_GET['id']); // S'assurer que l'ID est un entier
$user = $controller->getUserById($id); // Récupérer les informations de l'utilisateur

if (!$user) {
    die("Utilisateur non trouvé.");
}

// Traitement de la demande de suppression
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['confirm']) && $_POST['confirm'] === 'yes') {
        if ($controller->delete($id)) {
            header("Location: index.php?message=Utilisateur supprimé avec succès");
            exit;
        } else {
            echo "<p>Erreur lors de la suppression de l'utilisateur.</p>";
        }
    } else {
        header("Location: index.php");
        exit;
    }
}
?>

<h1>Supprimer un utilisateur</h1>
<p>Êtes-vous sûr de vouloir supprimer l'utilisateur suivant ?</p>

<ul>
    <li><strong>Nom :</strong> <?= htmlspecialchars($user['UTILISATEUR_NOM']); ?></li>
    <li><strong>Prénom :</strong> <?= htmlspecialchars($user['UTILISATEUR_PRENOM']); ?></li>
    <li><strong>Email :</strong> <?= htmlspecialchars($user['UTILISATEUR_MAIL']); ?></li>
</ul>

<form method="POST" action="index.php?action=delete&id=<?= urlencode($user['UTILISATEURID']) ?>">
    <button type="submit" name="confirm" value="yes">Confirmer la suppression</button>
    <a href="index.php">Annuler</a>
</form>
