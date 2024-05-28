// Définition de l'objet slotButtons
export const slotButtons = {
    // Propriétés pour stocker les éléments HTML
    filterButtons: null,
    tableRows: null,
    dayTitle: null,

    // Méthode d'initialisation
    init: function () {
        // Initialisation des éléments HTML
        slotButtons.filterButtons = document.querySelectorAll('.filter-button');
        slotButtons.tableRows = document.querySelectorAll('#slots-table-body tr');
        slotButtons.dayTitle = document.getElementById('day-title');

        // Vérifiez si les éléments spécifiques à la page sont présents avant d'initialiser slotButtons
        if (slotButtons.dayTitle) {
            slotButtons.bind(); // Initialise slotButtons si les éléments sont présents
        }
    },

    // Méthode pour lier les gestionnaires d'événements
    bind: function () {
        // Fonction pour mettre à jour le titre du jour
        const updateDayTitle = (day) => {
            switch (day) {
                case 'J1':
                    slotButtons.dayTitle.textContent = 'Jour 1';
                    break;
                case 'J2':
                    slotButtons.dayTitle.textContent = 'Jour 2';
                    break;
                case 'J3':
                    slotButtons.dayTitle.textContent = 'Jour 3';
                    break;
                default:
                    slotButtons.dayTitle.textContent = 'Tous les jours';
            }
        };

        // Ajout des écouteurs d'événements aux boutons de filtre
        slotButtons.filterButtons.forEach(button => {
            button.addEventListener('click', (event) => {
                event.preventDefault(); // Empêche le comportement par défaut du lien

                const day = button.getAttribute('data-day');

                // Changement de l'apparence du bouton
                slotButtons.filterButtons.forEach(btn => btn.classList.remove('selected'));
                button.classList.add('selected');

                // Mise à jour du titre du jour
                updateDayTitle(day);

                // Filtrage des lignes de tableau
                slotButtons.tableRows.forEach(row => {
                    if (day === 'all' || row.getAttribute('data-day') === day) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });
        });
    }
};
