document.addEventListener('DOMContentLoaded', () => {
    // Suppression dynamique d'un utilisateur
    document.querySelectorAll('.delete-btn').forEach(button => {
        button.addEventListener('click', async (event) => {
            event.preventDefault();

            const userId = event.target.dataset.id;
            const confirmed = confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?');

            if (confirmed) {
                try {
                    const response = await fetch(`index.php?action=delete&id=${userId}`, { 
                        method: 'POST', 
                        body: new URLSearchParams({ confirm: 'yes' }) 
                    });
                    if (response.ok) {
                        alert('Utilisateur supprimé avec succès.');
                        location.reload(); // Recharger la liste des utilisateurs
                    } else {
                        alert('Erreur lors de la suppression.');
                    }
                } catch (error) {
                    console.error('Erreur : ', error);
                    alert('Erreur réseau. Veuillez réessayer.');
                }
            }
        });
    });

    // Validation du formulaire d'ajout
    const form = document.querySelector('form[action*="create"]');
    if (form) {
        form.addEventListener('submit', (e) => {
            const email = form.querySelector('input[name="mail"]').value;
            const password = form.querySelector('input[name="mdp"]').value;

            if (!email.includes('@')) {
                e.preventDefault();
                alert('Veuillez entrer une adresse e-mail valide.');
            }

            if (password.length < 6) {
                e.preventDefault();
                alert('Le mot de passe doit contenir au moins 6 caractères.');
            }
        });
    }
});
