<?php if (!empty($utilisateurs)) : ?>
    <h1>Liste des utilisateurs</h1>
    <ul>
        <?php foreach ($utilisateurs as $user) : ?>
            <li>
                <?= htmlspecialchars($user['UTILISATEUR_NOM']) ?>
                <?= htmlspecialchars($user['UTILISATEUR_PRENOM']) ?>
                (<?= htmlspecialchars($user['UTILISATEUR_MAIL']) ?>)
                - <a href="?action=edit&id=<?= urlencode($user['UTILISATEURID']) ?>">Modifier</a>
                - <a href="#" class="delete-btn" data-id="<?= htmlspecialchars($user['UTILISATEURID']) ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?');">Supprimer</a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else : ?>
    <p>Aucun utilisateur trouvé.</p>
<?php endif; ?>

<a href="?action=create">Ajouter un utilisateur</a>
<script src="../public/js/main.js"></script>
<link rel="stylesheet" href="../public/css/styles.css">
</body>