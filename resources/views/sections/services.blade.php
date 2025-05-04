<section class="services" id="services">
    <div class="container">
        <h2 class="section-title">
            @foreach ($titles as $title)
            {{ $title->title2 }}
            @endforeach
        </h2>
        
        <div class="services-grid">
            @foreach ($services as $service)
            <div class="service-card">
                <div class="service-icon">
                        
                        <i class="fas {{ $service->incontext }}"></i>
                </div>
                <h3>{{ $service->title }}</h3>
                <p>{{ $service->text }}</p>

            </div>

            {{-- <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-mobile-alt"></i>
                </div>
                <h3>Application mobile</h3>
                <p>Restez connecté à votre système téléphonique professionnel où que vous soyez grâce à notre
                    application mobile intuitive.</p>
            </div>

            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-headset"></i>
                </div>
                <h3>Centre d'appels</h3>
                <p>Gérez efficacement vos appels entrants et sortants avec nos solutions de centre d'appels avancées.
                </p>
            </div>

            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-cogs"></i>
                </div>
                <h3>Installation & Maintenance</h3>
                <p>Bénéficiez d'une installation professionnelle et d'un service de maintenance réactif pour assurer la
                    continuité de vos communications.</p>
            </div>

            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-cloud"></i>
                </div>
                <h3>Services cloud</h3>
                <p>Profitez de la flexibilité et de la sécurité du cloud pour vos communications professionnelles.</p>
            </div> --}}
            @endforeach
        </div>
    </div>
</section>
