// Selección de elementos del DOM
const body = document.querySelector("body");
const modeToggle = document.querySelector(".mode-toggle");
const nav = document.querySelector('nav');
const sidebarToggle = document.querySelector('.sidebar-toggle');
const closeIcon = document.querySelector(".close-icon");
const navLinks = document.querySelectorAll('.nav-links a');
const starDate = document.querySelector('#calendar_start_date');
const endDate = document.querySelector('#calendar_end_date');
const calendarTable = document.querySelector('#calendar_table tbody');
const usersTable = document.querySelector('#users_table tbody');
const updateCancelButton = document.querySelector('.update_cancel_button');
const deleteCancelButton = document.querySelector('.delete_cancel_button');
const modalUpdate = document.querySelector('.modal_update_form');
const modalDelete = document.querySelector('.modal_delete_form');
const hour = document.querySelectorAll('#update_hour')[0];
const date = document.querySelector('#update_date');

// Recuperar modo y estado del menú lateral de localStorage
let getMode = localStorage.getItem("mode");
if(getMode && getMode ==="dark"){
    body.classList.toggle("dark");
}

let getStatus = localStorage.getItem("status");
if(getStatus && getStatus ==="close"){
    nav.classList.toggle("close");
}

let clickedIndex = localStorage.getItem("clickedIndex");
if (clickedIndex !== null) {
    navLinks[clickedIndex].classList.add("selected");
}

// Alternar modo oscuro
modeToggle.addEventListener("click", () =>{
    body.classList.toggle("dark");
    if(body.classList.contains("dark")){
        localStorage.setItem("mode", "dark");
    }else{
        localStorage.setItem("mode", "light");
    }
});

// Alternar estado del menú lateral
sidebarToggle.addEventListener("click", () => {
    nav.classList.toggle("close");
    if(nav.classList.contains("close")){
        localStorage.setItem("status", "close");
        body.classList.add('nav-close');
    }else{
        localStorage.setItem("status", "open");
        body.classList.remove('nav-close');
    }
})

// Icono para cerrar el menú lateral
closeIcon.addEventListener('click', () => {
    nav.classList.toggle('close');
    if (nav.classList.contains('close')) {
        localStorage.setItem("status", "close");
        body.classList.add('nav-close');
    } else {
        localStorage.setItem("status", "open");
        body.classList.remove('nav-close');
    }
});

// Manejo de selección de enlaces de navegación
navLinks.forEach((navLink) =>{
    navLink.addEventListener('click', (event) =>{
        navLinks.forEach((link) =>{});
        if (nav.classList.contains('close') && window.innerWidth <= 560) {
            localStorage.setItem("status", "open");
            body.classList.remove('nav-close');
        }
    });
});

navLinks.forEach((navLink) => {
    navLink.addEventListener('click', function(event) {
        // Remover la clase 'clicked' de todos los enlaces
        navLinks.forEach(link => link.classList.remove("selected"));

        // Agregar la clase 'clicked' solo al enlace que se hizo clic
        navLink.classList.add("selected");

        // Guardar el índice del enlace clicado en el almacenamiento local
        let clickedIndex = Array.from(navLinks).indexOf(navLink);
        localStorage.setItem("clickedIndex", clickedIndex);
    });
});

