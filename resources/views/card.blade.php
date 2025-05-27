<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trombinoscope</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://fonts.bunny.net/css?family=roboto-condensed:300,400,500,700" rel="stylesheet">
    <style>
        @layer reset, base, cards;

        @layer reset {
            * {
                box-sizing: border-box;
            }

            h1,
            h2,
            h3,
            h4,
            h5,
            ul {
                margin: 0;
            }
        }

        @layer base {
            body {
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                display: flex;
                justify-content: center;
                align-items: center;
                min-height: 100vh;
                position: relative;
                font-family: 'Roboto Condensed', sans-serif;
                line-height: 1.5;
                padding: 2rem;
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
                max-width: 20rem;
                position: relative;
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

            @media (width > 600px) {
                .cards-container article {
                    --article-width: 120px;
                    --article-height: 180px;
                }
            }

            @media (width > 800px) {
                .cards-container article {
                    --article-width: 200px;
                    --article-height: 250px;
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
                font-size: clamp(0.9rem, 2.5vw + .05rem, 1.4rem);
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
                padding: 1rem 0.5rem;
                pointer-events: none;
                opacity: var(--title-opacity, 0);
            }

            @media (width > 800px) {
                .cards-container h2 {
                    opacity: var(--title-opacity, 1);
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
                --article-width: 350px;
                --article-height: 500px;
                --article-transition-delay: var(--_transition-delay-base);
                --avatar-clip: circle(20% at 50% 35%);
                --avatar-transition-delay: calc(var(--_transition-delay-base) + var(--_transition-delay-steps) * 2);
                --avatar-y: -4rem;
                --avatar-img-transition-delay: calc(var(--_transition-delay-base) + var(--_transition-delay-steps) * 3);
                --avatar-img-saturate: 100%;
                --avatar-img-scale: .65;
                --avatar-img-x: -0.5rem;
                --avatar-img-y: -0.5rem;
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
</head>

<body>
    <div class="header">
        <h1>Trombinoscope</h1>
    </div>

    {{-- <a href="{{ route('cards.dashboard') }}" class="admin-link">
        <span class="material-symbols-outlined" style="vertical-align: middle; margin-right: 0.5rem;">settings</span>
        Administration
    </a> --}}

    <input type="radio" name="character" id="radio-close" class="sr-only">
    <div id="cards-container" class="cards-container">
        <!-- Les cartes seront chargées ici via JavaScript -->
    </div>

    <!-- Template pour les cartes -->
    <template id="tpl-card">
        <input type="radio" name="panel-toggle" id="" class="sr-only panel-1" checked>
        <input type="radio" name="panel-toggle" id="" class="sr-only panel-2">
        <input type="radio" name="panel-toggle" id="" class="sr-only panel-3">
        <input type="radio" name="character" id="" class="sr-only">
        <article id="">
            <label for="" class="avatar">
                <img src="" alt="">
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

    <script>
        console.clear();

        const cardTemplate = document.querySelector("#tpl-card");
        const cardContainer = document.querySelector("#cards-container");

        const ITEMS_PER_ROW = 4;
        const SPACING = 100;

        async function fetchCards() {
            try {
                const response = await fetch('{{ route('cards.json') }}');
                const cards = await response.json();
                return cards;
            } catch (error) {
                console.error('Erreur lors du chargement des cartes:', error);
                return [];
            }
        }

        function createCardPanel(card, index) {
            const clone = cardTemplate.content.cloneNode(true);

            assignIds(clone, card);
            setContent(clone, card);

            const infoHTML = createInfoHTML(card);
            const contactHTML = createContactHTML(card);
            const navPanels = clone.querySelectorAll("[data-panels] div");

            navPanels[1].appendChild(infoHTML);
            navPanels[2].appendChild(contactHTML);

            applyPositioning(clone, index);

            cardContainer.append(clone);
        }

        function assignIds(clone, card) {
            clone.querySelector("input.panel-1").id = `radio-tab-${card.card_id}.1`;
            clone.querySelector("input.panel-2").id = `radio-tab-${card.card_id}.2`;
            clone.querySelector("input.panel-3").id = `radio-tab-${card.card_id}.3`;
            clone.querySelector("input[name='character']").id = `radio-char-${card.card_id}`;
            clone.querySelector(".avatar").setAttribute("for", `radio-char-${card.card_id}`);
            clone.querySelector("article").id = `card-${card.card_id}`;
        }

        function setContent(clone, card) {
            clone.querySelector("article").style.setProperty(
                "--bg-img",
                `url(${card.background_url})`
            );

            const avatarImg = clone.querySelector(".avatar img");
            avatarImg.src = card.avatar_url;
            avatarImg.alt = card.name;

            clone.querySelector("h2").textContent = card.name;
            clone.querySelector("h3").textContent = card.title || card.subtitle || '';

            const navLabels = clone.querySelectorAll("nav label");
            navLabels[0].setAttribute("for", `radio-tab-${card.card_id}.1`);
            navLabels[1].setAttribute("for", `radio-tab-${card.card_id}.2`);
            navLabels[2].setAttribute("for", `radio-tab-${card.card_id}.3`);

            const navPanels = clone.querySelectorAll("[data-panels] div");
            navPanels[0].textContent = card.description;
        }

        function applyPositioning(clone, index) {
            const row = Math.floor(index / ITEMS_PER_ROW);
            const col = index % ITEMS_PER_ROW;

            const article = clone.querySelector("article");

            const colOffset = col - (ITEMS_PER_ROW - 1) / 2;
            const rowOffset = row - (ITEMS_PER_ROW - 1) / 2;

            const x = colOffset * SPACING;
            const y = rowOffset * SPACING;

            article.style.setProperty("--translate-x", `${x}%`);
            article.style.setProperty("--translate-y", `${y}%`);
        }

        function createInfoHTML(card) {
            const fragment = document.createDocumentFragment();

            if (card.subtitle) {
                const h4 = document.createElement("h4");
                h4.textContent = card.subtitle;
                fragment.appendChild(h4);
            }

            if (card.details && Object.keys(card.details).length > 0) {
                const ul = document.createElement("ul");
                for (const [key, value] of Object.entries(card.details)) {
                    const li = document.createElement("li");
                    li.innerHTML = `<strong>${key}:</strong> ${value}`;
                    ul.appendChild(li);
                }
                fragment.appendChild(ul);
            }

            return fragment;
        }

        function createContactHTML(card) {
            const fragment = document.createDocumentFragment();

            if (card.contact_info && Object.keys(card.contact_info).length > 0) {
                const h4 = document.createElement("h4");
                h4.textContent = "Contact";
                fragment.appendChild(h4);

                const ul = document.createElement("ul");
                for (const [key, value] of Object.entries(card.contact_info)) {
                    const li = document.createElement("li");
                    if (key.toLowerCase().includes('email')) {
                        li.innerHTML =
                            `<strong>${key}:</strong> <a href="mailto:${value}" style="color: #ffd700;">${value}</a>`;
                    } else if (key.toLowerCase().includes('tel') || key.toLowerCase().includes('phone')) {
                        li.innerHTML =
                            `<strong>${key}:</strong> <a href="tel:${value}" style="color: #ffd700;">${value}</a>`;
                    } else {
                        li.innerHTML = `<strong>${key}:</strong> ${value}`;
                    }
                    ul.appendChild(li);
                }
                fragment.appendChild(ul);
            }

            return fragment;
        }

        async function renderCards() {
            const cards = await fetchCards();

            if (cards.length === 0) {
                cardContainer.innerHTML =
                    '<p style="color: white; text-align: center; font-size: 1.2rem;">Aucune carte à afficher. <a href="{{ route('cards.dashboard') }}" style="color: #ffd700;">Ajouter des cartes</a></p>';
                return;
            }

            requestAnimationFrame(() => {
                cards.forEach((card, index) => {
                    createCardPanel(card, index);
                });
            });
        }

        document.addEventListener('DOMContentLoaded', renderCards);
    </script>
