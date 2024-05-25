document.addEventListener('DOMContentLoaded', function() {
    const filterButtons = document.querySelectorAll('.filter-button');
    const tableRows = document.querySelectorAll('#slots-table-body tr');
    const tableTitle = document.getElementById('table-title');
    
    const updateTableTitle = (day) => {
        switch(day) {
            case 'J1':
                tableTitle.textContent = 'Jour 1';
                break;
            case 'J2':
                tableTitle.textContent = 'Jour 2';
                break;
            case 'J3':
                tableTitle.textContent = 'Jour 3';
                break;
            default:
                tableTitle.textContent = 'Liste des créneaux';
        }
    };

    filterButtons.forEach(button => {
        button.addEventListener('click', () => {
            const day = button.getAttribute('data-day');
            
            // Change button appearance
            filterButtons.forEach(btn => btn.classList.remove('selected'));
            button.classList.add('selected');

            // Update table title
            updateTableTitle(day);
            
            // Filter table rows
            tableRows.forEach(row => {
                if (day === 'all' || row.getAttribute('data-day') === day) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    });
});
