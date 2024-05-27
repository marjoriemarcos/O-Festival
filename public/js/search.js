document.addEventListener('DOMContentLoaded', function() {
    const searchButton = document.getElementById('searchButton');
    const resetButton = document.getElementById('resetButton');
    const searchInput = document.querySelector('.search-input');
    const searchableTable = document.querySelector('.searchable-table');
    const noResultsMessage = document.getElementById('noResultsMessage');
    const tableWrapper = document.getElementById('tableWrapper');

    searchButton.addEventListener('click', function() {
        const searchTerm = searchInput.value.trim().toLowerCase();
        const rows = searchableTable.querySelectorAll('tbody tr');
        let hasResults = false;

        rows.forEach(function(row) {
            const cells = row.querySelectorAll('td');
            let found = false;
            cells.forEach(function(cell) {
                const text = cell.textContent.trim().toLowerCase();
                if (text.includes(searchTerm)) {
                    found = true;
                    hasResults = true;
                }
            });
            if (found) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });

        if (!hasResults) {
            noResultsMessage.style.display = 'block';
            tableWrapper.style.display = 'none';
        } else {
            noResultsMessage.style.display = 'none';
            tableWrapper.style.display = '';
        }

        resetButton.style.display = 'block';
    });

    resetButton.addEventListener('click', function() {
        searchInput.value = '';
        const rows = searchableTable.querySelectorAll('tbody tr');
        rows.forEach(function(row) {
            row.style.display = '';
        });
        noResultsMessage.style.display = 'none';
        tableWrapper.style.display = '';
        resetButton.style.display = 'none';
    });
});
