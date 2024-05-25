document.addEventListener('DOMContentLoaded', function() {
    const filterButtons = document.querySelectorAll('.filter-button');
    const tableRows = document.querySelectorAll('#tickets-table-body tr');
    const tableTitle = document.getElementById('table-title');
    
    const updateTableTitle = (duration) => {
        switch(duration) {
            case '24':
                tableTitle.textContent = 'Pass 1 Jour';
                break;
            case '48':
                tableTitle.textContent = 'Pass 2 Jours';
                break;
            case '72':
                tableTitle.textContent = 'Pass 3 Jours';
                break;
            default:
                tableTitle.textContent = 'Liste des tickets';
        }
    };

    filterButtons.forEach(button => {
        button.addEventListener('click', () => {
            const duration = button.getAttribute('data-duration');
            
            // Change button appearance
            filterButtons.forEach(btn => btn.classList.remove('selected'));
            button.classList.add('selected');

            // Update table title
            updateTableTitle(duration);
            
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
});
