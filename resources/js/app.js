import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();



// document.addEventListener('DOMContentLoaded', () => {
//     const toggle = document.getElementById('theme-toggle');
//     toggle.addEventListener('click', () => {
//         document.documentElement.classList.toggle('dark');
//     });
// });

// document.addEventListener('DOMContentLoaded', () => {
//     const toggleButton = document.getElementById('theme-toggle');
//     const toggleCircle = document.getElementById('toggle-circle');

//     // Load preference
//     if(localStorage.getItem('theme') === 'dark'){
//         document.documentElement.classList.add('dark');
//         toggleCircle.classList.add('translate-x-6');
//     }

//     toggleButton.addEventListener('click', () => {
//         document.documentElement.classList.toggle('dark');
//         const isDark = document.documentElement.classList.contains('dark');

//         // Animate circle
//         toggleCircle.classList.toggle('translate-x-6', isDark);

//         // Save preference
//         localStorage.setItem('theme', isDark ? 'dark' : 'light');
//     });
// });


document.addEventListener('DOMContentLoaded', () => {
    const toggleButton = document.getElementById('theme-toggle');
    const toggleCircle = document.getElementById('toggle-circle');

    // Load preference
    if(localStorage.getItem('theme') === 'dark'){
        document.documentElement.classList.add('dark');
        toggleCircle.classList.add('translate-x-6');
    }

    toggleButton.addEventListener('click', () => {
        document.documentElement.classList.toggle('dark');
        const isDark = document.documentElement.classList.contains('dark');

        toggleCircle.classList.toggle('translate-x-6', isDark);

        localStorage.setItem('theme', isDark ? 'dark' : 'light');
    });
});

