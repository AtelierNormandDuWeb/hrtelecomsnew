<section class="solutions" id="solutions">
    <div class="container">
        <h2 class="section-title">

            @foreach ($titles as $title)
                {{ $title->title3 }}
            @endforeach
        </h2>
        <div class="solutions-tabs">
                <button class="tab-button active" data-tab="centrex">Centrex</button>
                <button class="tab-button" data-tab="ipbx">IpBX</button>
        </div>
        @foreach ($solutions as $solution)
        <div id="centrex" class="tab-content active">
            <div class="solution-content">
                <div class="solution-text">
                    <h3>{{ $solution->title }}</h3>
                    <p>{{ $solution->description }}</p>

                    <div class="solution-features">
                        <div class="feature-item">
                            <i class="fas fa-check feature-icon"></i>
                            <span>{{ $solution->liste1 }}</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check feature-icon"></i>
                            <span>{{ $solution->liste2 }}</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check feature-icon"></i>
                            <span>{{ $solution->liste3 }}</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check feature-icon"></i>
                            <span>{{ $solution->liste4 }}</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check feature-icon"></i>
                            <span>{{ $solution->liste5 }}</span>
                        </div>
                    </div>

                    <a href="#contact" class="cta-button">{{ $solution->button2 }}</a>
                </div>

                <div class="solution-image">
                    <img src="{{ asset('storage/' . $solution->imageUrl) }}" alt="Solution Centrex" />
                </div>
            </div>
        </div>
        @endforeach

        <div id="ipbx" class="tab-content">
            <div class="solution-content">
                <div class="solution-text">
                    <h3>Solution IPBX</h3>
                    <p>Notre solution IPBX (IP Private Branch Exchange) est un système téléphonique installé dans vos
                        locaux qui vous offre un contrôle total sur votre infrastructure de communication.</p>

                    <div class="solution-features">
                        <div class="feature-item">
                            <i class="fas fa-check feature-icon"></i>
                            <span>Contrôle total de votre infrastructure</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check feature-icon"></i>
                            <span>Sécurité renforcée avec système sur site</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check feature-icon"></i>
                            <span>Personnalisation avancée</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check feature-icon"></i>
                            <span>Intégration avec vos systèmes existants</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check feature-icon"></i>
                            <span>Investissement rentabilisé sur le long terme</span>
                        </div>
                    </div>

                    <a href="#contact" class="cta-button">En savoir plus</a>
                </div>

                <div class="solution-image">
                    <img src="{{ asset('images/ipbximg.png') }}" alt="Solution IPBX" />
                </div>
            </div>
        </div>
    </div>
</section>
