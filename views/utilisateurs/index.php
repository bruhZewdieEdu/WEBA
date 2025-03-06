<!DOCTYPE html> 
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des utillisateurs</title>
</head>

<body>
    <h1>Liste des utillisateurs</h1>

    <!-- Champ de recherche + bouton -->
    <input type="text" id="searchInput" placeholder="Rechercher un utilisateur..." />
    <button id="searchButton">Rechercher</button>

    <div id="searchResults"></div>

    <div id="userContainer">
        <!-- L'utilisateur actif sera affiché ici -->
    </div>

    <div class="navigation-buttons">
        <button id="prevButton">Précédent</button>
        <button id="nextButton">Suivant</button>
    </div>

    <a href="?action=create">Ajouter un utilisateur</a>

    <script>
        let users = []; // Tableau pour stocker les utilisateurs
        let currentIndex = 0; // Index de l'utilisateur actif

        // Références des éléments DOM
        const searchInput = document.getElementById("searchInput");
        const searchButton = document.getElementById("searchButton");
        const searchResults = document.getElementById("searchResults");
        const userContainer = document.getElementById("userContainer");
        const prevButton = document.getElementById("prevButton");
        const nextButton = document.getElementById("nextButton");

        // Fonction AJAX pour charger les utilisateurs depuis la base de données
        function fetchUsers(query = "") {
            fetch(`search.php?query=${encodeURIComponent(query)}`)
                .then(response => response.json())
                .then(data => {
                    users = data; // Mettre à jour la liste des utilisateurs
                    currentIndex = 0; // Réinitialiser l'index
                    updateDisplay(); // Mettre à jour l'affichage
                })
                .catch(error => console.error("Erreur lors de la récupération des utilisateurs :", error));
        }

        // Fonction pour afficher un utilisateur
        function renderUser(user) {
            userContainer.innerHTML = ""; // Nettoyer le conteneur

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
        }

        // Fonction pour mettre à jour l'affichage
        function updateDisplay() {
            searchResults.innerHTML = ""; // Nettoyer les résultats de recherche

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

        // Gestionnaire de recherche sur clic du bouton
        searchButton.addEventListener("click", function () {
            let query = searchInput.value.trim();
            fetchUsers(query); // Charger les utilisateurs filtrés
        });

        // Ajouter les gestionnaires d'événements
        prevButton.addEventListener("click", showPrevious);
        nextButton.addEventListener("click", showNext);

        // Charger les utilisateurs au démarrage
        fetchUsers();
    </script>
</body>

</html>
