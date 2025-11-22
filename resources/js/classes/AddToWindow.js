

export default class AddToWindow {

    #elements = {}
    constructor(elements) {
      this.#elements = elements
    }

    add(){
        for(const element in this.#elements){
            window[element] = this.#elements[element]
        }
    }
}
