const body = document.querySelector("body");
const modeToggle = document.querySelector(".mode-toggle");
const nav = document.querySelector('nav');
const sidebarToggle = document.querySelector('.sidebar-toggle');
const closeIcon = document.querySelector(".close-icon");
const navLinks = document.querySelectorAll('.nav-links a');
const starDate = document.querySelector('#calendar_start_date');
const endDate = document.querySelector('#calendar_end_date');
const calendarTable = document.querySelector('#calendar_table tbody');

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

modeToggle.addEventListener("click", () =>{
    body.classList.toggle("dark");
    if(body.classList.contains("dark")){
        localStorage.setItem("mode", "dark");
    }else{
        localStorage.setItem("mode", "light");
    }
});

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

function fetchAndPopulateTable() {
    let selectStartDate = starDate.value;
    let selectEndDate = endDate.value;

    fetch(urlBase+'/calendario/clientes/' + selectStartDate + '/' + selectEndDate)
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
                row.insertCell(5).textContent = item.hour_reservation;
                row.insertCell(6).textContent = item.reservation_date;

                const editCell = row.insertCell(7);
                const editLink = document.createElement('a');
                editLink.href = `http://localhost/gpsgt/calendario`;
                editLink.textContent = 'Editar';
                editLink.addEventListener('click', function(event) {
                    event.preventDefault();
                    alert('Editar usuario con ID: '+ 1);
                });
                editCell.appendChild(editLink);

                const deleteCell = row.insertCell(8);
                const deleteLink = document.createElement('a');
                deleteLink.href = `http://localhost/gpsgt/calendario`;
                deleteLink.textContent = 'Borrar';
                deleteCell.appendChild(deleteLink);
            });
        })
        .catch(error => console.error('Error:', error));
}

window.addEventListener('load', fetchAndPopulateTable);
starDate.addEventListener('change', fetchAndPopulateTable);
endDate.addEventListener('change', fetchAndPopulateTable);