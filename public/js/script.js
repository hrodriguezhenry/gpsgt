document.addEventListener('DOMContentLoaded', () => {
    const startDateInput = document.getElementById('startDate');
    const endDateInput = document.getElementById('endDate');
    const dataTableBody = document.getElementById('dataTable').getElementsByTagName('tbody')[0];

    // Función para obtener la fecha actual en formato YYYY-MM-DD
    const getCurrentDate = () => {
        const today = new Date();
        return today.toLocaleDateString('es-GT', {
            year: 'numeric',
            month: '2-digit',
            day: '2-digit',
        }).split('/').reverse().join('-'); // Formato YYYY-MM-DD
    };

    // Función para establecer fechas iniciales por defecto
    const setDefaultDates = () => {
        const today = getCurrentDate();
        startDateInput.value = today;
        endDateInput.value = today;
    };

    // Función para validar que la fecha inicial no sea mayor que la final y viceversa
    const validateDates = () => {
        if (startDateInput.value > endDateInput.value) {
            endDateInput.value = startDateInput.value;
        } else if (endDateInput.value < startDateInput.value) {
            startDateInput.value = endDateInput.value;
        }
    };

    // Función para realizar la petición fetch y actualizar la tabla
    const updateTable = (startDate, endDate) => {
        fetch('http://localhost/gpsgt/calendariob5/reservacion', {
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

    // Función para manejar el cambio de fechas y actualizar la tabla
    const handleDateChange = () => {
        validateDates();
        const startDate = startDateInput.value;
        const endDate = endDateInput.value;
        updateTable(startDate, endDate);
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
