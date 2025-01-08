// Index actuel de l'utilisateur affiché
let currentIndex = 0;

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

    userCard.appendChild(userName);
    userCard.appendChild(userEmail);
    userContainer.appendChild(userCard);
}

// Fonction pour mettre à jour l'affichage
function updateDisplay() {
    if (!users || users.length === 0) {
        userContainer.innerHTML = "<p>Aucun utilisateur trouvé.</p>";
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

// Initialiser l'affichage
updateDisplay();
