@extends('base')
<style>
    @layer base, cards;

    .trombinoscope-section {
        padding: 5rem 0 5rem 0;
        background: linear-gradient(135deg, #667eea 0%, #cccccc 100%);
    }

    @layer base {
        .trombinoscope-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 110vh;
            position: relative;
            line-height: 1.5;
            padding: 4rem 2rem;
        }

        .sr-only {
            position: absolute;
            width: 1px;
            height: 1px;
            padding: 0;
            margin: -1px;
            overflow: hidden;
            clip: rect(0, 0, 0, 0);
            white-space: nowrap;
            border-width: 0;
        }

        .header {
            position: fixed;
            top: 1rem;
            left: 1rem;
            z-index: 1000;
            color: white;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .admin-link {
            position: fixed;
            top: 1rem;
            right: 1rem;
            z-index: 1000;
            background: rgba(0, 0, 0, 0.7);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            text-decoration: none;
            transition: background 0.3s;
        }

        .admin-link:hover {
            background: rgba(0, 0, 0, 0.9);
            color: white;
        }

        .loading {
            color: white;
            text-align: center;
            font-size: 1.2rem;
        }

        .error {
            color: #ff6b6b;
            text-align: center;
            font-size: 1.2rem;
            background: rgba(0, 0, 0, 0.7);
            padding: 1rem;
            border-radius: 10px;
            margin: 1rem;
        }
    }

    @layer cards {
        .cards-container {
            --item-border-clr: rgba(255 255 255 / .5);
            --item-txt-clr: white;
            --nav-indicator-bg: rgba(3, 39, 59, 0.7);

            color: var(--item-txt-clr);
            display: grid;
            place-content: center;
            width: 100%;
            position: relative;
            min-height: 700px;
        }

        .cards-container article {
            --article-width: 70px;
            --article-height: 100px;
            --article-transition-duration: 1000ms;
            --article-transition-delay: 0s;
            --article-transition-timing: ease-in-out;

            grid-area: 1/1;
            transform-origin: center;
            width: var(--article-width);
            height: var(--article-height);
            background-color: rgba(0, 0, 0, 0.8);
            border: 1px solid var(--item-border-clr);
            border-radius: 10px;
            position: relative;
            z-index: var(--article-0);
            transition: all var(--article-transition-duration) var(--article-transition-timing);
            transition-delay: var(--article-transition-delay);
            overflow: hidden;
            isolation: isolate;
            transform: translate(var(--translate-x, 0), var(--translate-y, 0));
            backdrop-filter: blur(10px);
        }

        /* Smartphone : 2 cartes par ligne */
        @media (width <=600px) {
            .cards-container article {
                --article-width: 140px;
                --article-height: 180px;
            }
        }

        /* Tablette : 3 cartes par ligne */
        @media (width > 600px) and (width <=960px) {
            .cards-container article {
                --article-width: 160px;
                --article-height: 220px;
            }
        }

        /* Desktop : 4 cartes par ligne */
        @media (width > 960px) and (width <=1440px) {
            .cards-container article {
                --article-width: 180px;
                --article-height: 240px;
            }
        }

        /* Large desktop : 4 cartes par ligne */
        @media (width > 1440px) {
            .cards-container article {
                --article-width: 200px;
                --article-height: 260px;
            }
        }

        .cards-container article::before {
            content: "";
            background-image:
                linear-gradient(to bottom, transparent 40%, rgba(0 0 0 / .75)),
                var(--bg-img);
            inset: 0;
            position: absolute;
            opacity: 100;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            z-index: -20;
        }

        .cards-container>input[name="character"]:checked+article::after {
            opacity: 1;
            background-image: linear-gradient(to top, rgba(0, 0, 0, 0.9), transparent 75%);
            transition-delay: 1500ms;
            z-index: -1;
        }

        .cards-container label {
            cursor: pointer;
        }

        .cards-container .avatar {
            display: block;
            background-color: rgba(0, 0, 0, 0.3);
            margin: 0 auto;
            width: 100%;
            height: 100%;
            border-radius: 10px;
            position: relative;
            transition: all 1000ms ease-in-out;
            transition-delay: var(--avatar-transition-delay, 0ms);
            overflow: hidden;
            clip-path: var(--avatar-clip, circle(100% at 50% 50%));
            translate: 0 var(--avatar-y, 0);
        }

        .cards-container .avatar>img {
            object-fit: cover;
            width: 100%;
            height: 100%;
            transition: all 500ms ease-in-out;
            transition-delay: var(--avatar-img-transition-delay, 0ms);
            scale: var(--avatar-img-scale, 1);
            translate: var(--avatar-img-x, 0), var(--avatar-img-y, 0);
            filter: saturate(var(--avatar-img-saturate, 75%));
            object-position: center 15%;
            /* Point focal encore plus haut pour capturer le visage */
        }

        .cards-container .avatar>img:hover {
            filter: saturate(100%);
        }

        .cards-container .btnClose {
            position: absolute;
            top: 0;
            right: 0;
            z-index: 20;
            background-color: rgba(0, 0, 0, 0.8);
            width: 30px;
            height: 30px;
            display: grid;
            place-content: center;
            border-radius: 0 10px 0 10px;
            transition: all 300ms ease-in-out;
            transition-delay: var(--btn-close-transition-delay, 0ms);
            translate: var(--btn-close-x, 8rem);
        }

        .cards-container .btnClose>span {
            opacity: 0.7;
            transition: opacity 150ms ease-in-out, rotate 150ms ease-in-out;
        }

        .cards-container .btnClose:hover>span {
            opacity: 1;
            rotate: 90deg;
        }

        .cards-container h2 {
            font-size: clamp(0.8rem, 2vw + .05rem, 1.2rem);
            font-weight: 300;
            letter-spacing: wider;
            color: white;
            white-space: nowrap;
            position: absolute;
            top: 0;
            left: 0;
            writing-mode: vertical-rl;
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0.8), transparent);
            height: 50%;
            transition: all 300ms ease-in-out 750ms;
            z-index: 20;
            padding: 0.5rem 0.25rem;
            pointer-events: none;
            opacity: var(--title-opacity, 0);
        }

        @media (width > 800px) {
            .cards-container h2 {
                opacity: var(--title-opacity, 1);
                padding: 1rem 0.5rem;
                font-size: clamp(0.9rem, 2.5vw + .05rem, 1.4rem);
            }
        }

        .cards-container h3 {
            padding: 0 0 1rem 2rem;
            text-shadow: 1px 1px rgba(0 0 0);
        }

        .cards-container h4 {
            padding: 0.5rem 0;
            text-transform: uppercase;
            font-size: 0.9rem;
            color: #ffd700;
        }

        .cards-container>article>div {
            transition: transform var(--_transition-delay-base) ease-in-out;
            transition-delay: var(--data-transition-delay, 0ms);
            transform: translateY(var(--data-y, 0));
        }

        .cards-container nav {
            display: flex;
            align-items: center;
            justify-content: space-between;
            overflow: hidden;
            position: relative;
            isolation: isolate;
            transition: all 300ms ease-in-out;
            border-top: 1px solid var(--item-border-clr);
            border-bottom: 1px solid var(--item-border-clr);
        }

        .cards-container nav::after {
            content: "";
            position: absolute;
            background-color: var(--nav-indicator-bg);
            transition: all 300ms ease-in-out;
            z-index: -10;
            height: 100%;
            width: calc((100 / var(--items)) * 1%);
            backdrop-filter: blur(2px);
        }

        .cards-container nav>label {
            padding: 0.5rem 1rem;
            text-transform: uppercase;
            white-space: nowrap;
            flex: 1;
            display: grid;
            place-content: center;
            cursor: pointer;
            transition: all 300ms ease-in-out;
            position: relative;
            isolation: isolate;
            overflow: hidden;
        }

        .cards-container nav>label>span {
            font-size: 1.4rem !important;
            transition: scale 150ms ease-in-out;
        }

        .cards-container nav>label:hover>span {
            scale: 1.2;
        }

        .cards-container [data-panels] {
            display: flex;
            width: 100%;
            transition: all 500ms ease-in-out;
            align-items: flex-start;
        }

        .cards-container [data-panels]>div {
            flex-shrink: 0;
            width: 100%;
            height: 200px;
            overflow-y: auto;
            padding: 1rem 2rem;
            transition: all 500ms ease-in-out;
            font-size: 0.85rem;
            line-height: 1.4;
        }

        .cards-container [data-panels] ul {
            padding: 0.5rem 0;
            list-style: none;
            display: grid;
            gap: .5rem;
        }

        .cards-container [data-panels] li {
            padding: 0.25rem 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .cards-container:has(input[name="character"]:checked) article:not(input[name="character"]:checked+article) {
            scale: 0;
            rotate: -10deg;
        }

        .cards-container>input[name="character"]:checked+article {
            --_transition-delay-base: 500ms;
            --_transition-delay-steps: 500ms;
            z-index: 10000;
            transform: translate(0) !important;
            --article-width: min(380px, 90vw);
            --article-height: min(520px, 85vh);
            --article-transition-delay: var(--_transition-delay-base);
            --avatar-clip: circle(0% at 50% 35%);
            --avatar-transition-delay: calc(var(--_transition-delay-base) + var(--_transition-delay-steps) * 2);
            --avatar-y: -4rem;
            --avatar-img-transition-delay: calc(var(--_transition-delay-base) + var(--_transition-delay-steps) * 3);
            --avatar-img-saturate: 100%;
            --avatar-img-scale: 1;
            --avatar-img-x: 0;
            --avatar-img-y: 0;
            --title-opacity: 1;
            --data-y: -280px;
            --data-transition-delay: calc(var(--_transition-delay-base) + var(--_transition-delay-steps) * 4);
            --btn-close-x: 0;
            --btn-close-transition-delay: calc(var(--_transition-delay-base) + var(--_transition-delay-steps) * 5);
        }

        .cards-container .panel-1:checked~article nav::after {
            transform: translateX(0%);
        }

        .cards-container .panel-2:checked~article nav::after {
            transform: translateX(100%);
        }

        .cards-container .panel-3:checked~article nav::after {
            transform: translateX(200%);
        }

        .cards-container .panel-1:checked~article [data-panels] {
            transform: translateX(0%);
        }

        .cards-container .panel-2:checked~article [data-panels] {
            transform: translateX(-100%);
        }

        .cards-container .panel-3:checked~article [data-panels] {
            transform: translateX(-200%);
        }
    }
