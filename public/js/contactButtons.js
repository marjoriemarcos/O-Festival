// contactButtons.js

export const contactButtons = {
    filterButtons: null,
    tableRows: null,
    statusTitle: null,

    init: function () {
        contactButtons.filterButtons = document.querySelectorAll('.filter-button');
        contactButtons.tableRows = document.querySelectorAll('#contact-table-body tr');
        contactButtons.statusTitle = document.getElementById('status-title');

        if (contactButtons.filterButtons.length > 0 && contactButtons.statusTitle !== null) {
            // Appel de la fonction bind si les éléments nécessaires sont présents
            contactButtons.bind();
        }
    },

    // Fonction de liaison des événements
    bind: function () {
        const updateStatusTitle = (status) => {
            switch (status) {
                case 'A traiter':
                    contactButtons.statusTitle.textContent = 'Message à traiter';
                    break;
                case 'Traité':
                    contactButtons.statusTitle.textContent = 'Message traité';
                    break;
                default:
                    contactButtons.statusTitle.textContent = 'Tous les messages';
            }
        };

        contactButtons.filterButtons.forEach(button => {
            button.addEventListener('click', () => {
                const status = button.getAttribute('data-status');

                // Change button appearance
                contactButtons.filterButtons.forEach(btn => btn.classList.remove('selected'));
                button.classList.add('selected');

                // Update status title
                updateStatusTitle(status);

                // Filter table rows
                contactButtons.tableRows.forEach(row => {
                    if (status === 'all' || row.getAttribute('data-status') === status) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });
        });
    }
};