// Función para obtener y llenar la tabla de calendario
if(starDate && endDate){
    function fetchAndPopulateTable() {
        let selectStartDate = starDate.value;
        let selectEndDate = endDate.value;
    
        fetch(urlBase+'/calendario/reservacion/' + selectStartDate + '/' + selectEndDate)
            .then(response => response.json())
            .then(data => {
                // Limpiar las filas anteriores
                calendarTable.innerHTML = '';
    
                // Iterar sobre las opciones del JSON y agregarlas a la tabla
                data.forEach(item => {
                    const row = calendarTable.insertRow();
                    row.insertCell(0).textContent = item.customer_name;
                    row.insertCell(1).textContent = item.email;
                    row.insertCell(2).textContent = item.phone_number;
                    row.insertCell(3).textContent = item.address;
                    row.insertCell(4).textContent = item.product;
                    row.insertCell(5).textContent = item.hour;
                    row.insertCell(6).textContent = item.date;
    
                    const editCell = row.insertCell(7);
                    const editLink = document.createElement('a');
                    editLink.href = "";
                    editLink.textContent = 'Editar';
    
                    editLink.addEventListener('click', function(event) {
                        event.preventDefault();
                        body.classList.add("modal");
                        modalUpdate.classList.add("active");
    
                        fetch(urlBase + '/calendario/cliente/' + item.id)
                                .then(response => response.json())
                                .then(userData => {
                                    openModal(userData);
                                })
                                .catch(error => console.error('Error:', error));
                    });
                    editCell.appendChild(editLink);
    
                    const deleteCell = row.insertCell(8);
                    const deleteLink = document.createElement('a');
                    deleteLink.href = "";
                    deleteLink.textContent = 'Borrar';
    
                    deleteLink.addEventListener('click', function(event) {
                        event.preventDefault();
                        body.classList.add("modal");
                        modalDelete.classList.add("active");
    
                        fetch(urlBase + '/calendario/cliente/' + item.id)
                                .then(response => response.json())
                                .then(userData => {
                                    openModalDelete(userData);
                                })
                                .catch(error => console.error('Error:', error));
                    });
    
                    deleteCell.appendChild(deleteLink);
                });
            })
            .catch(error => console.error('Error:', error));
    }
}


window.addEventListener('load', fetchAndPopulateTable);

if(starDate){
    starDate.addEventListener('change', fetchAndPopulateTable);
}
if(endDate){
    endDate.addEventListener('change', fetchAndPopulateTable);
}



// Función para obtener y llenar la tabla de calendario
function UsersTable() {
    fetch(urlBase+'/usuarios/usuarios')
        .then(response => response.json())
        .then(data => {
            // Limpiar las filas anteriores
            usersTable.innerHTML = '';

            // Iterar sobre las opciones del JSON y agregarlas a la tabla
            data.forEach(item => {
                const row = usersTable.insertRow();
                row.insertCell(0).textContent = item.user_name;
                row.insertCell(1).textContent = item.role;
                row.insertCell(2).textContent = item.email;
                row.insertCell(3).textContent = item.phone_number;
                row.insertCell(4).textContent = item.address;
                row.insertCell(5).textContent = item.product;
                row.insertCell(6).textContent = item.active;

                const editCell = row.insertCell(7);
                const editLink = document.createElement('a');
                editLink.href = "";
                editLink.textContent = 'Editar';

                editLink.addEventListener('click', function(event) {
                    event.preventDefault();
                    body.classList.add("modal");
                    modalUpdate.classList.add("active");

                    fetch(urlBase + '/usuarios/usuario/' + item.id)
                            .then(response => response.json())
                            .then(userData => {
                                usersUpdateModal(userData);
                            })
                            .catch(error => console.error('Error:', error));
                });
                editCell.appendChild(editLink);

                const deleteCell = row.insertCell(8);
                const deleteLink = document.createElement('a');
                deleteLink.href = "";
                deleteLink.textContent = 'Borrar';

                deleteLink.addEventListener('click', function(event) {
                    event.preventDefault();
                    body.classList.add("modal");
                    modalDelete.classList.add("active");

                    fetch(urlBase + '/usuarios/usuario/' + item.id)
                            .then(response => response.json())
                            .then(userData => {
                                usersDeleteModal(userData);
                            })
                            .catch(error => console.error('Error:', error));
                });

                deleteCell.appendChild(deleteLink);
            });
        })
        .catch(error => console.error('Error:', error));
}

window.addEventListener('load', UsersTable);


updateCancelButton.addEventListener("click", () => {
    body.classList.remove("modal");
    modalUpdate.classList.remove("active");
});

deleteCancelButton.addEventListener("click", () => {
    body.classList.remove("modal");
    modalDelete.classList.remove("active");
});


