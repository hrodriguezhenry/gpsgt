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
        dataTableBody.innerHTML = data; // Actualizar la tabla con el HTML recibido
    })
    .catch(error => {
        console.error('Error en la solicitud:', error);
    });
};
