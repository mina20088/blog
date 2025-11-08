import './bootstrap';
import  Alpine from 'alpinejs'
import 'flowbite'
import Sidebar from './sidebar.js'
import domContentLoaded from "./dom-content-loaded.js";

domContentLoaded();
Sidebar();
window.Alpine = Alpine
Alpine.start();


