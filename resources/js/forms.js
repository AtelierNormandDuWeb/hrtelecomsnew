export function initForms() {
    const contactForm = document.querySelector('#contact-form');
    
    /* Validation du formulaire de contact */
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Simuler l'envoi du formulaire
            const submitButton = this.querySelector('button[type="submit"]');
            if (submitButton) {
                const originalText = submitButton.textContent;
                
                submitButton.disabled = true;
                submitButton.textContent = 'Envoi en cours...';
                
                setTimeout(() => {
                    alert('Votre message a été envoyé avec succès ! Nous vous contacterons dans les plus brefs délais.');
                    contactForm.reset();
                    submitButton.disabled = false;
                    submitButton.textContent = originalText;
                }, 1500);
            }
        });
    }
}