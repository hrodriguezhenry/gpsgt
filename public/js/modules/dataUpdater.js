// Agrega este código para manejar el envío del formulario
document.getElementById('updateReservationForm').addEventListener('submit', async function(event) {
    event.preventDefault(); // Evita el envío por defecto del formulario
    
    // Captura los datos del formulario
    const body = {
        id: document.getElementById('upModReservationId').value,
        first_name: document.getElementById('upModFirstName').value,
        last_name: document.getElementById('upModLastName').value,
        email: document.getElementById('upModEmail').value,
        phone_number: document.getElementById('upModPhoneNumber').value,
        address: document.getElementById('upModAddress').value,
        product_id: document.getElementById('upModProduct').value,
        product_quantity: document.getElementById('upModProductQuantity').value,
        date: document.getElementById('upModDate').value,
        hour_id: document.getElementById('upModHour').value,
    };
    
    try {
        await fetchJsonData(`${urlBase}/calendariob5/actualizar`, 'POST', body);

        // Cierra el modal
        const modal = bootstrap.Modal.getInstance(document.getElementById('updateReservationModal'));
        modal.hide();

        const startDate = document.getElementById('startDate').value;
        const endDate = document.getElementById('endDate').value;
        const dataTableBody = document.getElementById('dataTable').getElementsByTagName('tbody')[0];
        await updateReservationTable(urlBase, startDate, endDate, dataTableBody);
    } catch (error) {
        console.error('Error al actualizar la reservación:', error);
    }
});


// Función genérica para hacer solicitudes y manejar errores
const fetchJsonData = async (url, method = 'POST', body = {}) => {
    console.log(body)
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
const updateReservationProductModal = async (product) => {
    try {
        const data = await fetchTextData(`${urlBase}/calendariob5/producto`, { product });
        document.getElementById('upModProduct').innerHTML = data;
    } catch (error) {
        console.error('Error:', error);
    }
};

// Función para actualizar la lista de horas en el modal
const updateReservationHourModal = async (date, dateChange, hour) => {
    if (date !== dateChange) hour = '';

    try {
        const data = await fetchTextData(`${urlBase}/calendariob5/hora`, { date, hour });
        document.getElementById('upModHour').innerHTML = data;
    } catch (error) {
        console.error('Error:', error);
    }
};

// Función para actualizar el modal con los datos de la reservación
const updateReservationModal = async (id) => {
    try {
        const data = await fetchJsonData(`${urlBase}/calendariob5/cliente`, 'POST', { id });

        // Actualizar campos del modal
        document.getElementById('upModReservationId').value = id;
        document.getElementById('upModFirstName').value = data.first_name || '';
        document.getElementById('upModLastName').value = data.last_name || '';
        document.getElementById('upModEmail').value = data.email || '';
        document.getElementById('upModPhoneNumber').value = data.phone_number || '';
        document.getElementById('upModAddress').value = data.address || '';
        document.getElementById('upModProductQuantity').value = data.product_quantity || '';
        document.getElementById('upModDate').value = data.date || '';

        await updateReservationProductModal(data.product || '');
        await updateReservationHourModal(data.date || '', data.date || '', data.hour || '');

        // Escuchar cambios en el campo de fecha
        document.getElementById('upModDate').addEventListener('change', function () {
            updateReservationHourModal(this.value, data.date || '', data.hour || '');
        });
    } catch (error) {
        console.error('Error:', error);
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
        console.error('Error:', error);
    }
};