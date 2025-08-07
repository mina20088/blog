import './bootstrap';
import Alpine from 'alpinejs'
import 'flowbite'
import {Drawer} from 'flowbite'



const sidebar = document.getElementById('logo-sidebar')

const option = {

};

const instanceOption = {
    id: 'logo-sidebar',
    override: false
}

const drawer = new Drawer(sidebar, option, instanceOption);


const toggleButton = document.getElementById('sidebar-toggle-btn')

// Add event delegation to handle clicks on any link within the sidebar
sidebar.addEventListener('click', (event) => {
    // Check if the clicked element is a link (a tag) or inside a li
    if (event.target.tagName === 'A' || event.target.closest('a')) {
        drawer.hide()
        // Reset the toggle button state
        toggleButton.click()
        toggleButton.setAttribute('aria-expanded', 'false')
    }else{
        toggleButton.setAttribute('aria-expanded', 'true')
    }
});




window.Alpine = Alpine
Alpine.start();