function openModal(user) {
    document.querySelector('#update_id').value = user[0].id || '';
    document.querySelector('#update_first_name').value = user[0].first_name || '';
    document.querySelector('#update_last_name').value = user[0].last_name || '';
    document.querySelector('#update_email').value = user[0].email || '';
    document.querySelector('#update_phone_number').value = user[0].phone_number || '';
    document.querySelector('#update_address').value = user[0].address || '';
    document.querySelector('#update_product').value = user[0].product || '';
    document.querySelector('#update_product_quantity').value = user[0].product_quantity || '';
    document.querySelector('#update_date').value = user[0].date || '';

    hour.innerHTML = '';
    const optionElement = document.createElement('option');
    optionElement.textContent = user[0].hour || '';
    hour.appendChild(optionElement);

    fetch(urlBase+'/calendario/horas/'+user[0].date)
    .then(response => response.json()) // Cambiar a response.json()
    .then(data => {

        if (data.length === 0 && user[0].hour) {
            const optionElement = document.createElement('option');
            optionElement.textContent = 'Horario no disponible';
            optionElement.value = '';
            optionElement.disabled = true;
            hour.appendChild(optionElement);
        } else {
            // Iterar sobre las opciones del JSON y agregarlas al select
            data.forEach(option => {
                const optionElement = document.createElement('option');
                optionElement.textContent = option;
                optionElement.value = option;
                hour.appendChild(optionElement);
            });
        }
    })
    .catch(error => console.error('Error:', error));
}

function openModalDelete(user) {
    document.querySelector('#delete_id').value = user[0].id || '';
    document.querySelector('#delete_first_name').innerText = user[0].first_name || '';
    document.querySelector('#delete_last_name').innerText = user[0].last_name || '';
    document.querySelector('#delete_email').innerText = user[0].email || '';
    document.querySelector('#delete_phone_number').innerText = user[0].phone_number || '';
    document.querySelector('#delete_address').innerText = user[0].address || '';
    document.querySelector('#delete_product').innerText = user[0].product || '';
    document.querySelector('#delete_product_quantity').innerText = user[0].product_quantity || '';
    document.querySelector('#delete_date').innerText = user[0].date || '';
    document.querySelector('#delete_hour').innerText = user[0].hour || '';
}

if(date){



    date.addEventListener('change', (event) => {
        let selectedDate = event.target.value;
        fetch(urlBase+'/calendario/horas/' + selectedDate)
            .then(response => response.json()) // Cambiar a response.json()
            .then(data => {
                hour.innerHTML = '';
                
                if (data.length === 0) {
                    const optionElement = document.createElement('option');
                    optionElement.textContent = 'Horario no disponible';
                    optionElement.value = '';
                    optionElement.disabled = true;
                    hour.appendChild(optionElement);
                } else {
                    // Iterar sobre las opciones del JSON y agregarlas al select
                    data.forEach(option => {
                        const optionElement = document.createElement('option');
                        optionElement.textContent = option;
                        optionElement.value = option;
                        hour.appendChild(optionElement);
                    });
                }
            })
            .catch(error => console.error('Error:', error));
    });
}
function usersUpdateModal(user) {
    document.querySelector('#update_id').value = user[0].id || '';
    document.querySelector('#update_first_name').value = user[0].first_name || '';
    document.querySelector('#update_last_name').value = user[0].last_name || '';
    document.querySelector('#update_email').value = user[0].email || '';
    document.querySelector('#update_phone_number').value = user[0].phone_number || '';
    document.querySelector('#update_role').value = user[0].role || '';
    document.querySelector('#update_active').value = user[0].active || '';
    document.querySelector('#update_address').value = user[0].address || '';
}

function usersDeleteModal(user) {
    document.querySelector('#delete_id').value = user[0].id || '';
    document.querySelector('#delete_first_name').innerText = user[0].first_name || '';
    document.querySelector('#delete_last_name').innerText = user[0].last_name || '';
    document.querySelector('#delete_email').innerText = user[0].email || '';
    document.querySelector('#delete_phone_number').innerText = user[0].phone_number || '';
    document.querySelector('#delete_address').innerText = user[0].address || '';
    document.querySelector('#delete_role').innerText = user[0].role || '';
    document.querySelector('#delete_active').innerText = user[0].active || '';
}