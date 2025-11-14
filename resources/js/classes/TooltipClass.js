
/**
 * @typedef {import('flowbite').TooltipOptions}  TooltipOptions
 * @typedef {import('flowbite').InstanceOptions}  InstanceOptions
 * */

import {Tooltip} from 'flowbite'

export default class TooltipClass {

    /**
     * @type {HTMLElement} #targetElement
     * */
    #targetElement

    /**
     * @type {HTMLElement} #triggerElement*/
    #triggerElement

    /** @type {string} #placement*/
    #placement

    /**
     * @type {string} #triggerType*/
    #triggerType

    /**
     * @constructor
     * @param {HTMLElement} target
     * @param {HTMLElement} trigger
     * @param {string} placement
     * @param {string} triggerType
     * */
    constructor(target , trigger, placement, triggerType)
    {
        this.#targetElement = target;
        this.#triggerElement = trigger;
        this.#placement = placement;
        this.#triggerType = triggerType;
    }

    /**
     * @return  TooltipOptions
     * */
    setOptions()
    {
        return {
            placement: this.#placement ?? 'top',
            triggerType: this.#triggerType ?? 'hover',
        }
    }

    /**
     * @param {String} targetElID
     * @param {Boolean} override
     * @return InstanceOptions | undefined
     * **/
    setInstanceOptions(targetElID, override)
    {
        return {
            id: targetElID,
            override: override
        }
    }

    /**
     * @param {String} targetElID
     * @param {Boolean} override
     *
     * */
    init(targetElID, override = true)
    {
        return new Tooltip(this.#targetElement, this.#triggerElement, this.setOptions(), this.setInstanceOptions(targetElID, override) )
    }

}
