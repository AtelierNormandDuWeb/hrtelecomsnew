export function initAnimations() {
    const animatedText = document.querySelector('.animated-text');
    
    /* Animation du texte */
    if (animatedText) {
        const text = animatedText.getAttribute('data-text');
        if (text) {
            let i = 0;
            animatedText.textContent = '';
            
            function typeWriter() {
                if (i < text.length) {
                    animatedText.textContent += text.charAt(i);
                    i++;
                    setTimeout(typeWriter, 150);
                }
            }
            
            // Démarrer l'animation après un court délai
            setTimeout(typeWriter, 1500);
        }
    }
    
    /* Animation au défilement */
    function animateOnScroll() {
        const elements = document.querySelectorAll('.service-card, .about-content, .solution-content, .section-title');
        
        if (elements && elements.length > 0) {
            elements.forEach(element => {
                const elementPosition = element.getBoundingClientRect().top;
                const screenPosition = window.innerHeight / 1.3;
                
                if (elementPosition < screenPosition) {
                    element.style.opacity = '1';
                    element.style.transform = 'translateY(0)';
                }
            });
        }
    }
    
    // Appliquer les styles d'animation initiale
    const animatedElements = document.querySelectorAll('.service-card, .about-content, .solution-content, .section-title');
    if (animatedElements && animatedElements.length > 0) {
        animatedElements.forEach(element => {
            element.style.opacity = '0';
            element.style.transform = 'translateY(20px)';
            element.style.transition = 'all 0.6s ease';
        });
    }
    
    // Déclencher une fois au chargement
    animateOnScroll();
    
    // Ajouter l'écouteur d'événement pour le défilement
    window.addEventListener('scroll', animateOnScroll);
    
    return { animateOnScroll };
}