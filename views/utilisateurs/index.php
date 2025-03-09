<!DOCTYPE html> 
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des utilisateurs</title>
</head>
<body>
    <h1>Liste des utilisateurs</h1>

    <!-- Champ de recherche + bouton -->
    <input type="text" id="searchInput" placeholder="Rechercher un utilisateur..." />
    <button id="searchButton">Rechercher</button>

    <div id="searchResults"></div>

    <div id="userContainer">
        <!-- Les utilisateurs seront affichés ici -->
    </div>

    <a href="?action=create">Ajouter un utilisateur</a>

    <script>
        let users = []; // Tableau pour stocker les utilisateurs
        let searchQuery = ""; // Requête de recherche

        // Références des éléments DOM
        const searchInput = document.getElementById("searchInput");
        const searchButton = document.getElementById("searchButton");
        const userContainer = document.getElementById("userContainer");

        // Fonction AJAX pour charger les utilisateurs depuis la base de données
        function fetchUsers(query = "") {
            fetch(`search.php?query=${encodeURIComponent(query)}`)
                .then(response => response.json())
                .then(data => {
                    users = data; // Mettre à jour la liste des utilisateurs
                    updateDisplay(); // Mettre à jour l'affichage
                })
                .catch(error => console.error("Erreur lors de la récupération des utilisateurs :", error));
        }

        // Fonction pour afficher plusieurs utilisateurs
        function renderUsers(usersList) {
            userContainer.innerHTML = ""; // Nettoyer le conteneur

            if (usersList.length === 0) {
                userContainer.innerHTML = "<p>Aucun utilisateur trouvé.</p>";
                return;
            }

            // Afficher chaque utilisateur
            usersList.forEach(user => {
                const userCard = document.createElement("div");
                userCard.classList.add("user-card");

                const userName = document.createElement("h2");
                userName.textContent = user.UTILISATEUR_NOM + " " + user.UTILISATEUR_PRENOM;

                const userEmail = document.createElement("p");
                userEmail.textContent = user.UTILISATEUR_MAIL;

                // Bouton Modifier
                const editButton = document.createElement("button");
                editButton.textContent = "Modifier";
                editButton.addEventListener("click", function () {
                    window.location.href = `index.php?action=edit&id=${user.UTILISATEURID}`;
                });

                userCard.appendChild(userName);
                userCard.appendChild(userEmail);
                userCard.appendChild(editButton);
                userContainer.appendChild(userCard);
            });
        }

        // Fonction pour mettre à jour l'affichage
        function updateDisplay() {
            if (!users || users.length === 0) {
                userContainer.innerHTML = "<p>Aucun utilisateur trouvé.</p>";
                return;
            }

            renderUsers(users);
        }

        // Gestionnaire de recherche sur clic du bouton
        searchButton.addEventListener("click", function () {
            searchQuery = searchInput.value.trim();
            fetchUsers(searchQuery); // Charger les utilisateurs filtrés
        });

        // Charger les utilisateurs au démarrage
        fetchUsers();
    </script>
</body>
</html>
