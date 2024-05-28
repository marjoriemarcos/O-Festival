export const contactButtons = {
    init: function () {
        const filterButtons = document.querySelectorAll('.filter-button');
        const tableRows = document.querySelectorAll('#contact-table-body tr');
        const statusTitle = document.getElementById('status-title');

        const updateStatusTitle = (status) => {
            switch (status) {
                case 'A traiter':
                    statusTitle.textContent = ' - A traiter';
                    break;
                case 'Traité':
                    statusTitle.textContent = ' - Traité';
                    break;
                default:
                    statusTitle.textContent = ' - Tous les messages';
            }
        };

        filterButtons.forEach(button => {
            button.addEventListener('click', () => {
                const status = button.getAttribute('data-status');

                // Change button appearance
                filterButtons.forEach(btn => btn.classList.remove('selected'));
                button.classList.add('selected');

                // Update status title
                updateStatusTitle(status);

                // Filter table rows
                tableRows.forEach(row => {
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