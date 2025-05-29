console.clear();

const cardTemplate = document.querySelector("#tpl-card");
const cardContainer = document.querySelector("#cards-container");

const ITEMS_PER_ROW = 4;
const SPACING = 100;

async function fetchCards() {
    try {
        const response = await fetch('{{ route('cards.json') }}', {
            method: 'GET',
            headers: {
                'Accept': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        });

        if (!response.ok) throw new Error(`HTTP error! status: ${response.status}`);

        const cards = await response.json();
        console.log('Cartes chargées:', cards);
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
    const idBase = `card-${card.card_id}`;
    clone.querySelector("input.panel-1").id = `${idBase}-1`;
    clone.querySelector("input.panel-2").id = `${idBase}-2`;
    clone.querySelector("input.panel-3").id = `${idBase}-3`;

    const charInput = clone.querySelector("input[name='character']");
    charInput.id = `radio-char-${card.card_id}`;
    clone.querySelector(".avatar").setAttribute("for", charInput.id);
    clone.querySelector("article").id = idBase;
}

function setContent(clone, card) {
    const article = clone.querySelector("article");
    const avatarImg = clone.querySelector(".avatar img");

    if (card.background_url) {
        article.style.setProperty("--bg-img", `url(${card.background_url})`);
    }

    if (card.avatar_url) {
        avatarImg.src = card.avatar_url;
    }
    avatarImg.alt = card.name || 'Avatar';

    clone.querySelector("h2").textContent = card.name || 'Sans nom';
    clone.querySelector("h3").textContent = card.title || card.subtitle || '';

    const navLabels = clone.querySelectorAll("nav label");
    navLabels.forEach((label, i) => {
        label.setAttribute("for", `card-${card.card_id}-${i + 1}`);
    });

    const navPanels = clone.querySelectorAll("[data-panels] div");
    navPanels[0].textContent = card.description || 'Aucune description disponible.';
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

    if (card.subtitle && card.subtitle !== card.title) {
        const h4 = document.createElement("h4");
        h4.textContent = card.subtitle;
        fragment.appendChild(h4);
    }

    if (card.details && typeof card.details === 'object') {
        const ul = document.createElement("ul");

        Object.entries(card.details).forEach(([key, value]) => {
            if (value) {
                const li = document.createElement("li");
                li.innerHTML = `<strong>${key}:</strong> ${value}`;
                ul.appendChild(li);
            }
        });

        if (ul.children.length > 0) fragment.appendChild(ul);
    }

    if (!fragment.hasChildNodes()) {
        const p = document.createElement("p");
        p.textContent = "Aucune information supplémentaire disponible.";
        fragment.appendChild(p);
    }

    return fragment;
}

function createContactHTML(card) {
    const fragment = document.createDocumentFragment();

    if (card.contact_info && typeof card.contact_info === 'object') {
        const h4 = document.createElement("h4");
        h4.textContent = "Contact";
        fragment.appendChild(h4);

        const ul = document.createElement("ul");

        Object.entries(card.contact_info).forEach(([key, value]) => {
            if (value) {
                const li = document.createElement("li");
                const keyLower = key.toLowerCase();

                if (keyLower.includes('email')) {
                    li.innerHTML = `<strong>${key}:</strong> <a href="mailto:${value}" style="color: #ffd700;">${value}</a>`;
                } else if (keyLower.includes('tel') || keyLower.includes('phone') || keyLower.includes('téléphone')) {
                    li.innerHTML = `<strong>${key}:</strong> <a href="tel:${value}" style="color: #ffd700;">${value}</a>`;
                } else {
                    li.innerHTML = `<strong>${key}:</strong> ${value}`;
                }

                ul.appendChild(li);
            }
        });

        if (ul.children.length > 0) fragment.appendChild(ul);
    }

    if (!fragment.hasChildNodes()) {
        const p = document.createElement("p");
        p.textContent = "Aucune information de contact disponible.";
        fragment.appendChild(p);
    }

    return fragment;
}

async function renderCards() {
    try {
        const cards = await fetchCards();
        cardContainer.innerHTML = '';

        if (!cards || cards.length === 0) {
            cardContainer.innerHTML = `
                <p style="color: white; text-align: center; font-size: 1.2rem;">
                    Aucune carte à afficher. <a href="{{ route('admin.cards.index') }}" style="color: #ffd700;">Ajouter des cartes</a>
                </p>`;
            return;
        }

        if (cards.error) {
            cardContainer.innerHTML = `<div class="error">Erreur: ${cards.error}</div>`;
            return;
        }

        console.log(`Affichage de ${cards.length} cartes`);

        requestAnimationFrame(() => {
            cards.forEach((card, index) => createCardPanel(card, index));
        });

    } catch (error) {
        console.error('Erreur lors du rendu des cartes:', error);
        cardContainer.innerHTML =
            '<div class="error">Erreur lors du chargement des cartes. Veuillez réessayer plus tard.</div>';
    }
}

document.addEventListener('DOMContentLoaded', () => {
    console.log('DOM chargé, initialisation du trombinoscope...');
    renderCards();
});

window.reloadCards = renderCards;
