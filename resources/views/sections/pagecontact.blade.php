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
                    <div class="info-content">
                        <h3>Adresse</h3>
                        <p>{{ $info->adresse }}<br> {{ $info->codepostal }} {{ $info->ville }}, {{ $info->pays }}</p>
                    </div>
                </div>
                <div class="info-item">
                    <i class="fas fa-phone-alt info-icon"></i>
                    <div class="info-content">
                        <h3>Téléphone</h3>
                        <p>{{ $info->telephone }}</p>
                    </div>
                </div>
                <div class="info-item">
                    <i class="fas fa-envelope info-icon"></i>
                    <div class="info-content">
                        <h3>Email</h3>
                        <p>{{ $info->email }}</p>
                    </div>
                </div>
                <div class="info-item">
                    <i class="fas fa-clock info-icon"></i>
                    <div class="info-content">
                        <h3>Horaires d'ouverture</h3>
                        <ul class="schedule-list">
                            <li><span class="day">Lundi :</span> {{ $info->lundi }}</li>
                            <li><span class="day">Mardi :</span> {{ $info->mardi }}</li>
                            <li><span class="day">Mercredi :</span> {{ $info->mercredi }}</li>
                            <li><span class="day">Jeudi :</span> {{ $info->jeudi }}</li>
                            <li><span class="day">Vendredi :</span> {{ $info->vendredi }}</li>
                            <li><span class="day">Samedi :</span> {{ $info->samedi }}</li>
                            <li><span class="day">Dimanche :</span> {{ $info->dimanche }}</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="contact-form">
                <div class="form-header">
                    <h3>Envoyez-nous un message</h3>
                    <p>Nous vous répondrons dans les plus brefs délais</p>
                </div>
                
                <form id="contact-form" class="modern-form">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="name">Nom complet <span class="required">*</span></label>
                            <input type="text" id="name" name="name" placeholder="Votre nom complet" required>
                        </div>
                        <div class="form-group">
                            <label for="company">Entreprise</label>
                            <input type="text" id="company" name="company" placeholder="Nom de votre entreprise">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="email">Email <span class="required">*</span></label>
                            <input type="email" id="email" name="email" placeholder="votre@email.com" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Téléphone</label>
                            <input type="tel" id="phone" name="phone" placeholder="Votre numéro de téléphone">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="subject">Sujet <span class="required">*</span></label>
                        <select id="subject" name="subject" required>
                            <option value="">Sélectionnez un sujet</option>
                            @foreach ($contactsujets as $contactsujet)
                            <option value="{{ $contactsujet->sujet }}">{{ $contactsujet->sujet }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="message">Message <span class="required">*</span></label>
                        <textarea id="message" name="message" placeholder="Décrivez votre demande en détail..." required></textarea>
                    </div>
                    
                    <button type="submit" class="submit-btn">
                        <span class="btn-content">
                            <i class="fas fa-paper-plane"></i>
                            Envoyer le message
                        </span>
                    </button>
                </form>
            </div>
            @endforeach
        </div>
    </div>
</section>