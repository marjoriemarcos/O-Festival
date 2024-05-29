// tableSort.js

export const tableSort = {
    // Propriétés du module
    sortableColumns: null,

    // Fonction d'initialisation
    init: function () {
        tableSort.sortableColumns = document.querySelectorAll('[data-sortable]'); // Initialisation des colonnes triables
        tableSort.bind(); // Appel de la fonction bind lors de l'initialisation
    },

    // Fonction de liaison des événements
    bind: function () {
        tableSort.sortableColumns.forEach(column => {
            column.addEventListener('click', () => {
                const sortOrder = column.dataset.order === 'asc' ? 'desc' : 'asc';

                // Réinitialiser les attributs de tri de toutes les colonnes
                tableSort.sortableColumns.forEach(col => {
                    col.dataset.order = '';
                });

                // Mettre à jour l'attribut de tri de la colonne cliquée
                column.dataset.order = sortOrder;

                // Obtenir l'index de la colonne cliquée
                const columnIndex = Array.from(column.parentNode.children).indexOf(column);

                // Obtenir les lignes du tableau
                const rows = Array.from(document.querySelectorAll('tbody > tr'));

                // Trier les lignes en fonction de la valeur de la colonne cliquée
                const sortedRows = rows.sort((a, b) => {
                    const aValue = a.children[columnIndex].innerText.trim();
                    const bValue = b.children[columnIndex].innerText.trim();

                    if (sortOrder === 'asc') {
                        return bValue.localeCompare(aValue);
                    } else {
                        return aValue.localeCompare(bValue);
                    }
                });

                // Remplacer les lignes dans le tableau par les lignes triées
                const tbody = document.querySelector('tbody');
                while (tbody.firstChild) {
                    tbody.removeChild(tbody.firstChild);
                }
                sortedRows.forEach(row => tbody.appendChild(row));
            });
        });
    }
};

// Initialiser le module tableSort
tableSort.init();
