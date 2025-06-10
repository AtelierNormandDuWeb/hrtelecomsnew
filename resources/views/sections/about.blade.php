<section class="about" id="about">
    <div class="container">
        <h2 class="section-title">
            @foreach ($titles as $title)
                {{ $title->title1 }}
            @endforeach
        </h2>

        @foreach ($abouts as $about)
            <div class="about-content">
                <div class="about-text">
                    <h3>{{ $about->title2 }}</h3>
                    <p>{{ $about->texte1 }}</p>
                    <p>{{ $about->texte2 }}</p>
                    <a href="{{ url('/pagecontact') }}#contact" class="cta-button">{{ $about->button }}</a>
                </div>

                <div class="about-image">
                    <img src="{{ asset('storage/' . $about->imageUrl) }}" alt="L'équipe HrTélécoms" />
                </div>
            </div>
        @endforeach
        <div class="phone-slider">
            <div class="phone-slide-track">
                {{-- @foreach ($phonesliders as $phoneslider)
		<div class="phone-slide">
			<img src="{{ asset('storage/' . $phoneslider->imageUrl) }}" height="200" width="200" alt="{{ $phoneslider->alt }}" />
		</div>
        @endforeach --}}
                <div class="phone-slide">
                    <img src="{{ asset('images/w79p-removebg-preview.webp') }}" height="200" width="250"
                        alt="" />
                </div>
                <div class="phone-slide">
                    <img src="{{ asset('images/wh64-removebg-preview.webp') }}" height="200" width="250"
                        alt="" />
                </div>
                <div class="phone-slide">
                    <img src="{{ asset('images/t54w-removebg-preview.webp') }}" height="200" width="250"
                        alt="" />
                </div>
                <div class="phone-slide">
                    <img src="{{ asset('images/T54W-EXP50_-removebg-preview.webp') }}" height="200" width="250"
                        alt="" />
                </div>
                <div class="phone-slide">
                    <img src="{{ asset('images/w70b-removebg-preview.webp') }}" height="200" width="250"
                        alt="" />
                </div>
                <div class="phone-slide">
                    <img src="{{ asset('images/w79p-removebg-preview.webp') }}" height="200" width="250"
                        alt="" />
                </div>
                <div class="phone-slide">
                    <img src="{{ asset('images/wh64-removebg-preview.webp') }}" height="200" width="250"
                        alt="" />
                </div>
                <div class="phone-slide">
                    <img src="{{ asset('images/t54w-removebg-preview.webp') }}" height="200" width="250"
                        alt="" />
                </div>
                <div class="phone-slide">
                    <img src="{{ asset('images/T54W-EXP50_-removebg-preview.webp') }}" height="200" width="250"
                        alt="" />
                </div>
                <div class="phone-slide">
                    <img src="{{ asset('images/w70b-removebg-preview.webp') }}" height="200" width="250"
                        alt="" />
                </div>
            </div>
        </div>
    </div>
</section>
