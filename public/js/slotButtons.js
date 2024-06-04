// Definition of the slotButtons object
export const slotButtons = {
    // Properties to store HTML elements
    filterButtons: null,
    tableRows: null,
    dayTitle: null,

    // Initialization method
    init: function () {
        // Initialize HTML elements
        slotButtons.filterButtons = document.querySelectorAll('.filter-button');
        slotButtons.tableRows = document.querySelectorAll('#slots-table-body tr');
        slotButtons.dayTitle = document.getElementById('day-title');

        // Check if the page-specific elements are present before initializing slotButtons
        if (slotButtons.dayTitle) {
            slotButtons.bind(); // Initialize slotButtons if the elements are present
        }
    },

    // Method to bind event handlers
    bind: function () {
        let btnFilter = document.querySelectorAll('.filter-button');
        
        // Array to hold the text content of the filter buttons
        let tabBtnContent = [];
        for (let i = 0; i < btnFilter.length; i++) {
            tabBtnContent.push(btnFilter[i].textContent);
        }

        // Function to update the day title
        const updateDayTitle = (day) => {
            switch (day) {
                case 'J1':
                    slotButtons.dayTitle.textContent = tabBtnContent[1];
                    break;
                case 'J2':
                    slotButtons.dayTitle.textContent = tabBtnContent[2];
                    break;
                case 'J3':
                    slotButtons.dayTitle.textContent = tabBtnContent[3];
                    break;
                default:
                    slotButtons.dayTitle.textContent = 'Tous les jours';
            }
        };

        // Add event listeners to the filter buttons
        slotButtons.filterButtons.forEach(button => {
            button.addEventListener('click', (event) => {
                event.preventDefault(); // Prevent the default behavior of the link

                const day = button.getAttribute('data-day');

                // Change button appearance
                slotButtons.filterButtons.forEach(btn => btn.classList.remove('selected'));
                button.classList.add('selected');

                // Update the day title
                updateDayTitle(day);

                // Filter table rows
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

// Initialize the slotButtons module
slotButtons.init();
