import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// Set initial theme based on localStorage or system preference
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

// Toggle theme function
function toggleTheme() {
    if (localStorage.dark == 1) {
        localStorage.dark = 0;
        document.documentElement.classList.remove('dark');
    } else {
        localStorage.dark = 1;
        document.documentElement.classList.add('dark');
    }

    // Sync the state of both switches
    const mainToggle = document.getElementById('theme-toggle');
    const responsiveToggle = document.getElementById('theme-toggle-responsive');
    if (mainToggle) mainToggle.checked = localStorage.dark == 1;
    if (responsiveToggle) responsiveToggle.checked = localStorage.dark == 1;
}

// Set the initial theme when the page loads
setInitialTheme();

// Add event listeners to both switches
document.getElementById('theme-toggle').addEventListener('change', toggleTheme);
const responsiveToggle = document.getElementById('theme-toggle-responsive');
if (responsiveToggle) responsiveToggle.addEventListener('change', toggleTheme);