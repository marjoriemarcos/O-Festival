// search.js

// Definition of the search object and its methods
export const search = {
    // Initialization function
    init: function() {
        // Initialize HTML elements
        search.initElements();
        // Check if the necessary elements are present before binding event handlers
        if (search.searchButton && search.searchInput) {
            search.bind();
        }
    },

    // Initialization of HTML elements
    initElements: function() {
        // Get the necessary HTML elements
        search.searchButton = document.getElementById('searchButton');
        search.resetButton = document.getElementById('resetButton');
        search.searchInput = document.querySelector('.search-input');
        search.tbody = document.querySelector('tbody');
        search.noResultsMessage = document.getElementById('noResultsMessage');
        search.tableWrapper = document.getElementById('tableWrapper');
    },

    // Event handling
    bind: function() {
        // Define the event handler for resetting
        const resetHandler = (event) => {
            event.preventDefault(); // Prevent the default behavior of the reset button
            search.searchInput.value = '';
            search.searchInput.form.submit();
        };

        // Add event listeners for resetting
        if (search.resetButton) {
            search.resetButton.addEventListener('click', resetHandler);
        }

        // Show the reset button based on the input
        search.searchInput.addEventListener('input', () => {
            if (search.searchInput.value.trim() !== '') {
                search.resetButton.style.display = 'block';
            } else {
                search.resetButton.style.display = 'none';
            }
        });

        // Check if the tbody is empty and toggle the style accordingly
        const checkTbody = () => {
            if (search.tbody.children.length === 0) {
                search.noResultsMessage.style.display = 'block'; // Show "No results found" message
                search.tableWrapper.style.display = 'none'; // Hide the table container
            } else {
                search.noResultsMessage.style.display = 'none'; // Hide "No results found" message
                search.tableWrapper.style.display = 'block'; // Show the table container
            }
        };

        // Initial check of the tbody
        checkTbody();

        // Add the input event listener to check the tbody
        search.searchInput.addEventListener('input', checkTbody);
    }
};

// Initialize the script after the DOM has loaded
document.addEventListener('DOMContentLoaded', search.init);
