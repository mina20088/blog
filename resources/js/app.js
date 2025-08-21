import './bootstrap';
import  Alpine from 'alpinejs'
import 'flowbite'
import Sidebar from './sidebar.js'
window.addEventListener("DOMContentLoaded", () => {
    document.body.style.visibility = "visible";
});
Sidebar();


window.Alpine = Alpine
Alpine.start();


