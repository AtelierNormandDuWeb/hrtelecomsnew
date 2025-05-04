import { addClass, removeClass } from './utils.js';

export function initTabs() {
    const tabButtons = document.querySelectorAll('.tab-button');
    const tabContents = document.querySelectorAll('.tab-content');
    
    if (tabButtons && tabButtons.length > 0) {
        tabButtons.forEach(button => {
            button.addEventListener('click', () => {
                // Désactiver tous les boutons et contenus
                tabButtons.forEach(btn => removeClass(btn, 'active'));
                tabContents.forEach(content => removeClass(content, 'active'));
                
                // Activer le bouton cliqué
                addClass(button, 'active');
                
                // Activer le contenu correspondant
                const tabId = button.getAttribute('data-tab');
                const activeTab = document.getElementById(tabId);
                if (activeTab) {
                    addClass(activeTab, 'active');
                }
            });
        });
    }
}