import TooltipClass from "../classes/TooltipClass.js";
import {Tooltip} from "flowbite";

/**
 * @return Tooltip | undefined
 */


export default function dashboardSocialToolTip() {

    const social = document.querySelectorAll('.social');

    const tool = document.querySelectorAll('.tool');


    social.forEach((item, key)=> {

       if(tool[key] !== undefined && item.id !== undefined){

           const targetElement  = document.getElementById(tool[key].id)

           const triggerElement  = document.getElementById(item.id);

           const dashboardSocialToolTip = new TooltipClass(targetElement, triggerElement,'bottom', 'hover');

           const init = dashboardSocialToolTip.init(tool[key].id)

           window.addEventListener('loadstart', function() {
               init.toggle()
           })

           return init
       }

    })



}


