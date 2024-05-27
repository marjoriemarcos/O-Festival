document.addEventListener("DOMContentLoaded", function() {
            // Select all columns with the 'data-sortable' attribute
            const sortableColumns = document.querySelectorAll('[data-sortable]');
            
            sortableColumns.forEach(column => {
                column.addEventListener('click', () => {
                    const sortOrder = column.dataset.order === 'asc' ? 'desc' : 'asc';
                    
                    // Reset attributes of all columns
                    sortableColumns.forEach(col => {
                        col.dataset.order = '';
                    });
                    
                    // Update sorting attribute of clicked column
                    column.dataset.order = sortOrder;
                    
                    // Get index of the clicked column
                    const columnIndex = Array.from(column.parentNode.children).indexOf(column);
                    
                    // Get rows of the table
                    const rows = Array.from(document.querySelectorAll('tbody > tr'));
                    
                    // Sort rows based on the value of the clicked column
                    const sortedRows = rows.sort((a, b) => {
                        const aValue = a.children[columnIndex].innerText.trim();
                        const bValue = b.children[columnIndex].innerText.trim();
                        
                        if (sortOrder === 'asc') {
                            return aValue.localeCompare(bValue);
                        } else {
                            return bValue.localeCompare(aValue);
                        }
                    });
                    
                    // Replace rows in the table with sorted rows
                    const tbody = document.querySelector('tbody');
                    while (tbody.firstChild) {
                        tbody.removeChild(tbody.firstChild);
                    }
                    sortedRows.forEach(row => tbody.appendChild(row));
                });
            });
        });