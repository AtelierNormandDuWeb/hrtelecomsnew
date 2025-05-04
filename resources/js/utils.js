/* Fonctions utilitaires */
export function toggleClass(element, className) {
    if (element) {
        element.classList.toggle(className);
    }
}

export function addClass(element, className) {
    if (element) {
        element.classList.add(className);
    }
}

export function removeClass(element, className) {
    if (element) {
        element.classList.remove(className);
    }
}