<section class="contact" id="contact">
    <div class="container">
        <h2 class="section-title">Contactez-nous</h2>

        <div class="contact-container">
            <div class="contact-info">
                <div class="info-item">
                    <i class="fas fa-map-marker-alt info-icon"></i>
                    <div>
                        <h3>Adresse</h3>
                        <p>16 rue de la cavée, Impasse Banville<br> 14320 Laize-Clinchamps, France</p>
                    </div>
                </div>

                <div class="info-item">
                    <i class="fas fa-phone-alt info-icon"></i>
                    <div>
                        <h3>Téléphone</h3>
                        <p>+33 2 31 43 50 11</p>
                    </div>
                </div>

                <div class="info-item">
                    <i class="fas fa-envelope info-icon"></i>
                    <div>
                        <h3>Email</h3>
                        <p>contact@HrTélécoms.fr</p>
                    </div>
                </div>

                <div class="info-item">
                    <i class="fas fa-clock info-icon"></i>
                    <div>
                        <h3>Horaires d'ouverture</h3>
                        <p>Lundi - Vendredi : 9h00 - 18h00<br>
                            Mardi - Vendredi : 9h00 - 18h00<br>
                            Mercredi - Vendredi : 9h00 - 18h00<br>
                            Jeudi - Vendredi : 9h00 - 18h00<br>
                            Vendredi - Vendredi : 9h00 - 18h00<br>
                            Samedi : Fermé<br>
                            Dimanche : Fermé</p>
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
                            <option value="devis">Demande de devis</option>
                            <option value="demo">Demande de démonstration</option>
                            <option value="information">Demande d'information</option>
                            <option value="support">Support technique</option>
                            <option value="autre">Autre</option>
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
    </div>
</section>
