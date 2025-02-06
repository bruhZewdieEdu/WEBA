<?php if (!empty($utilisateurs)) : ?>
    <!DOCTYPE html>
    <html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Navigation entre les utilisateurs</title>
    </head>

    <body>
        <h1>Navigation entre les utilisateurs</h1>
        <div id="userContainer">
            <!-- L'utilisateur actif sera affiché ici -->
        </div>
        <div class="navigation-buttons">
            <button id="prevButton">Précédent</button>
            <button id="nextButton">Suivant</button>
        </div>

        <!-- Script contenant le tableau PHP converti en tableau JS et le JavaScript -->
        <script>
            // Tableau PHP converti en tableau JS
            const users = [
                <?php foreach ($utilisateurs as $user) : ?> {
                        id: '<?= $user['UTILISATEURID'] ?>',
                        name: '<?= addslashes($user['UTILISATEUR_NOM'] . ' ' . $user['UTILISATEUR_PRENOM']) ?>',
                        email: '<?= addslashes($user['UTILISATEUR_MAIL']) ?>'
                    },
                <?php endforeach; ?>
            ];

            let currentIndex = 0; // Index de l'utilisateur actif

            // Références des éléments DOM
            const userContainer = document.getElementById("userContainer");
            const prevButton = document.getElementById("prevButton");
            const nextButton = document.getElementById("nextButton");

            // Fonction pour créer et afficher un utilisateur dans le DOM
            function renderUser(user) {
                userContainer.innerHTML = ""; // Nettoyer le conteneur

                const userCard = document.createElement("div");
                userCard.classList.add("user-card");

                const userName = document.createElement("h2");
                userName.textContent = user.name;

                const userEmail = document.createElement("p");
                userEmail.textContent = user.email;

                // Bouton Modifier
                const editButton = document.createElement("button");
                editButton.textContent = "Modifier";
                editButton.addEventListener("click", function() {
                    window.location.href = `index.php?action=edit&id=${user.id}`;
                });

                userCard.appendChild(userName);
                userCard.appendChild(userEmail);
                userCard.appendChild(editButton);
                userContainer.appendChild(userCard);
            }

            // Fonction pour mettre à jour l'affichage
            function updateDisplay() {
                if (!users || users.length === 0) {
                    userContainer.innerHTML = "<p>Aucun utilisateur trouvé.</p>";
                    prevButton.disabled = true;
                    nextButton.disabled = true;
                    return;
                }

                renderUser(users[currentIndex]);

                // Activer ou désactiver les boutons
                prevButton.disabled = currentIndex === 0;
                nextButton.disabled = currentIndex === users.length - 1;
            }

            // Fonction pour afficher l'utilisateur précédent
            function showPrevious() {
                if (currentIndex > 0) {
                    currentIndex--;
                    updateDisplay();
                }
            }

            // Fonction pour afficher l'utilisateur suivant
            function showNext() {
                if (currentIndex < users.length - 1) {
                    currentIndex++;
                    updateDisplay();
                }
            }

            // Ajouter les gestionnaires d'événements
            prevButton.addEventListener("click", showPrevious);
            nextButton.addEventListener("click", showNext);

            // Initialiser l'affichage
            updateDisplay();
        </script>
    </body>

    </html>
<?php else : ?>
    <p>Aucun utilisateur trouvé.</p>
<?php endif; ?>

<a href="?action=create">Ajouter un utilisateur</a>
