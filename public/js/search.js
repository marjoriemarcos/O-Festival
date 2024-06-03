// search.js

// Définition de l'objet search et de ses méthodes
export const search = {
    // Initialisation de la fonction
    init: function() {
        // Initialise les éléments HTML
        search.initElements();
        // Vérifie si les éléments nécessaires sont présents avant de lier les gestionnaires d'événements
        if (search.searchButton && search.searchInput) {
            search.bind();
        }
    },

    // Initialisation des éléments HTML
    initElements: function() {
        // Récupère les éléments HTML nécessaires
        search.searchButton = document.getElementById('searchButton');
        search.resetButton = document.getElementById('resetButton');
        search.searchInput = document.querySelector('.search-input');
        search.tbody = document.querySelector('tbody');
        search.noResultsMessage = document.getElementById('noResultsMessage');
        search.tableWrapper = document.getElementById('tableWrapper');
    },

    // Gestion des événements
    bind: function() {
        // Définition du gestionnaire d'événement pour la réinitialisation
        const resetHandler = (event) => {
            event.preventDefault(); // Empêche le comportement par défaut du bouton de réinitialisation
            search.searchInput.value = '';
            search.searchInput.form.submit();
        };

        // Ajout des écouteurs d'événements pour la réinitialisation
        if (search.resetButton) {
            search.resetButton.addEventListener('click', resetHandler);
        }

        // Affichage du bouton de réinitialisation en fonction de la saisie
        search.searchInput.addEventListener('input', () => {
            if (search.searchInput.value.trim() !== '') {
                search.resetButton.style.display = 'block';
            } else {
                search.resetButton.style.display = 'none';
            }
        });

        // Vérification si le tbody est vide et basculement du style en conséquence
        const checkTbody = () => {
            if (search.tbody.children.length === 0) {
                search.noResultsMessage.style.display = 'block'; // Affiche le message "Aucun résultat trouvé"
                search.tableWrapper.style.display = 'none'; // Masque le conteneur du tableau
            } else {
                search.noResultsMessage.style.display = 'none'; // Masque le message "Aucun résultat trouvé"
                search.tableWrapper.style.display = 'block'; // Affiche le conteneur du tableau
            }
        };

        // Vérification initiale du tbody
        checkTbody();

        // Ajout de l'événement de changement du tbody
        search.searchInput.addEventListener('input', checkTbody);
    }
};

// Initialisation du script après le chargement du DOM
document.addEventListener('DOMContentLoaded', search.init);
