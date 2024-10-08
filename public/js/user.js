const formOpenBtn = document.querySelector("#form_open"),
    page = document.querySelector(".page"),
    loginForm = document.querySelector(".login_form_container"),
    formCloseBtn = document.querySelector(".form_close"),
    signupBtn = document.querySelector("#signup"),
    loginBtn = document.querySelector("#login"),
    pwShowHide = document.querySelectorAll(".pw_hide"),
    date = document.querySelector('#reservation_date'),
    hour = document.querySelectorAll('#reservation_hour')[0];

formOpenBtn.addEventListener("click", () => {
    page.classList.add("show");
    document.body.style.overflow = 'hidden'; // Desactivar el scroll
});

formCloseBtn.addEventListener("click", () => {
    page.classList.remove("show");
    loginForm.classList.remove("active");
    document.body.style.overflow = 'auto'; // Activar el scroll
});

pwShowHide.forEach((icon) => {
    icon.addEventListener("click", () =>{
        let getPwInput = icon.parentElement.querySelector("input");

        if(getPwInput.type === "password"){
            getPwInput.type = "text";
            icon.classList.replace("bx-show", "bx-hide");
        } else{
            getPwInput.type = "password";
            icon.classList.replace("bx-hide", "bx-show");
        }
    });
});

// signupBtn.addEventListener("click", (e) =>{
//     e.preventDefault();
//     loginForm.classList.add("active");
// });

// loginBtn.addEventListener("click", (e) =>{
//     e.preventDefault();
//     loginForm.classList.remove("active");
// });

// Agrega un event listener a todos los enlaces de la navegación
document.querySelectorAll('.nav_link').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();

        const target = document.querySelector(this.getAttribute('href'));
        target.scrollIntoView({
            behavior: 'smooth' // Desplazamiento suave
        });
    });
});

date.addEventListener('change', (event) => {
    let selectedDate = event.target.value;
    fetch(urlBase+'/inicio/horas/' + selectedDate)
        .then(response => response.json()) // Cambiar a response.json()
        .then(data => {
            // Limpiar las opciones anteriores
            hour.innerHTML = '';
            
            // Iterar sobre las opciones del JSON y agregarlas al select
            data.forEach(option => {
                const optionElement = document.createElement('option');
                optionElement.textContent = option;
                hour.appendChild(optionElement);
            });
        })
        .catch(error => console.error('Error:', error));
});