import './bootstrap';
import Alpine from 'alpinejs'
import persist from '@alpinejs/persist'
import 'flowbite'

import domContentLoaded from "./dom-content-loaded.js";
import {CountryCityMap, CountryCityUtils} from './countryCityMap'
import AddToWindow from "./AddToWindow.js";
import intlTelInput from 'intl-tel-input'
import phoneInputInitializer from "./phoneInputInitializer.js";
import '@fortawesome/fontawesome-free/js/all.js'


const add  = new AddToWindow({
    CountryCityMap,
    CountryCityUtils ,
    intlTelInput,
    Alpine
})

add.add()
domContentLoaded();
phoneInputInitializer()
Alpine.plugin(persist)
Alpine.start();

