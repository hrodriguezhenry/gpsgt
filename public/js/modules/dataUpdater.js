const updateReservationModal = (urlBase, id) => {
    fetch(`${urlBase}/calendariob5/cliente`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: new URLSearchParams({
            id: id
        }),
    })
    .then(response => {
        if (!response.ok) {
            throw new Error(`Error: ${response.statusText}`);
        }
        return response.json();
    })
    .then(data => {
        document.querySelector('#upModFirstName').value = data[0].first_name || '';
        document.querySelector('#upModLastName').value = data[0].last_name || '';
        document.querySelector('#upModEmail').value = data[0].email || '';
        document.querySelector('#upModPhoneNumber').value = data[0].phone_number || '';
        document.querySelector('#upModAddress').value = data[0].address || '';
        document.querySelector('#upModProduct').value = data[0].product || '';
        document.querySelector('#upModProductQuantity').value = data[0].product_quantity || '';
        document.querySelector('#upModDate').value = data[0].date || '';
        
    })
    .catch(error => {
        console.error('Error en la solicitud:', error);
    });
};


export const updateReservationTable = (urlBase, startDate, endDate, dataTableBody) => {
    fetch(`${urlBase}/calendariob5/reservacion`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: new URLSearchParams({
            startDate: startDate,
            endDate: endDate,
        }),
    })
    .then(response => {
        if (!response.ok) {
            throw new Error(`Error: ${response.statusText}`);
        }
        return response.text(); // Obtener el HTML como texto
    })
    .then(data => {
        dataTableBody.innerHTML = data;

        document.querySelectorAll('.btn-update-reservation').forEach(button => {
            button.addEventListener('click', function() {
                updateReservationModal(urlBase, this.value);
            });
        });

        document.querySelectorAll('.btn-delete-reservation').forEach(button => {
            button.addEventListener('click', function() {
                console.log("ID del cliente: " + this.value);
            });
        });

    })
    .catch(error => {
        console.error('Error en la solicitud:', error);
    });
};