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
                            <p>{{ $info->adresse }}<br> {{ $info->codepostal }} {{ $info->ville }}, {{ $info->pays }}
                            </p>
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
                        <p>N'hésitez pas à nous contacter, nous nous ferons un plaisir de revenir vers vous le plus
                            rapidement possible.</p>
                        <p class="required-note">( <span class="required">*</span> ) champs obligatoire</p>
                    </div>

                    <!-- Messages de succès et d'erreurs -->
                    @if (session('success'))
                        <div class="alert alert-success">
                            <i class="fas fa-check-circle"></i>
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-error">
                            <i class="fas fa-exclamation-triangle"></i>
                            {{ session('error') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-error">
                            <i class="fas fa-exclamation-triangle"></i>
                            <ul class="error-list">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('pagecontact.send') }}" method="POST" class="modern-form">
                        @csrf
                        <div class="form-row">
                            <div class="form-group">
                                <label for="name">Nom - Prénom <span class="required">*</span></label>
                                <input type="text" id="name" name="name" placeholder="Nom - Prénom *"
                                    value="{{ old('name') }}" class="@error('name') input-error @enderror" required>
                            </div>
                            <div class="form-group">
                                <label for="company">Entreprise</label>
                                <input type="text" id="company" name="company"
                                    placeholder="Nom de votre entreprise" value="{{ old('company') }}"
                                    class="@error('company') input-error @enderror">
                            </div>
                            <div class="form-group">
                                <label for="email">Email <span class="required">*</span></label>
                                <input type="email" id="email" name="email" placeholder="Email *"
                                    value="{{ old('email') }}" class="@error('email') input-error @enderror" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">Téléphone <span class="required">*</span></label>
                                <input type="tel" id="phone" name="phone" placeholder="Téléphone *"
                                    value="{{ old('phone') }}" class="@error('phone') input-error @enderror" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="subject">Sujet du contact <span class="required">*</span></label>
                                <select id="subject" name="subject" class="@error('subject') input-error @enderror"
                                    required>
                                    <option value="">Sélectionnez un sujet</option>
                                    @foreach ($contactsujets as $contactsujet)
                                        <option value="{{ $contactsujet->sujet }}"
                                            {{ old('subject') == $contactsujet->sujet ? 'selected' : '' }}>
                                            {{ $contactsujet->sujet }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- NOUVEAU : Type de demande -->
                        <div class="form-row">
                            <div class="form-group">
                                <label for="request_type">Type de demande <span class="required">*</span></label>
                                <select id="request_type" name="request_type"
                                    class="@error('request_type') input-error @enderror" required>
                                    <option value="">Choisissez le type de demande</option>
                                    <option value="information"
                                        {{ old('request_type') == 'information' ? 'selected' : '' }}>
                                        Demande d'information
                                    </option>
                                    <option value="rendez_vous"
                                        {{ old('request_type') == 'rendez_vous' ? 'selected' : '' }}>
                                        Prise de rendez-vous
                                    </option>
                                </select>
                            </div>
                        </div>

                        <!-- NOUVEAU : Section prise de rendez-vous (cachée par défaut) -->
                        <div id="rdv-section" class="rdv-section" style="display: none;">
                            <div class="rdv-header">
                                <h4><i class="fas fa-calendar-alt"></i> Planifier votre rendez-vous</h4>
                                <p>Choisissez le commercial et le créneau qui vous conviennent.</p>
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <label for="commercial">Commercial souhaité <span
                                            class="required">*</span></label>
                                    <select id="commercial" name="commercial"
                                        class="@error('commercial') input-error @enderror">
                                        <option value="">Sélectionnez un commercial</option>
                                        <!-- Options seront ajoutées via JavaScript -->
                                    </select>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <label for="rdv_date">Date souhaitée <span class="required">*</span></label>
                                    <input type="date" id="rdv_date" name="rdv_date"
                                        class="@error('rdv_date') input-error @enderror" min="{{ date('Y-m-d') }}">
                                </div>
                                <div class="form-group">
                                    <label for="rdv_time">Heure souhaitée <span class="required">*</span></label>
                                    <select id="rdv_time" name="rdv_time"
                                        class="@error('rdv_time') input-error @enderror">
                                        <option value="">Choisissez une heure</option>
                                        <option value="09:00">09:00</option>
                                        <option value="10:00">10:00</option>
                                        <option value="11:00">11:00</option>
                                        <option value="14:00">14:00</option>
                                        <option value="15:00">15:00</option>
                                        <option value="16:00">16:00</option>
                                        <option value="17:00">17:00</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="message">Message <span class="required">*</span></label>
                            <textarea id="message" name="message" placeholder="Détaillez votre demande, pour une meilleure estimation *"
                                rows="8" class="@error('message') input-error @enderror" required>{{ old('message') }}</textarea>
                        </div>

                        {{-- Décommente si tu veux remettre le recaptcha
                    <div class="form-group">
                        {!! NoCaptcha::renderJs() !!}
                        {!! NoCaptcha::display() !!}
                        @error('g-recaptcha-response')
                        <p class="captcha-error">{{ $message }}</p>
                        @enderror
                    </div>
                    --}}

                        <button type="submit" class="submit-btn">
                            <span class="btn-content">
                                <i class="fas fa-paper-plane"></i>
                                Envoyer
                            </span>
                        </button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
</section>
