<section class="contact" id="contact">
    <div class="contact-margin"></div>
    <div class="container">
        <h2 class="section-title">
            @foreach ($titles as $title)
                {{ $title->title6 }}
            @endforeach
        </h2>

        <div class="contact-container">
            @foreach ($infos as $info)
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