</style>

@section('content')
    @include('sections.accessibilitytools')
    <section class="trombinoscope-section">
        <div>

        </div>
        <div class="trombinoscope-container">
            <input type="radio" name="character" id="radio-close" class="sr-only">
            <div id="cards-container" class="cards-container">
                <div class="loading">Chargement des cartes...</div>
            </div>

            <!-- Template pour les cartes -->
            <template id="tpl-card">
                <input type="radio" name="panel-toggle" id="" class="sr-only panel-1" checked>
                <input type="radio" name="panel-toggle" id="" class="sr-only panel-2">
                <input type="radio" name="panel-toggle" id="" class="sr-only panel-3">
                <input type="radio" name="character" id="" class="sr-only">
                <article id="">
                    <label for="" class="avatar">
                        <img src="" alt="" onerror="this.src='{{ asset('images/default-avatar.png') }}'">
                    </label>
                    <label for="radio-close" class="btnClose">
                        <span class="material-symbols-outlined">close</span>
                    </label>
                    <h2></h2>
                    <div>
                        <h3></h3>
                        <nav style="--items:3">
                            <label for=""><span class="material-symbols-outlined">person</span></label>
                            <label for=""><span class="material-symbols-outlined">info</span></label>
                            <label for=""><span class="material-symbols-outlined">contact_mail</span></label>
                        </nav>
                        <div data-panels>
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                    </div>
                </article>
            </template>

        </div>
    </section>
    <script>
        console.clear();

        const cardTemplate = document.querySelector("#tpl-card");
        const cardContainer = document.querySelector("#cards-container");

        // Vérification de l'existence des éléments essentiels
        if (!cardTemplate) {
            console.error('Template #tpl-card non trouvé !');
        }
        if (!cardContainer) {
            console.error('Container #cards-container non trouvé !');
        }

        // Configuration responsive
        function getLayoutConfig() {
            const width = window.innerWidth;

            if (width <= 600) {
                return {
                    itemsPerRow: 2,
                    horizontalSpacing: 160, // Parfait sur mobile
                    verticalSpacing: 200,
                    cardWidth: 140,
                    cardHeight: 180
                };
            }

            if (width <= 960) {
                return {
                    itemsPerRow: 3,
                    horizontalSpacing: 220, // Beaucoup plus d'espace
                    verticalSpacing: 280, // Beaucoup plus d'espace vertical
                    cardWidth: 160,
                    cardHeight: 220
                };
            }

            if (width <= 1440) {
                return {
                    itemsPerRow: 4,
                    horizontalSpacing: 240, // Encore plus d'espace
                    verticalSpacing: 320, // Encore plus d'espace vertical
                    cardWidth: 180,
                    cardHeight: 240
                };
            }

            return {
                itemsPerRow: 4,
                horizontalSpacing: 280, // Maximum d'espace sur très grands écrans
                verticalSpacing: 360,
                cardWidth: 200,
                cardHeight: 260
            };
        }

        // Fonction pour calculer et définir la hauteur du conteneur
        function setContainerHeight(totalCards) {
            const config = getLayoutConfig();
            const rows = Math.ceil(totalCards / config.itemsPerRow);

            // Calcul de la hauteur nécessaire
            const containerHeight = (rows - 1) * config.verticalSpacing + config.cardHeight + 100;

            // Appliquer la hauteur au conteneur - avec vérification d'existence
            const container = document.querySelector('.cards-container');
            if (container) {
                container.style.setProperty('--container-height', `${containerHeight}px`);
            } else {
                console.warn('Container .cards-container non trouvé pour setContainerHeight');
            }
        }

        // Fonction pour recalculer toutes les positions
        function recalculateAllPositions() {
            const articles = document.querySelectorAll('.cards-container article');

            // Vérifier que des articles existent
            if (articles.length === 0) {
                console.warn('Aucun article trouvé pour recalculateAllPositions');
                return;
            }

            const config = getLayoutConfig();

            // Mettre à jour la hauteur du conteneur
            setContainerHeight(articles.length);

            articles.forEach((article, index) => {
                const row = Math.floor(index / config.itemsPerRow);
                const col = index % config.itemsPerRow;

                const colOffset = col - (config.itemsPerRow - 1) / 2;
                const rowOffset = row - (Math.ceil(articles.length / config.itemsPerRow) - 1) / 2;

                const x = colOffset * config.horizontalSpacing;
                const y = rowOffset * config.verticalSpacing;

                article.style.setProperty("--translate-x", `${x}px`);
                article.style.setProperty("--translate-y", `${y}px`);
            });
        }

        async function fetchCards() {
            try {
                const response = await fetch('{{ route('cards.json') }}', {
                    method: 'GET',
                    headers: {
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                            'content')
                    }
                });

                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }

                const cards = await response.json();
                console.log('Cards chargées:', cards);
                return cards;
            } catch (error) {
                console.error('Erreur lors du chargement des cartes:', error);
                return [];
            }
        }

        function createCardPanel(card, index, totalCards) {
            if (!cardTemplate) {
                console.error('Template non disponible pour createCardPanel');
                return;
            }

            const clone = cardTemplate.content.cloneNode(true);

            assignIds(clone, card);
            setContent(clone, card);

            const infoHTML = createInfoHTML(card);
            const contactHTML = createContactHTML(card);
            const navPanels = clone.querySelectorAll("[data-panels] div");

            if (navPanels.length >= 3) {
                navPanels[1].appendChild(infoHTML);
                navPanels[2].appendChild(contactHTML);
            }

            applyPositioning(clone, index, totalCards);

            if (cardContainer) {
                cardContainer.append(clone);
            }
        }

        function assignIds(clone, card) {
            const panel1 = clone.querySelector("input.panel-1");
            const panel2 = clone.querySelector("input.panel-2");
            const panel3 = clone.querySelector("input.panel-3");
            const charInput = clone.querySelector("input[name='character']");
            const avatar = clone.querySelector(".avatar");
            const article = clone.querySelector("article");

            if (panel1) panel1.id = `radio-tab-${card.card_id}.1`;
            if (panel2) panel2.id = `radio-tab-${card.card_id}.2`;
            if (panel3) panel3.id = `radio-tab-${card.card_id}.3`;
            if (charInput) charInput.id = `radio-char-${card.card_id}`;
            if (avatar) avatar.setAttribute("for", `radio-char-${card.card_id}`);
            if (article) article.id = `card-${card.card_id}`;
        }

        function setContent(clone, card) {
            // Gestion de l'image de fond
            const article = clone.querySelector("article");
            if (card.background_url && article) {
                article.style.setProperty("--bg-img", `url(${card.background_url})`);
            }

            // Gestion de l'avatar
            const avatarImg = clone.querySelector(".avatar img");
            if (avatarImg) {
                if (card.avatar_url) {
                    avatarImg.src = card.avatar_url;
                }
                avatarImg.alt = card.name || 'Avatar';
            }

            // Contenu textuel
            const h2 = clone.querySelector("h2");
            const h3 = clone.querySelector("h3");

            if (h2) h2.textContent = card.name || 'Sans nom';
            if (h3) h3.textContent = card.title || card.subtitle || '';

            // Navigation
            const navLabels = clone.querySelectorAll("nav label");
            if (navLabels.length >= 3) {
                navLabels[0].setAttribute("for", `radio-tab-${card.card_id}.1`);
                navLabels[1].setAttribute("for", `radio-tab-${card.card_id}.2`);
                navLabels[2].setAttribute("for", `radio-tab-${card.card_id}.3`);
            }

            // Contenu des panneaux
            const navPanels = clone.querySelectorAll("[data-panels] div");
            if (navPanels.length >= 1) {
                navPanels[0].textContent = card.description || 'Aucune description disponible.';
            }
        }

        function applyPositioning(clone, index, totalCards) {
            const config = getLayoutConfig();
            const article = clone.querySelector("article");

            if (!article) {
                console.warn('Article non trouvé pour applyPositioning');
                return;
            }

            const row = Math.floor(index / config.itemsPerRow);
            const col = index % config.itemsPerRow;

            // Calcul des offsets depuis le centre
            const colOffset = col - (config.itemsPerRow - 1) / 2;
            const totalRows = Math.ceil(totalCards / config.itemsPerRow);
            const rowOffset = row - (totalRows - 1) / 2;

            // Calcul des positions en pixels
            const x = colOffset * config.horizontalSpacing;
            const y = rowOffset * config.verticalSpacing;

            article.style.setProperty("--translate-x", `${x}px`);
            article.style.setProperty("--translate-y", `${y}px`);
        }

        function createInfoHTML(card) {
            const fragment = document.createDocumentFragment();

            if (card.subtitle && card.subtitle !== card.title) {
                const h4 = document.createElement("h4");
                h4.textContent = card.subtitle;
                fragment.appendChild(h4);
            }

            if (card.details && typeof card.details === 'object' && Object.keys(card.details).length > 0) {
                const ul = document.createElement("ul");
                for (const [key, value] of Object.entries(card.details)) {
                    if (value) {
                        const li = document.createElement("li");
                        li.innerHTML = `<strong>${key}:</strong> ${value}`;
                        ul.appendChild(li);
                    }
                }
                if (ul.children.length > 0) {
                    fragment.appendChild(ul);
                }
            }

            // Si pas de contenu, afficher un message
            if (!fragment.hasChildNodes()) {
                const p = document.createElement("p");
                p.textContent = "Aucune information supplémentaire disponible.";
                fragment.appendChild(p);
            }

            return fragment;
        }

        function createContactHTML(card) {
            const fragment = document.createDocumentFragment();

            if (card.contact_info && typeof card.contact_info === 'object' && Object.keys(card.contact_info).length > 0) {
                const h4 = document.createElement("h4");
                h4.textContent = "Contact";
                fragment.appendChild(h4);

                const ul = document.createElement("ul");
                for (const [key, value] of Object.entries(card.contact_info)) {
                    if (value) {
                        const li = document.createElement("li");
                        if (key.toLowerCase().includes('email')) {
                            li.innerHTML =
                                `<strong>${key}:</strong> <a href="mailto:${value}" style="color: #ffd700;">${value}</a>`;
                        } else if (key.toLowerCase().includes('tel') || key.toLowerCase().includes('phone') || key
                            .toLowerCase().includes('téléphone')) {
                            li.innerHTML =
                                `<strong>${key}:</strong> <a href="tel:${value}" style="color: #ffd700;">${value}</a>`;
                        } else {
                            li.innerHTML = `<strong>${key}:</strong> ${value}`;
                        }
                        ul.appendChild(li);
                    }
                }
                if (ul.children.length > 0) {
                    fragment.appendChild(ul);
                }
            }

            // Si pas de contact, afficher un message
            if (!fragment.hasChildNodes()) {
                const p = document.createElement("p");
                p.textContent = "Aucune information de contact disponible.";
                fragment.appendChild(p);
            }

            return fragment;
        }

        async function renderCards() {
            try {
                if (!cardContainer) {
                    console.error('Container #cards-container non trouvé pour renderCards !');
                    return;
                }

                const cards = await fetchCards();

                // Clear loading message
                cardContainer.innerHTML = '';

                if (!cards || cards.length === 0) {
                    cardContainer.innerHTML =
                        '<p style="color: white; text-align: center; font-size: 1.2rem;">Aucune carte à afficher. <a href="{{ route('admin.cards.index') }}" style="color: #ffd700;">Ajouter des cartes</a></p>';
                    return;
                }

                if (cards.error) {
                    cardContainer.innerHTML = `<div class="error">Erreur: ${cards.error}</div>`;
                    return;
                }

                console.log(`Affichage de ${cards.length} cartes`);

                // Définir la hauteur du conteneur avant d'ajouter les cartes
                setContainerHeight(cards.length);

                // Créer toutes les cartes avec le nombre total connu
                cards.forEach((card, index) => {
                    createCardPanel(card, index, cards.length);
                });

                // Forcer un recalcul après l'ajout de toutes les cartes
                setTimeout(() => {
                    recalculateAllPositions();
                }, 50);

            } catch (error) {
                console.error('Erreur lors du rendu des cartes:', error);
                if (cardContainer) {
                    cardContainer.innerHTML =
                        '<div class="error">Erreur lors du chargement des cartes. Veuillez réessayer plus tard.</div>';
                }
            }
        }

        // Fonction utilitaire pour debounce
        function debounce(func, wait) {
            let timeout;
            return function executedFunction(...args) {
                const later = () => {
                    clearTimeout(timeout);
                    func(...args);
                };
                clearTimeout(timeout);
                timeout = setTimeout(later, wait);
            };
        }

        // Event listener pour le redimensionnement
        window.addEventListener('resize', debounce(() => {
            recalculateAllPositions();
        }, 250));

        // Initialisation au chargement de la page
        document.addEventListener('DOMContentLoaded', function() {
            console.log('DOM chargé, initialisation du trombinoscope...');

            // Attendre que tous les éléments soient bien en place
            setTimeout(() => {
                renderCards();
            }, 200);
        });

        // Ajout d'un listener pour s'assurer que tout est bien chargé
        window.addEventListener('load', function() {
            // Double vérification après le chargement complet
            setTimeout(() => {
                recalculateAllPositions();
            }, 100);
        });

        // Fonction pour recharger les cartes (utile pour le debug)
        window.reloadCards = renderCards;
    </script>
@endsection
