import.meta.glob(['../images/**']);
import './bootstrap';
import  Alpine from 'alpinejs'
import 'flowbite'
import Sidebar from './modules/sidebar.js'
import domContentLoaded from "./modules/dom-content-loaded.js";

domContentLoaded();
Sidebar();
window.Alpine = Alpine
Alpine.start();


