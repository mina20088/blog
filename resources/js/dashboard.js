import './bootstrap';
import Alpine from 'alpinejs'
import persist from '@alpinejs/persist'
import 'flowbite'
import {Drawer} from 'flowbite'
import {CountryCityMap ,CountryCityUtils} from './countryCityMap'
import intlTelInput from 'intl-tel-input'



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




window.addEventListener("DOMContentLoaded", () => {
    document.body.style.visibility = "visible";
});

window.CountryCityMap = CountryCityMap
window.CountryCityUtils = CountryCityUtils

window.intlTelInput = intlTelInput;

document.addEventListener('DOMContentLoaded', function() {
    const phoneInput = document.querySelector("#phone");

    if (phoneInput) {
        const iti = window.intlTelInput(phoneInput, {
            loadUtils: () => import("intl-tel-input/utils"),
            initialCountry: "eg", // Egypt by default
            separateDialCode: true,
            hiddenInput: (telInputName) => ({
                phone: "phone_full",
                country: "country_code"
            })
        });

        // Store instance globally for form validation
        window.itiInstance = iti;
    }
});



window.Alpine = Alpine
Alpine.plugin(persist)
Alpine.start();

function resetFilters(data) {
    data.resetShow = false
}


