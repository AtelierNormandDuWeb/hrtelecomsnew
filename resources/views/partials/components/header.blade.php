<header>
    <div class="header-content">
        <a href="{{ url('/') }}#" class="logo">
            <img class="logo-icon" src="{{ asset('images/Logo_hr_télécoms-06.png') }}"
                alt="Logo de l'entreprise HrTélécoms">
        </a>

        <button class="nav-toggle" aria-label="Ouvrir le menu">
            <i class="fas fa-bars"></i>
        </button>

        <nav>
            <ul id="main-menu">
                <li><a href="{{ url('/') }}#" class="active">Accueil</a></li>
                <li><a href="{{ url('/') }}#about">À propos</a></li>
                <li><a href="{{ url('/solutions') }}#solutions">Solutions</a></li>
                <li><a href="{{ url('/') }}#services">Services</a></li>
                <li><a href="{{ url('/') }}#faq">FAQ</a></li>
                <li><a href="{{ url('/trombinoscope') }}#faq">L'Equipe</a></li>
                <li><a href="{{ url('/pagecontact') }}#contact">Contact</a></li>
            </ul>
        </nav>
    </div>
</header>
