<form method="POST" action="index.php?action=create">
    <label for="nom">Nom :</label>
    <input type="text" id="nom" name="nom" required>
    <br>

    <label for="prenom">Prénom :</label>
    <input type="text" id="prenom" name="prenom" required>
    <br>

    <label for="date_naiss">Date de naissance :</label>
    <input type="date" id="date_naiss" name="date_naiss" required>
    <br>

    <label for="adresse">Adresse :</label>
    <input type="text" id="adresse" name="adresse" required>
    <br>

    <label for="mail">Email :</label>
    <input type="email" id="mail" name="mail" required>
    <br>

    <label for="num_tel">Numéro de téléphone :</label>
    <input type="tel" id="num_tel" name="num_tel" pattern="[0-9]{10}" required>
    <br>

    <label for="statut">Statut :</label>
    <input type="text" id="statut" name="statut" required>
    <br>

    <label for="type">Type :</label>
    <input type="text" id="type" name="type" required>
    <br>

    <label for="mdp">Mot de passe :</label>
    <input type="password" id="mdp" name="mdp" required>
    <br>

    <button type="submit">Ajouter</button>
</form>

<a href="../public/index.php?action=index">Retour à la liste</a>