const body = document.querySelector("body");
const modeToggle = document.querySelector(".mode-toggle");
const nav = document.querySelector('nav');
const sidebarToggle = document.querySelector('.sidebar-toggle');
const closeIcon = document.querySelector(".close-icon");
const navLinks = document.querySelectorAll('.nav-links a');

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