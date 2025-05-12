import { addClass, removeClass } from './utils.js';

// Assurez-vous que la fonction est exportée correctement avec "export function"
export function initAccessibility() {
    const root = document.documentElement;
    const body = document.querySelector('body');
    const accessibilityToggle = document.querySelector('.accessibility-toggle');
    const accessibilityTools = document.querySelector('.accessibility-tools');
    const themeToggle = document.querySelector('#theme-toggle');
    const dyslexicToggle = document.querySelector('#dyslexic-toggle');
    const colorblindToggle = document.querySelector('#colorblind-toggle');
    const highContrastToggle = document.querySelector('#high-contrast-toggle');
    const zoomInBtn = document.querySelector('#zoom-in');
    const zoomOutBtn = document.querySelector('#zoom-out');
    const zoomResetBtn = document.querySelector('#zoom-reset');
    
    /* Boîte à outils d'accessibilité */
    if (accessibilityToggle) {
        accessibilityToggle.addEventListener('click', function() {
            if (accessibilityTools) {
                accessibilityTools.classList.toggle('active');
            }
        });
    }
    
    /* Mode sombre */
    if (themeToggle) {
        themeToggle.addEventListener('change', function() {
            if (this.checked) {
                document.documentElement.setAttribute('data-theme', 'dark');
            } else {
                document.documentElement.removeAttribute('data-theme');
            }
        });
    }
    
    /* Police dyslexie */
    if (dyslexicToggle) {
        dyslexicToggle.addEventListener('change', function() {
            if (this.checked) {
                addClass(body, 'OpenDyslexic');
            } else {
                removeClass(body, 'OpenDyslexic');
            }
        });
    }
    
    /* Mode daltonien */
    if (colorblindToggle) {
        colorblindToggle.addEventListener('change', function() {
            if (this.checked) {
                document.documentElement.setAttribute('data-colorblind', 'true');
            } else {
                document.documentElement.removeAttribute('data-colorblind');
            }
        });
    }
    
    /* Contraste élevé */
    if (highContrastToggle) {
        highContrastToggle.addEventListener('change', function() {
            if (this.checked) {
                addClass(body, 'high-contrast');
                document.documentElement.style.setProperty('--text-color', '#ffffff');
                document.documentElement.style.setProperty('--background-color', '#000000');
                document.documentElement.style.setProperty('--primary-color', '#0050ff');
                document.documentElement.style.setProperty('--secondary-color', '#00a0ff');
            } else {
                removeClass(body, 'high-contrast');
                document.documentElement.style.setProperty('--text-color', '');
                document.documentElement.style.setProperty('--background-color', '');
                document.documentElement.style.setProperty('--primary-color', '');
                document.documentElement.style.setProperty('--secondary-color', '');
            }
        });
    }
    
    /* Zoom avec limite de 2 incrémentations */
    let currentZoomLevel = 0; // 0 = normal, 1 = premier niveau, 2 = second niveau
    const maxZoomLevel = 2; // Limite maximale de zoom (2 incrémentations)
    let currentZoom = 1; // Facteur de zoom initial
    const zoomIncrement = 0.1; // Valeur d'incrément de zoom
    
    function updateZoom() {
        document.documentElement.style.setProperty('--zoom-level', currentZoom);
    }
    
    if (zoomInBtn) {
        zoomInBtn.addEventListener('click', function() {
            if (currentZoomLevel < maxZoomLevel) {
                currentZoom += zoomIncrement;
                currentZoomLevel++;
                updateZoom();
                
                // Désactiver le bouton si on atteint la limite
                if (currentZoomLevel >= maxZoomLevel) {
                    zoomInBtn.classList.add('disabled');
                    zoomInBtn.setAttribute('aria-disabled', 'true');
                }
                
                // Réactiver le bouton de zoom out
                zoomOutBtn.classList.remove('disabled');
                zoomOutBtn.setAttribute('aria-disabled', 'false');
            }
        });
    }
    
    if (zoomOutBtn) {
        zoomOutBtn.addEventListener('click', function() {
            if (currentZoomLevel > 0) {
                currentZoom -= zoomIncrement;
                currentZoomLevel--;
                updateZoom();
                
                // Désactiver le bouton si on atteint la limite inférieure
                if (currentZoomLevel <= 0) {
                    zoomOutBtn.classList.add('disabled');
                    zoomOutBtn.setAttribute('aria-disabled', 'true');
                }
                
                // Réactiver le bouton de zoom in
                zoomInBtn.classList.remove('disabled');
                zoomInBtn.setAttribute('aria-disabled', 'false');
            }
        });
    }
    
    if (zoomResetBtn) {
        zoomResetBtn.addEventListener('click', function() {
            currentZoom = 1;
            currentZoomLevel = 0;
            updateZoom();
            
            // Réinitialiser l'état des boutons
            zoomInBtn.classList.remove('disabled');
            zoomInBtn.setAttribute('aria-disabled', 'false');
            zoomOutBtn.classList.add('disabled');
            zoomOutBtn.setAttribute('aria-disabled', 'true');
        });
    }
    
    // Désactiver le bouton zoom out au démarrage car on est au niveau 0
    if (zoomOutBtn) {
        zoomOutBtn.classList.add('disabled');
        zoomOutBtn.setAttribute('aria-disabled', 'true');
    }
}