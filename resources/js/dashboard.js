import './bootstrap';
import Alpine from 'alpinejs'
import 'flowbite'
import {Drawer} from 'flowbite'
import {DataTable} from 'simple-datatables'


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
    if (event.target.tagName === 'A' || event.target.closest('li a')) {
        drawer.hide()
        // Reset the toggle button state
        toggleButton.setAttribute('aria-expanded', 'false')
    }else{
        toggleButton.setAttribute('aria-expanded', 'true')
    }
});


const dataTable = new DataTable("#pagination-table", {
    paging: true,
    perPage: 5,
    perPageSelect: [5, 10, 15, 20, 25],
    sortable: true,
    classes: {}
});



dataTable.on('datatable.init', (event) => {
    const table = document.querySelector('.datatable-table');
    table.classList.add('bg-gray-200');
})

dataTable.init()






window.Alpine = Alpine
Alpine.start();
