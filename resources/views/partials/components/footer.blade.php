<footer>
    <div class="footer-content">
        <div class="footer-column">
            <h3>HRTélécoms</h3>
            <p>Solutions de téléphonie IP innovantes pour les professionnels.</p>

            <div class="social-icons">
                <a href="https://www.facebook.com/profile.php?id=100085342823881" class="social-icon" aria-label="Facebook">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="https://fr.linkedin.com/company/hrtelecoms" class="social-icon" aria-label="LinkedIn">
                    <i class="fab fa-linkedin-in"></i>
                </a>
                <a href="https://www.instagram.com/hrtelecoms/" class="social-icon" aria-label="Instagram">
                    <i class="fab fa-instagram"></i>
                </a>
            </div>
        </div>

        <div class="footer-column">
            <h3>Navigation</h3>
            <ul class="footer-links">
                <li><a href="{{ url('/') }}#home">Accueil</a></li>
                <li><a href="{{ url('/') }}#about">À propos</a></li>
                <li><a href="{{ url('/solutions') }}#solutions">Solutions</a></li>
                <li><a href="{{ url('/') }}#services">Services</a></li>
                <li><a href="{{ url('/') }}#faq">FAQ</a></li>
                <li><a href="{{ url('/') }}#contact">Contact</a></li>
            </ul>
        </div>

        <div class="footer-column">
            <h3>Solutions</h3>
            <ul class="footer-links">
                <li><a href="{{ url('/') }}#services">Services Cloud</a></li>
                <li><a href="{{ url('/') }}#contact">Support Technique</a></li>
                <li><a href="{{ url('/') }}#about">Matériel Téléphonique</a></li>
            </ul>
        </div>

        <div class="footer-column">
            <h3>Légal</h3>
            <ul class="footer-links">
                <li><a href="{{ route('mentions-legales') }}">Mentions légales</a></li>
                <li><a href="{{ route('confidentialite') }}">Politique de confidentialité</a></li>
                <li><a href="{{ route('cookiesview') }}">Cookies</a></li>
            </ul>
        </div>
    </div>

    <div class="footer-bottom">
        <p>&copy; 2025 HrTélécoms. Tous droits réservés.</p>
    </div>
</footer>
