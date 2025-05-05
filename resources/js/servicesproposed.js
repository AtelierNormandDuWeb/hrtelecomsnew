document.addEventListener('DOMContentLoaded', function() {
    // Initialisation d'AOS
    AOS.init({
        duration: 800,
        easing: 'ease-out',
        once: false
    });
    
    // Animation des liens du menu
    const navLinks = document.querySelectorAll('nav a');
    navLinks.forEach(link => {
        link.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-3px)';
        });
        link.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });
    
    // Animation au survol des cartes (en plus des animations AOS)
    const cards = document.querySelectorAll('.our-service-card');
    cards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            const icon = this.querySelector('.our-service-icon');
            icon.style.transform = 'rotate(360deg)';
        });
        
        card.addEventListener('mouseleave', function() {
            const icon = this.querySelector('.our-service-icon');
            icon.style.transform = 'rotate(0)';
        });
    });
    
    // Animation du bouton CTA
    const ctaButton = document.querySelector('.our-cta-section .our-btn');
    ctaButton.addEventListener('mouseenter', function() {
        this.classList.add('pulse');
    });
    
    ctaButton.addEventListener('mouseleave', function() {
        this.classList.remove('pulse');
    });
});