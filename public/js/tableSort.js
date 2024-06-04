// Define the tableSort object
export const tableSort = {
    // Properties of the module
    sortableColumns: null,

    // Initialization function
    init: function () {
        // Initialize sortable columns
        tableSort.sortableColumns = document.querySelectorAll('.data-sortable');
        // Call the bind function during initialization
        tableSort.bind();
    },

    // Function to bind event listeners
    bind: function () {
        // Add click event listener to each sortable column
        tableSort.sortableColumns.forEach(column => {
            column.addEventListener('click', () => {
                // Determine the sort order: toggle between ascending and descending
                const sortOrder = column.dataset.order === 'asc' ? 'desc' : 'asc';

                // Reset the sort attributes for all columns
                tableSort.sortableColumns.forEach(col => {
                    col.dataset.order = '';
                });

                // Update the sort attribute of the clicked column
                column.dataset.order = sortOrder;

                // Get the index of the clicked column
                const columnIndex = Array.from(column.parentNode.children).indexOf(column);

                // Get the table rows
                const rows = Array.from(document.querySelectorAll('tbody > tr'));

                // Sort the rows based on the value of the clicked column
                const sortedRows = rows.sort((a, b) => {
                    const aValue = a.children[columnIndex].innerText.trim();
                    const bValue = b.children[columnIndex].innerText.trim();

                    // Compare values based on the sort order
                    if (sortOrder === 'asc') {
                        return aValue.localeCompare(bValue);
                    } else {
                        return bValue.localeCompare(aValue);
                    }
                });

                // Replace the rows in the table with the sorted rows
                const tbody = document.querySelector('tbody');
                while (tbody.firstChild) {
                    tbody.removeChild(tbody.firstChild);
                }
                sortedRows.forEach(row => tbody.appendChild(row));
            });
        });
    }
};

// Initialize the tableSort module
tableSort.init();
