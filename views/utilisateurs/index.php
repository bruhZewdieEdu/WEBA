<?php
if (isset($utilisateurs)) {
    foreach ($utilisateurs as $row) {
        echo "<p>{$row['UTILISATEUR_NOM']} {$row['UTILISATEUR_PRENOM']} ({$row['UTILISATEUR_MAIL']}) 
            - <a href='edit.php?id={$row['UTILISATEURID']}'>Modifier</a> 
            - <a href='delete.php?id={$row['UTILISATEURID']}'>Supprimer</a></p>";
    }
} else {
    echo "<p>Aucun utilisateur trouvé.</p>";
}
?>
<a href="?action=create">Ajouter un utilisateur</a>
