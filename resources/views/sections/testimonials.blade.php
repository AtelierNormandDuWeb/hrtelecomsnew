<section class="testimonials">
    <div class="container">
        <h2 class="section-title">
            @foreach ($titles as $title)
                {{ $title->title4 }}
            @endforeach
        </h2>

        <div class="testimonials-container">
            @foreach ($testimonials as $testimonial)
            <div class="testimonial-slide active">
                <img src="{{ asset('/images/svg/google.svg') }}" alt="Profil 1">
                <div class="stars">★★★★★</div>
                <p class="testimonial-text">{{ $testimonial->compagny }}</p>
                <p class="testimonial-author">{{ $testimonial->name }}</p>
                <p class="testimonial-position">{{ $testimonial->text }}</p>
            </div>
            @endforeach

            <div class="testimonial-controls">
                <button class="testimonial-button" id="prev-testimonial">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button class="testimonial-button" id="next-testimonial">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>

            <div class="testimonial-dots">
                <div class="dot active" data-slide="0"></div>
                <div class="dot" data-slide="1"></div>
                <div class="dot" data-slide="2"></div>
            </div>
        </div>
    </div>
</section>
