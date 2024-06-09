import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// Establece el tema inicial basado en el localStorage o la preferencia del sistema.
function setInitialTheme() {
    if (localStorage.dark == 1 || (!('dark' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        localStorage.dark = 1;
        document.documentElement.classList.add('dark');
        document.getElementById('theme-toggle').checked = true;
        const responsiveToggle = document.getElementById('theme-toggle-responsive');
        if (responsiveToggle) responsiveToggle.checked = true;
    } else {
        localStorage.dark = 0;
        document.documentElement.classList.remove('dark');
        document.getElementById('theme-toggle').checked = false;
        const responsiveToggle = document.getElementById('theme-toggle-responsive');
        if (responsiveToggle) responsiveToggle.checked = false;
    }
}

// Función para cambiar el tema según el que esté seleccionado y actualizar los botones.
function toggleTheme() {
    if (localStorage.dark == 1) {
        localStorage.dark = 0;
        document.documentElement.classList.remove('dark');
    } else {
        localStorage.dark = 1;
        document.documentElement.classList.add('dark');
    }

    // Actualiza el estado de ambos botones (responsive y no responsive).
    const mainToggle = document.getElementById('theme-toggle');
    const responsiveToggle = document.getElementById('theme-toggle-responsive');
    if (mainToggle) mainToggle.checked = localStorage.dark == 1;
    if (responsiveToggle) responsiveToggle.checked = localStorage.dark == 1;
}

// Se llama a la función para establecer el tema inicial cuando la página se carga.
setInitialTheme();

// Se añaden event listeners al botón responsive y al no responsive.
document.getElementById('theme-toggle').addEventListener('change', toggleTheme);
const responsiveToggle = document.getElementById('theme-toggle-responsive');
if (responsiveToggle) responsiveToggle.addEventListener('change', toggleTheme);