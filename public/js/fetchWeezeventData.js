// fetchWeezeventData.js

export function fetchWeezeventData() {
    if (document.body.classList.contains('weezevent')) {
        fetch("/back/api/weezevent/customers") // Sending a GET request to the Symfony route to fetch data
            .then(response => response.json()) // Convert the response to JSON
            .then(data => {
                // Iterate through participant data and display them in the table
                const customerTableBody = document.querySelector('.weezevent-customer-table-body'); // Select the table
                data.customerList.forEach(customer => {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td>${customer.id_participant}</td>
                        <td>${customer.owner.first_name}</td>
                        <td>${customer.owner.last_name}</td>
                        <td><a href="mailto:${customer.owner.email}">${customer.owner.email}</a></td> 
                        <td>${data.ticketList[customer.id_ticket]}</td>
                    `;
                    customerTableBody.appendChild(row);
                });
            })
            .catch(error => {
                console.error('Error fetching data:', error);
            });
    }
}
