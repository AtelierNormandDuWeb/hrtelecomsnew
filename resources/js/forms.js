export function initForms() {
    const contactForm = document.querySelector('#contact-form');
    const requestTypeSelect = document.querySelector('#request_type');
    const rdvSection = document.querySelector('#rdv-section');
    const commercialSelect = document.querySelector('#commercial');
    const dateInput = document.querySelector('#rdv_date');
    const timeSelect = document.querySelector('#rdv_time');

    /* Gestion de l'affichage conditionnel de la section RDV */
    if (requestTypeSelect && rdvSection) {
        requestTypeSelect.addEventListener('change', function () {
            if (this.value === 'rendez_vous') {
                rdvSection.style.display = 'block';
                rdvSection.classList.add('rdv-visible');
                loadCommerciaux();
                makeRdvFieldsRequired(true);
            } else {
                rdvSection.style.display = 'none';
                rdvSection.classList.remove('rdv-visible');
                makeRdvFieldsRequired(false);
            }
        });
    }

    /* Charger les créneaux disponibles quand commercial et date changent */
    if (commercialSelect && dateInput && timeSelect) {
        commercialSelect.addEventListener('change', loadAvailableSlots);
        dateInput.addEventListener('change', loadAvailableSlots);
    }

    function makeRdvFieldsRequired(required) {
        const fields = ['#commercial', '#rdv_date', '#rdv_time'];
        fields.forEach(field => {
            const element = document.querySelector(field);
            if (element) {
                if (required) {
                    element.setAttribute('required', 'required');
                } else {
                    element.removeAttribute('required');
                }
            }
        });
    }

    function loadCommerciaux() {
        if (!commercialSelect) return;

        const commerciaux = [
            { id: 1, nom: 'David GROUGI', specialites: 'Télécoms, Internet' },
            { id: 2, nom: 'J. RONDEAU', specialites: 'Sécurité, Réseau' },
            { id: 3, nom: 'M. HORST', specialites: 'Infrastructure, Support' },
            { id: 4, nom: 'M. GIRARD', specialites: 'Expert téléphonie, Commercial' },
        ];

        commercialSelect.innerHTML = '<option value="">Sélectionnez un commercial</option>';

        commerciaux.forEach(commercial => {
            const option = document.createElement('option');
            option.value = commercial.id;
            option.textContent = `${commercial.nom} - ${commercial.specialites}`;
            commercialSelect.appendChild(option);
        });
    }

    async function loadAvailableSlots() {
        const commercial = commercialSelect.value;
        const date = dateInput.value;

        if (!commercial || !date) {
            resetTimeSelect();
            return;
        }

        try {
            timeSelect.innerHTML = '<option value="">Chargement...</option>';
            timeSelect.disabled = true;

            const response = await fetch(`/api/available-slots?commercial=${commercial}&date=${date}`);
            const data = await response.json();

            timeSelect.innerHTML = '<option value="">Choisissez une heure</option>';

            if (data.status === 'SUCCESS' && data.available_slots.length > 0) {
                data.available_slots.forEach(slot => {
                    const option = document.createElement('option');
                    option.value = slot;
                    option.textContent = slot;
                    timeSelect.appendChild(option);
                });
            } else {
                const option = document.createElement('option');
                option.value = '';
                option.textContent = 'Aucun créneau disponible';
                option.disabled = true;
                timeSelect.appendChild(option);
            }

        } catch (error) {
            console.error('Erreur lors du chargement des créneaux:', error);
            timeSelect.innerHTML = '<option value="">Erreur de chargement</option>';
        } finally {
            timeSelect.disabled = false;
        }
    }

    function resetTimeSelect() {
        if (timeSelect) {
            timeSelect.innerHTML = '<option value="">Choisissez d\'abord un commercial et une date</option>';
        }
    }

    /* Validation du formulaire de contact */
    if (contactForm) {
        contactForm.addEventListener('submit', function (e) {
            // On garde votre logique existante pour le moment
            // Plus tard on modifiera pour gérer les RDV

            e.preventDefault();

            // Simuler l'envoi du formulaire
            const submitButton = this.querySelector('button[type="submit"]');
            if (submitButton) {
                const originalText = submitButton.textContent;

                submitButton.disabled = true;
                submitButton.textContent = 'Envoi en cours...';

                setTimeout(() => {
                    alert('Votre message a été envoyé avec succès ! Nous vous contacterons dans les plus brefs délais.');
                    contactForm.reset();
                    submitButton.disabled = false;
                    submitButton.textContent = originalText;
                }, 1500);
            }
        });
    }
}