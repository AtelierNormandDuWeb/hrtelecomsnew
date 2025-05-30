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
            @endforeach
        </div>
    </div>
</section>
