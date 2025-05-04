import { toggleClass } from './utils.js';

export function initAccordion() {
    const accordionHeaders = document.querySelectorAll('.accordion-header');
    
    if (accordionHeaders && accordionHeaders.length > 0) {
        accordionHeaders.forEach(header => {
            header.addEventListener('click', () => {
                const accordionItem = header.parentElement;
                if (accordionItem) {
                    toggleClass(accordionItem, 'active');
                }
            });
        });
    }
}