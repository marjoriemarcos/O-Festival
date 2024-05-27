// ticketButtons.js

export const ticketButtons = {
    init: function () {
        const filterButtons = document.querySelectorAll('.filter-button');
        const tableRows = document.querySelectorAll('#tickets-table-body tr');
        const durationTitle = document.getElementById('duration-title');

        const updateDurationTitle = (duration) => {
            switch(duration) {
                case '24':
                    durationTitle.textContent = ' - Pass 1 Jour';
                    break;
                case '48':
                    durationTitle.textContent = ' - Pass 2 Jours';
                    break;
                case '72':
                    durationTitle.textContent = ' - Pass 3 Jours';
                    break;
                default:
                    durationTitle.textContent = ' - Tous les pass';
            }
        };

        filterButtons.forEach(button => {
            button.addEventListener('click', () => {
                const duration = button.getAttribute('data-duration');
                
                // Change button appearance
                filterButtons.forEach(btn => btn.classList.remove('selected'));
                button.classList.add('selected');

                // Update duration title
                updateDurationTitle(duration);
                
                // Filter table rows
                tableRows.forEach(row => {
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
