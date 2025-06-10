document.addEventListener('DOMContentLoaded', function() {
    const cookieBanner = document.getElementById('cookie-consent');
    const acceptBtn = document.getElementById('accept-cookies');
    const declineBtn = document.getElementById('decline-cookies');
    
    // Vérifier si l'utilisateur a déjà fait un choix
    if (!getCookie('cookie_consent')) {
        showCookieBanner();
    }
    
    // Accepter tous les cookies
    acceptBtn.addEventListener('click', function() {
        setCookie('cookie_consent', 'accepted', 365);
        setCookie('analytics_cookies', 'true', 365);
        setCookie('marketing_cookies', 'true', 365);
        hideCookieBanner();
        loadAllCookies();
    });
    
    // Refuser les cookies non-essentiels
    declineBtn.addEventListener('click', function() {
        setCookie('cookie_consent', 'declined', 365);
        setCookie('analytics_cookies', 'false', 365);
        setCookie('marketing_cookies', 'false', 365);
        hideCookieBanner();
    });
    
    function showCookieBanner() {
        cookieBanner.style.display = 'block';
    }
    
    function hideCookieBanner() {
        cookieBanner.style.display = 'none';
    }
    
    function loadAllCookies() {
        loadAnalyticsCookies();
        loadMarketingCookies();
    }
    
    function loadAnalyticsCookies() {
        // Charger Google Analytics ou autres
        console.log('Chargement des cookies d\'analyse');
        // Exemple : gtag('config', 'GA_MEASUREMENT_ID');
    }
    
    function loadMarketingCookies() {
        // Charger les cookies de marketing
        console.log('Chargement des cookies de marketing');
        // Exemple : Facebook Pixel, etc.
    }
    
    function setCookie(name, value, days) {
        const expires = new Date();
        expires.setTime(expires.getTime() + (days * 24 * 60 * 60 * 1000));
        document.cookie = name + '=' + value + ';expires=' + expires.toUTCString() + ';path=/';
    }
    
    function getCookie(name) {
        const nameEQ = name + '=';
        const ca = document.cookie.split(';');
        for (let i = 0; i < ca.length; i++) {
            let c = ca[i];
            while (c.charAt(0) === ' ') c = c.substring(1, c.length);
            if (c.indexOf(nameEQ) === 0) return c.substring(nameEQ.length, c.length);
        }
        return null;
    }
});