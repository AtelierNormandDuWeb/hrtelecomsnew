import { initNavigation } from './navigation.js';
import { initAccessibility } from './accessibility.js';
import { initTabs } from './tabs.js';
import { initAccordion } from './accordion.js';
import { initTestimonials } from './testimonials.js';
import { initAnimations } from './animations.js';
import { initForms } from './forms.js';

document.addEventListener('DOMContentLoaded', function() {
    // Initialiser tous les modules
    initNavigation();
    initAccessibility();
    initTabs();
    initAccordion();
    initTestimonials();
    initAnimations();
    initForms();
});