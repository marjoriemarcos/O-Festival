// Definition of the ticketButtons module
export const ticketButtons = {
    // Module properties
    filterButtons: null,
    tableRows: null,
    durationTitle: null,

    // Initialization function
    init: function () {
        // Initialize elements
        ticketButtons.filterButtons = document.querySelectorAll('.filter-button');
        ticketButtons.tableRows = document.querySelectorAll('#tickets-table-body tr');
        ticketButtons.durationTitle = document.getElementById('duration-title');

        // Check if the page-specific elements are present before initializing ticketButtons
        if (ticketButtons.durationTitle) {
            ticketButtons.bind(); // Initialize ticketButtons if the elements are present
        }
    },

    // Function to bind event handlers
    bind: function () {
        // Function to update the duration title
        const updateDurationTitle = (type) => {
            switch (type) {
                case 'Pass 1 JOUR':
                    ticketButtons.durationTitle.textContent = 'Pass 1 Jour';
                    break;
                case 'Pass 2 JOURS':
                    ticketButtons.durationTitle.textContent = 'Pass 2 Jours';
                    break;
                case 'Pass 3 JOURS':
                    ticketButtons.durationTitle.textContent = 'Pass 3 Jours';
                    break;
                default:
                    ticketButtons.durationTitle.textContent = 'Tous les pass';
            }
        };

        // Loop through filter buttons and add event listeners
        ticketButtons.filterButtons.forEach(button => {
            button.addEventListener('click', (event) => {
                event.preventDefault(); // Prevent the default link behavior

                // Get the duration from the button's data-duration attribute
                const duration = button.getAttribute('data-duration');

                // Change the button appearance
                ticketButtons.filterButtons.forEach(btn => btn.classList.remove('selected'));
                button.classList.add('selected');

                // Update the duration title
                updateDurationTitle(duration);

                // Filter table rows based on the selected duration
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

// Initialize the ticketButtons module
ticketButtons.init();
