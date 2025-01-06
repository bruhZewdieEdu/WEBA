<h1>Modifier un utilisateur</h1>

<form method="POST" action="index.php?action=edit&id=<?= urlencode($user['UTILISATEURID']) ?>">
    <label>Nom :</label>
    <input type="text" name="nom" value="<?= htmlspecialchars($user['UTILISATEUR_NOM']); ?>" required>
    <br>
    <label>Prénom :</label>
    <input type="text" name="prenom" value="<?= htmlspecialchars($user['UTILISATEUR_PRENOM']); ?>" required>
    <br>
    <label>Date de naissance :</label>
    <input type="date" name="date_naiss" value="<?= htmlspecialchars($user['UTILISATEUR_DATE_NAISS']); ?>" required>
    <br>
    <label>Adresse :</label>
    <input type="text" name="adresse" value="<?= htmlspecialchars($user['UTILISATEUR_ADRESSE']); ?>" required>
    <br>
    <label>Email :</label>
    <input type="email" name="mail" value="<?= htmlspecialchars($user['UTILISATEUR_MAIL']); ?>" required>
    <br>
    <label>Numéro de téléphone :</label>
    <input type="text" name="num_tel" value="<?= htmlspecialchars($user['UTILISATEUR_NUM_TEL']); ?>" required>
    <br>
    <label>Statut :</label>
    <input type="text" name="statut" value="<?= htmlspecialchars($user['UTILISATEUR_STATUT']); ?>" required>
    <br>
    <label>Type :</label>
    <input type="text" name="type" value="<?= htmlspecialchars($user['UTILISATEUR_TYPE']); ?>" required>
    <br>
    <button type="submit">Mettre à jour</button>
</form>
<a href="../public/index.php?action=index">Retour à la liste</a>
<script src="../public/js/main.js"></script>
<link rel="stylesheet" href="../public/css/styles.css">