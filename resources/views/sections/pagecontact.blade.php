<section class="contact" id="contact">
    <div class="container">
        <h2 class="section-title">
            @foreach ($titles as $title)
                {{ $title->title6 }}
            @endforeach
        </h2>

        <div class="contact-container">
            @foreach ($infos as $info)
            <div class="contact-info">
                <div class="info-item">
                    <i class="fas fa-map-marker-alt info-icon"></i>
                    <div>
                        <h3>Adresse</h3>
                        <p>{{ $info->adresse }}<br> {{ $info->codepostal }} {{ $info->ville }}, {{ $info->pays }}</p>
                    </div>
                </div>

                <div class="info-item">
                    <i class="fas fa-phone-alt info-icon"></i>
                    <div>
                        <h3>Téléphone</h3>
                        <p>{{ $info->telephone }}</p>
                    </div>
                </div>

                <div class="info-item">
                    <i class="fas fa-envelope info-icon"></i>
                    <div>
                        <h3>Email</h3>
                        <p>{{ $info->email }}</p>
                    </div>
                </div>

                <div class="info-item">
                    <i class="fas fa-clock info-icon"></i>
                    <div>
                        <h3>Horaires d'ouverture</h3>
                        <ul>
                            <li>Lundi : {{ $info->lundi }}</li>
                            <li>Mardi : {{ $info->mardi }}</li>
                            <li>Mercredi : {{ $info->mercredi }}</li>
                            <li>Jeudi : {{ $info->jeudi }}</li>
                            <li>Vendredi : {{ $info->vendredi }}</li>
                            <li>Samedi : {{ $info->samedi }}</li>
                            <li>Dimanche : {{ $info->dimanche }}</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="contact-form">
                <form id="contact-form">
                    <div class="form-group">
                        <label for="name">Nom complet</label>
                        <input type="text" id="name" name="name" required>
                    </div>

                    <div class="form-group">
                        <label for="company">Entreprise</label>
                        <input type="text" id="company" name="company">
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required>
                    </div>

                    <div class="form-group">
                        <label for="phone">Téléphone</label>
                        <input type="tel" id="phone" name="phone">
                    </div>

                    <div class="form-group">
                        <label for="subject">Sujet</label>
                        <select id="subject" name="subject">
                            @foreach ($contactsujets as $contactsujet)
                            <option value="{{ $contactsujet->sujet }}">{{ $contactsujet->sujet }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea id="message" name="message" required></textarea>
                    </div>

                    <button type="submit">Envoyer</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</section>