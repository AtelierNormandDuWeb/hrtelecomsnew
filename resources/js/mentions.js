document.addEventListener('DOMContentLoaded', function() {
    const sections = document.querySelectorAll('.mentions-section');
    
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
});