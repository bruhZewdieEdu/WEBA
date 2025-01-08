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
<script src="../public/js/main.js"></script>
<link rel="stylesheet" href="../public/css/styles.css">
