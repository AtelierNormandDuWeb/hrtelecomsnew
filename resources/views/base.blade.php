<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title', 'HRTelecoms - Téléphonie d\'entreprise VoIP en Normandie')</title>
    <!-- Meta SEO -->
    <meta name="keywords"
        content="Téléphonie d'entreprise, VoIP, centrex, IPBX, télécommunications, téléphonie IP, communications unifiées, standard téléphonique, télécommunications filaires, opérateur télécom, Normandie, Caen, Laize-Clinchamps">
    <meta name="description"
        content="HRTelecoms, expert en téléphonie d'entreprise VoIP depuis 2012. Solutions de centrex et IPBX personnalisées, installation et maintenance en Normandie. La téléphonie d'entreprise facile et accessible.">
    <meta name="robots" content="index, follow">
    <meta name="author" content="HRTelecoms">
    <!-- Open Graph -->
    <meta property="og:title" content="@yield('title', 'HRTelecoms - Téléphonie d\'entreprise VoIP en Normandie')">
    <meta property="og:description" content="@yield('description', 'Expert en solutions de téléphonie VoIP pour entreprises : centrex et IPBX en Normandie')">
    <meta property="og:image" content="{{ asset('images/logo.webp') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
    <link rel="canonical" href="https://hrtelecoms.fr/">
    <!-- Favicon & Icons -->
    <link rel="icon" href="{{ asset('images/logo.ico') }}" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{ asset('images/logo.ico') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <!-- Intégration de Font Awesome pour des icônes modernes -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Intégration d'AOS pour des animations au défilement -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    {{-- TROMBINOSCOPE --}}
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://fonts.bunny.net/css?family=roboto-condensed:300,400,500,700" rel="stylesheet">
    <!-- Styles & Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @yield('styles')
    <!-- Structured Data -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "LocalBusiness",
        "name": "HRTelecoms",
        "description": "HRTelecoms propose des solutions de téléphonie d'entreprise VoIP (centrex et IPBX) en Normandie. Expert en télécommunications filaires depuis 2012.",
        "url": "https://hrtelecoms.fr/",
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "16 Imp. Banville",
            "addressLocality": "Laize-Clinchamps",
            "postalCode": "14320",
            "addressCountry": "FR"
        },
        "contactPoint": {
            "@type": "ContactPoint",
            "contactType": "Customer Support",
            "telephone": "+33231435011",
            "email": "contact@hrtelecoms.fr",
            "availableLanguage": ["fr"]
        },
        "image": "https://hrtelecoms.fr/images/logo.png",
        "openingHoursSpecification": [{
            "@type": "OpeningHoursSpecification",
            "dayOfWeek": ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"],
            "opens": "09:00",
            "closes": "12:00"
        },
        {
            "@type": "OpeningHoursSpecification",
            "dayOfWeek": ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"],
            "opens": "14:00",
            "closes": "18:00"
        }],
        "sameAs": [
            "https://www.facebook.com/hrtelecoms/",
            "https://www.linkedin.com/company/hr-telecoms/"
        ],
        "foundingDate": "2012-11-06",
        "taxID": "FR38789256740",
        "vatID": "FR38789256740",
        "isicV4": "6110",
        "slogan": "La téléphonie d'entreprise facile et accessible en Normandie"
    }
    </script>
</head>

<body>
    <header>
        @include('partials/components/header')
    </header>
    <!-- Boîte à outils d'accessibilité -->
    <div class="accessibility-toggle" aria-label="Outils d'accessibilité">
        <i class="fas fa-universal-access"></i>
    </div>

    @yield('content')

    <footer>
        @include('partials/components/footer')
    </footer>

    <!-- Bouton retour en haut -->
    <a href="#" class="back-to-top" aria-label="Retour en haut">
        <i class="fas fa-arrow-up"></i>
    </a>

    @yield('scripts')

    <!-- Gestion des ancres internes -->
    <script>
        document.querySelectorAll("a[href*='#']").forEach(anchor => {
            anchor.addEventListener("click", function(event) {
                const href = this.getAttribute("href");
                if (href.includes("#")) {
                    event.preventDefault();
                    const [path, hash] = href.split("#");
                    if (path) {
                        sessionStorage.setItem("scrollTo", `#${hash}`);
                        window.location.href = path;
                    } else {
                        document.querySelector(`#${hash}`).scrollIntoView({
                            behavior: "smooth"
                        });
                    }
                }
            });
        });

        document.addEventListener("DOMContentLoaded", function() {
            const scrollTo = sessionStorage.getItem("scrollTo");
            if (scrollTo) {
                setTimeout(() => {
                    document.querySelector(scrollTo).scrollIntoView({
                        behavior: "smooth"
                    });
                    sessionStorage.removeItem("scrollTo");
                }, 500);
            }
        });
    </script>

    <!-- Libs externes -->
    {{-- <script src="https://unpkg.com/aos@2.3.1/dist/aos.js" defer></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lottie-web/5.9.6/lottie.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
</body>

</html>
