// Función genérica para hacer solicitudes y manejar errores
const fetchJsonData = async (url, method = 'POST', body = {}) => {
    try {
        const response = await fetch(url, {
            method,
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: new URLSearchParams(body),
        });

        if (!response.ok) {
            throw new Error(`Error: ${response.statusText}`);
        }

        return await response.json();
    } catch (error) {
        console.error('Error:', error);
        throw error;
    }
};

// Función para hacer solicitudes y obtener datos en formato de texto
const fetchTextData = async (url, body = {}) => {
    try {
        const response = await fetch(url, {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: new URLSearchParams(body),
        });

        if (!response.ok) throw new Error(`Error: ${response.statusText}`);

        return await response.text();
    } catch (error) {
        console.error('Error:', error);
        throw error;
    }
};

// Función para actualizar la lista de horas en el modal
const updateReservationHourModal = async (date, dateChange, hour) => {
    if (date !== dateChange) hour = '';

    try {
        const data = await fetchTextData(`${urlBase}/calendariob5/horas`, { date, hour });
        document.getElementById('upModHour').innerHTML = data;
    } catch (error) {
        console.error('Error al actualizar horas:', error);
    }
};

// Función para actualizar el modal con los datos de la reservación
const updateReservationModal = async (id) => {
    try {
        const data = await fetchJsonData(`${urlBase}/calendariob5/cliente`, 'POST', { id });

        // Actualizar campos del modal
        document.querySelector('#upModFirstName').value = data.first_name || '';
        document.querySelector('#upModLastName').value = data.last_name || '';
        document.querySelector('#upModEmail').value = data.email || '';
        document.querySelector('#upModPhoneNumber').value = data.phone_number || '';
        document.querySelector('#upModAddress').value = data.address || '';
        document.querySelector('#upModProduct').value = data.product || '';
        document.querySelector('#upModProductQuantity').value = data.product_quantity || '';
        document.querySelector('#upModDate').value = data.date || '';

        await updateReservationHourModal(data.date || '', data.date || '', data.hour || '');

        // Escuchar cambios en el campo de fecha
        document.getElementById('upModDate').addEventListener('change', function () {
            updateReservationHourModal(this.value, data.date || '', data.hour || '');
        });
    } catch (error) {
        console.error('Error al actualizar el modal:', error);
    }
};

// Función para asignar eventos a botones de actualización y eliminación
const assignEventListeners = () => {
    document.querySelectorAll('.btn-update-reservation').forEach(button => {
        button.addEventListener('click', () => updateReservationModal(button.value));
    });

    document.querySelectorAll('.btn-delete-reservation').forEach(button => {
        button.addEventListener('click', () => {
            console.log('ID del cliente:', button.value);
            // Añadir lógica para eliminar la reservación
        });
    });
};

// Función para actualizar la tabla de reservaciones
export const updateReservationTable = async (urlBase, startDate, endDate, dataTableBody) => {
    try {
        const data = await fetchTextData(`${urlBase}/calendariob5/reservacion`, { startDate, endDate });
        dataTableBody.innerHTML = data;

        assignEventListeners(); // Asignar eventos a los botones
    } catch (error) {
        console.error('Error al actualizar la tabla de reservaciones:', error);
    }
};