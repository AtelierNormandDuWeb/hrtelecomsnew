<div id="cookie-consent" class="cookie-banner" style="display: none;">
    <div class="cookie-banner-container">
        <div class="cookie-banner-content">
            <div class="cookie-icon">
                <i class="fas fa-cookie-bite"></i>
            </div>
            <div class="cookie-text">
                <h3 class="cookie-title">Nous utilisons des cookies</h3>
                <p class="cookie-description">
                    Ce site utilise des cookies pour améliorer votre expérience de navigation, 
                    analyser le trafic et personnaliser le contenu. En continuant à utiliser ce site, 
                    vous acceptez notre utilisation des cookies.
                </p>
                <a href="{{ route('cookiesview') }}" class="cookie-policy-link">En savoir plus sur notre politique de cookies</a>
            </div>
        </div>
        
        <div class="cookie-actions">
            <button type="button" class="cookie-banner-btn cookie-banner-btn-decline" id="decline-cookies">
                <i class="fas fa-times"></i>
                Refuser
            </button>
            <button type="button" class="cookie-banner-btn cookie-banner-btn-accept" id="accept-cookies">
                <i class="fas fa-check"></i>
                Accepter
            </button>
        </div>
    </div>
</div>