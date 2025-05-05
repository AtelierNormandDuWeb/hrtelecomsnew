document.addEventListener('DOMContentLoaded', function() {
    const sections = document.querySelectorAll('.cookie-confidentialite-section');
    
    function checkScroll() {
        sections.forEach(section => {
            const sectionTop = section.getBoundingClientRect().top;
            const windowHeight = window.innerHeight;
            
            if (sectionTop < windowHeight * 0.85) {
                section.classList.add('animate');
            }
        });
    }
    
    // Animation au chargement initial
    setTimeout(checkScroll, 100);
    
    // Animation au scroll
    window.addEventListener('scroll', checkScroll);
    
    // Fonctionnalité d'accordéon
    const accordionTitles = document.querySelectorAll('.cookie-accordion-title');
    
    accordionTitles.forEach(title => {
        title.addEventListener('click', () => {
            const content = title.nextElementSibling;
            
            // Toggle active class on title
            title.classList.toggle('active');
            
            // Toggle show class on content
            content.classList.toggle('show');
        });
    });
    
    // Pour la démo - les boutons ne font rien pour l'instant
    const cookieButtons = document.querySelectorAll('.cookie-buttons .cookie-btn');
    
    cookieButtons.forEach(button => {
        button.addEventListener('click', () => {
            alert('Préférences de cookies enregistrées !');
        });
    });
});