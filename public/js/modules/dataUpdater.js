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
        return response.text(); // Obtener el HTML como texto
    })
    .then(data => {
        dataTableBody.innerHTML = data; // Actualizar la tabla con el HTML recibido
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
                // console.log("ID del cliente: " + this.value);
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
