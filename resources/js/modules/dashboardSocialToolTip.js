import TooltipClass from "../classes/TooltipClass.js";
import {Tooltip} from "flowbite";

/**
 * @return Tooltip | undefined
 */


export default function dashboardSocialToolTip() {

    const targetElement  = document.getElementById('social-tool-tip')

    const triggerElement = document.getElementById('social');

    const dashboardSocialToolTip = new TooltipClass(targetElement, triggerElement,'bottom', 'hover');

    console.log(targetElement)

    const init = dashboardSocialToolTip.init('social-tool-tip')
    window.addEventListener('loadstart', function() {
       init.toggle()
    })
    return init


}


