<section class="about" id="about">
    <div class="container">
        @foreach ($abouts as $about)
            <h2 class="section-title">
                {{ $about->title1 }}
            </h2>

            <div class="about-content">
                <div class="about-text">
                    <h3>{{ $about->title2 }}</h3>
                    <p>{{ $about->texte1 }}</p>
                    <p>{{ $about->texte2 }}</p>
                    <a href="#contact" class="cta-button">{{ $about->button }}</a>
                </div>

                <div class="about-image">
                    <img src="{{ asset('storage/' . $about->imageUrl) }}" alt="L'équipe HrTélécoms" />
                </div>
            </div>
        @endforeach
    </div>
</section>
