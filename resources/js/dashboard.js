import './bootstrap';
import Alpine from 'alpinejs'
import persist from '@alpinejs/persist'
import 'flowbite'
import domContentLoaded from "./modules/dom-content-loaded.js";
import {CountryCityMap, CountryCityUtils} from './modules/countryCityMap.js'
import AddToWindow from "./classes/AddToWindow.js";
import intlTelInput from 'intl-tel-input'
import phoneInputInitializer from "./modules/phoneInputInitializer.js";
import '@fortawesome/fontawesome-free/js/all.js'
import dashboardSocialToolTip from "./modules/dashboardSocialToolTip.js";

const tooltip = dashboardSocialToolTip();
const add  = new AddToWindow({
    CountryCityMap,
    CountryCityUtils ,
    intlTelInput,
    Alpine
})


add.add()

phoneInputInitializer()
domContentLoaded();
Alpine.plugin(persist)
Alpine.start();


