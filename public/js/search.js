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
        search.searchableTable = document.querySelector('.searchable-table');
        search.noResultsMessage = document.getElementById('noResultsMessage');
        search.tableWrapper = document.getElementById('tableWrapper');
    },

    // Gestion des événements
    bind: function() {
        // Définition du gestionnaire d'événement pour la recherche
        const searchHandler = (event) => {
            event.preventDefault(); // Empêche le comportement par défaut du formulaire
            const searchTerm = search.searchInput.value.trim().toLowerCase();
            const rows = search.searchableTable.querySelectorAll('tbody tr');
            let hasResults = false;

            // Parcours de chaque ligne du tableau
            rows.forEach(row => {
                const cells = row.querySelectorAll('td');
                let found = false;
                cells.forEach(cell => {
                    const text = cell.textContent.trim().toLowerCase();
                    // Vérification si le terme de recherche est présent dans la cellule
                    if (text.includes(searchTerm)) {
                        found = true;
                        hasResults = true;
                    }
                });
                // Affichage ou masquage de la ligne en fonction des résultats de recherche
                if (found) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });

            // Affichage ou masquage du message de résultats vides et du conteneur du tableau
            if (!hasResults) {
                search.noResultsMessage.style.display = 'block';
                search.tableWrapper.style.display = 'none';
            } else {
                search.noResultsMessage.style.display = 'none';
                search.tableWrapper.style.display = '';
            }

            // Affichage du bouton de réinitialisation
            search.resetButton.style.display = 'block';
        };

        // Définition du gestionnaire d'événement pour la réinitialisation
        const resetHandler = (event) => {
            event.preventDefault(); // Empêche le comportement par défaut du bouton de réinitialisation
            search.searchInput.value = '';
            const rows = search.searchableTable.querySelectorAll('tbody tr');
            // Réinitialisation de l'affichage des lignes
            rows.forEach(row => {
                row.style.display = '';
            });
            // Masquage du message de résultats vides et du bouton de réinitialisation
            search.noResultsMessage.style.display = 'none';
            search.tableWrapper.style.display = '';
            search.resetButton.style.display = 'none';
        };

        // Ajout des écouteurs d'événements pour la recherche et la réinitialisation
        search.searchButton.addEventListener('click', searchHandler);
        search.resetButton.addEventListener('click', resetHandler);
    }
};
