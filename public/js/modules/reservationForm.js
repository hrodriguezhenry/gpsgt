import { apiService } from './apiService.js';
import { refreshReservationTable } from './reservationTable.js';

// Función para obtener los datos del formulario
const getFormData = () => ({
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
});

// Lógica del envío del formulario
document.getElementById('updateReservationForm').addEventListener('submit', async function(event) {
    event.preventDefault();

    const body = getFormData();

    try {
        const url = `${urlBase}/calendariob5/actualizar`;
        await apiService.fetchData(url, 'POST', body, 'json');
        // Cierra el modal
        const modal = bootstrap.Modal.getInstance(document.getElementById('updateReservationModal'));
        modal.hide();

        // Refresca la tabla de reservaciones
        refreshReservationTable();
    } catch (error) {
        console.error('Error al enviar el formulario', error);
    }
});
