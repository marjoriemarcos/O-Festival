// slotButtons.js

export const slotButtons = {
    init: function () {
        const filterButtons = document.querySelectorAll('.filter-button');
        const tableRows = document.querySelectorAll('#slots-table-body tr');
        const dayTitle = document.getElementById('day-title');
        
        const updateDayTitle = (day) => {
            switch(day) {
                case 'J1':
                    dayTitle.textContent = ' - Jour 1';
                    break;
                case 'J2':
                    dayTitle.textContent = ' - Jour 2';
                    break;
                case 'J3':
                    dayTitle.textContent = ' - Jour 3';
                    break;
                default:
                    dayTitle.textContent = ' - Tous les jours';
            }
        };

        filterButtons.forEach(button => {
            button.addEventListener('click', () => {
                const day = button.getAttribute('data-day');
                
                // Change button appearance
                filterButtons.forEach(btn => btn.classList.remove('selected'));
                button.classList.add('selected');

                // Update day title
                updateDayTitle(day);
                
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
    }
};
