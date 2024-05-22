const formOpenBtn = document.querySelector("#form_open"),
    home = document.querySelector(".home"),
    loginForm = document.querySelector(".login_form_container"),
    formCloseBtn = document.querySelector(".form_close"),
    signupBtn = document.querySelector("#signup"),
    loginBtn = document.querySelector("#login"),
    pwShowHide = document.querySelectorAll(".pw_hide");

formOpenBtn.addEventListener("click", () => home.classList.add("show"));
formCloseBtn.addEventListener("click", () => home.classList.remove("show"));

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

signupBtn.addEventListener("click", (e) =>{
    e.preventDefault();
    loginForm.classList.add("active");
});

loginBtn.addEventListener("click", (e) =>{
    e.preventDefault();
    loginForm.classList.remove("active");
});

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
