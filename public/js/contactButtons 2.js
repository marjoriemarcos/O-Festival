// contactButtons.js

export const contactButtons = {
    filterButtons: null,  // Variable to store filter buttons
    tableRows: null,      // Variable to store table rows
    statusTitle: null,    // Variable to store the status title element

    // Initialization function
    init: function () {
        // Select all filter buttons
        contactButtons.filterButtons = document.querySelectorAll('.filter-button');
        // Select all table rows in the contact table body
        contactButtons.tableRows = document.querySelectorAll('#contact-table-body tr');
        // Select the status title element
        contactButtons.statusTitle = document.getElementById('status-title');

        // If filter buttons and status title exist, call the bind function
        if (contactButtons.filterButtons.length > 0 && contactButtons.statusTitle !== null) {
            contactButtons.bind();  // Bind event listeners
        }
    },

    // Function to bind event listeners
    bind: function () {
        // Function to update the status title based on the status
        const updateStatusTitle = (status) => {
            switch (status) {
                case 'A traiter':  // Case for 'To be processed'
                    contactButtons.statusTitle.textContent = 'Message à traiter';
                    break;
                case 'Traité':     // Case for 'Processed'
                    contactButtons.statusTitle.textContent = 'Message traité';
                    break;
                default:           // Default case for 'All messages'
                    contactButtons.statusTitle.textContent = 'Tous les messages';
            }
        };

        // Add click event listener to each filter button
        contactButtons.filterButtons.forEach(button => {
            button.addEventListener('click', () => {
                const status = button.getAttribute('data-status');  // Get the status from the button's data attribute

                // Change button appearance by adding 'selected' class to the clicked button and removing it from others
                contactButtons.filterButtons.forEach(btn => btn.classList.remove('selected'));
                button.classList.add('selected');

                // Update the status title based on the selected status
                updateStatusTitle(status);

                // Filter table rows based on the selected status
                contactButtons.tableRows.forEach(row => {
                    if (status === 'all' || row.getAttribute('data-status') === status) {
                        row.style.display = '';  // Show row if it matches the status or if 'all' is selected
                    } else {
                        row.style.display = 'none';  // Hide row if it does not match the status
                    }
                });
            });
        });
    }
};
