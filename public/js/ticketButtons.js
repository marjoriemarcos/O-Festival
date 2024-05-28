// Définition du module ticketButtons
export const ticketButtons = {
    // Propriétés du module
    filterButtons: null,
    tableRows: null,
    durationTitle: null,

    // Fonction d'initialisation
    init: function () {
        // Initialisation des éléments
        ticketButtons.filterButtons = document.querySelectorAll('.filter-button');
        ticketButtons.tableRows = document.querySelectorAll('#tickets-table-body tr');
        ticketButtons.durationTitle = document.getElementById('duration-title');

        // Vérifiez si les éléments spécifiques à la page sont présents avant d'initialiser ticketButtons
        if (ticketButtons.durationTitle) {
            ticketButtons.bind(); // Initialise ticketButtons si les éléments sont présents
        }
    },

    // Fonction de liaison des événements
    bind: function () {
        // Fonction pour mettre à jour le titre de la durée
        const updateDurationTitle = (duration) => {
            switch (duration) {
                case '24':
                    ticketButtons.durationTitle.textContent = 'Pass 1 Jour';
                    break;
                case '48':
                    ticketButtons.durationTitle.textContent = 'Pass 2 Jours';
                    break;
                case '72':
                    ticketButtons.durationTitle.textContent = 'Pass 3 Jours';
                    break;
                default:
                    ticketButtons.durationTitle.textContent = 'Tous les pass';
            }
        };

        // Parcourir les boutons de filtre et ajouter des écouteurs d'événements
        ticketButtons.filterButtons.forEach(button => {
            button.addEventListener('click', (event) => {
                event.preventDefault(); // Empêcher le comportement par défaut du lien

                // Obtenir la durée à partir de l'attribut data-duration du bouton
                const duration = button.getAttribute('data-duration');

                // Changement de l'apparence du bouton
                ticketButtons.filterButtons.forEach(btn => btn.classList.remove('selected'));
                button.classList.add('selected');

                // Mise à jour du titre de la durée
                updateDurationTitle(duration);

                // Filtrer les lignes de tableau en fonction de la durée sélectionnée
                ticketButtons.tableRows.forEach(row => {
                    if (duration === 'all' || row.getAttribute('data-duration') === duration) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });
        });
    }
};

// Initialiser le module ticketButtons
ticketButtons.init();
