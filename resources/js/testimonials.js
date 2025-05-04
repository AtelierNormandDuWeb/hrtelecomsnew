import { addClass, removeClass } from './utils.js';

export function initTestimonials() {
    const testimonialSlides = document.querySelectorAll('.testimonial-slide');
    const prevTestimonial = document.querySelector('#prev-testimonial');
    const nextTestimonial = document.querySelector('#next-testimonial');
    const testimonialDots = document.querySelectorAll('.dot');
    
    let currentSlide = 0;
    
    function showSlide(n) {
        if (!testimonialSlides || testimonialSlides.length === 0) return;
        
        // Masquer toutes les slides
        testimonialSlides.forEach(slide => removeClass(slide, 'active'));
        if (testimonialDots && testimonialDots.length > 0) {
            testimonialDots.forEach(dot => removeClass(dot, 'active'));
        }
        
        // Afficher la slide demandée
        currentSlide = (n + testimonialSlides.length) % testimonialSlides.length;
        addClass(testimonialSlides[currentSlide], 'active');
        
        if (testimonialDots && testimonialDots.length > currentSlide) {
            addClass(testimonialDots[currentSlide], 'active');
        }
    }
    
    if (prevTestimonial) {
        prevTestimonial.addEventListener('click', () => {
            showSlide(currentSlide - 1);
        });
    }
    
    if (nextTestimonial) {
        nextTestimonial.addEventListener('click', () => {
            showSlide(currentSlide + 1);
        });
    }
    
    if (testimonialDots && testimonialDots.length > 0) {
        testimonialDots.forEach((dot, index) => {
            dot.addEventListener('click', () => {
                showSlide(index);
            });
        });
    }
    
    // Changer de slide automatiquement toutes les 5 secondes
    if (testimonialSlides && testimonialSlides.length > 0) {
        // Initialiser avec la première slide
        showSlide(0);
        
        setInterval(() => {
            showSlide(currentSlide + 1);
        }, 5000);
    }
}