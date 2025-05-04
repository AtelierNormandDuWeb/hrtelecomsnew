import { toggleClass, addClass, removeClass } from './utils.js';

export function initNavigation() {
    const header = document.querySelector('header');
    const navToggle = document.querySelector('.nav-toggle');
    const mainMenu = document.querySelector('#main-menu');
    const backToTop = document.querySelector('.back-to-top');
    
    /* Navigation responsive */
    if (navToggle) {
        navToggle.addEventListener('click', function() {
            toggleClass(mainMenu, 'active');
            // Changer l'icône
            const icon = this.querySelector('i');
            if (icon) {
                if (icon.classList.contains('fa-bars')) {
                    icon.classList.remove('fa-bars');
                    icon.classList.add('fa-times');
                } else {
                    icon.classList.remove('fa-times');
                    icon.classList.add('fa-bars');
                }
            }
        });
    }
    
    /* Header au défilement */
    window.addEventListener('scroll', function() {
        if (window.scrollY > 50) {
            if (header) {
                header.style.padding = '10px 0';
                header.style.boxShadow = '0 2px 10px rgba(0, 0, 0, 0.1)';
            }
        } else {
            if (header) {
                header.style.padding = '';
                header.style.boxShadow = '';
            }
        }
        
        // Afficher/masquer le bouton retour en haut
        if (window.scrollY > 300) {
            if (backToTop) {
                addClass(backToTop, 'visible');
            }
        } else {
            if (backToTop) {
                removeClass(backToTop, 'visible');
            }
        }
    });
    
    /* Retour en haut */
    if (backToTop) {
        backToTop.addEventListener('click', function(e) {
            e.preventDefault();
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }
    
    /* Liens de navigation fluides */
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Fermer le menu mobile si ouvert
            if (mainMenu && mainMenu.classList.contains('active')) {
                removeClass(mainMenu, 'active');
                if (navToggle) {
                    const icon = navToggle.querySelector('i');
                    if (icon) {
                        icon.classList.remove('fa-times');
                        icon.classList.add('fa-bars');
                    }
                }
            }
            
            const targetId = this.getAttribute('href');
            if (targetId === '#') return;
            
            const targetElement = document.querySelector(targetId);
            if (targetElement) {
                window.scrollTo({
                    top: targetElement.offsetTop - 70,
                    behavior: 'smooth'
                });
            }
        });
    });
}