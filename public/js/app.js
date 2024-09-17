import { getCurrentDate, validateDates } from './modules/dateHelper.js';
import { updateReservationTable } from './modules/dataUpdater.js';

document.addEventListener('DOMContentLoaded', () => {
    const startDateInput = document.getElementById('startDate');
    const endDateInput = document.getElementById('endDate');
    const dataTableBody = document.getElementById('dataTable').getElementsByTagName('tbody')[0];

    // Función para establecer fechas iniciales por defecto
    const setDefaultDates = () => {
        const today = getCurrentDate();
        startDateInput.value = today;
        endDateInput.value = today;
    };

    // Función para manejar el cambio de fechas y actualizar la tabla
    const handleDateChange = () => {
        const validDate = validateDates(startDateInput.value, endDateInput.value);
        if (validDate) {
            endDateInput.value = validDate;
        }
        updateReservationTable(urlBase, startDateInput.value, endDateInput.value, dataTableBody);
    };

    // Inicializar el formulario con fechas por defecto y cargar datos
    const init = () => {
        setDefaultDates();
        handleDateChange(); // Cargar datos cuando la página se carga por primera vez
    };

    // Asignar eventos para cambios en las fechas
    startDateInput.addEventListener('change', handleDateChange);
    endDateInput.addEventListener('change', handleDateChange);

    // Iniciar el proceso
    init();
});
