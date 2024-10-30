// Selecciona todos los botones de votar
const votarButtons = document.querySelectorAll(".votar");

votarButtons.forEach((button) => {
    button.addEventListener("click", () => {
        const disfrazId = button.getAttribute("data-id"); // Asegúrate de que el botón tiene un atributo data-id
        fetch("votar.php", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ disfrazId: disfrazId })
        })
        .then(response => response.json())
        .then(data => alert(data.message))
        .catch(error => console.error("Error:", error));
    });
});

// Lógica para el formulario de registro
const registroForm = document.querySelector("#registro form");
registroForm?.addEventListener("submit", (event) => {
    event.preventDefault();
    // Validaciones o acciones para el formulario de registro
    alert("Registro completado.");
    // Puedes agregar aquí una llamada AJAX para enviar los datos al servidor.
});

// Lógica para el formulario de inicio de sesión
const loginForm = document.querySelector("#login form");
loginForm?.addEventListener("submit", (event) => {
    event.preventDefault();
    // Validaciones o acciones para el formulario de inicio de sesión
    alert("Inicio de sesión exitoso.");
    // Puedes agregar aquí una llamada AJAX para enviar los datos al servidor.
});

// Lógica para el formulario de administración
const adminForm = document.querySelector("#admin form");
adminForm?.addEventListener("submit", (event) => {
    event.preventDefault();
    // Validaciones o acciones para el formulario de administración
    alert("Disfraz agregado al concurso.");
    // Puedes agregar aquí una llamada AJAX para enviar los datos al servidor.
});
