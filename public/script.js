// Esperar a que el DOM esté completamente cargado
document.addEventListener("DOMContentLoaded", () => {
    const signupbtnlink = document.querySelector(".Signupbtn-link");
    const signinbtnlink = document.querySelector(".Signipbtn-link");
    const wrapper = document.querySelector('.wrapper');

    if (signupbtnlink) {
        signupbtnlink.addEventListener("click", () => {
            wrapper.classList.toggle("active");
        });
    }

    if (signinbtnlink) {
        signinbtnlink.addEventListener("click", () => {
            wrapper.classList.toggle("active");
        });
    }
});
