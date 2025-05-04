<section class="realisations-section" id="realisations">
    <div class="container">
        <h2 class="section-title">Réalisations</h2>
        <div class="realisations-container">
            @foreach ($realizations as $realization)
                @php
                    $images = is_array($realization->imageUrls)
                        ? array_filter($realization->imageUrls, function ($img) {
                            return file_exists(public_path('storage/' . $img));
                        })
                        : [];
                    $firstImage = !empty($images) ? $images[0] : 'images/default.jpg';
                @endphp

                <div class="realisation-card">
                    <div class="realisation-gallery" data-realization-id="{{ $realization->id }}" role="group"
                        aria-label="Galerie de {{ $realization->name }}">
                        <img src="{{ asset('storage/' . $firstImage) }}"
                            alt="Image principale de {{ $realization->name }}"
                            class="realisation-main-img realisation-img" id="main-img-{{ $realization->id }}"
                            data-current-image="{{ asset('storage/' . $firstImage) }}"
                            onclick="openLightbox(this.getAttribute('data-current-image'))">

                        @if (count($images) > 1)
                            <div class="realisation-thumbnails">
                                @foreach ($images as $img)
                                    <img src="{{ asset('storage/' . $img) }}" class="thumbnail"
                                        alt="Miniature {{ $loop->iteration }}"
                                        onclick="switchMainImage('{{ asset('storage/' . $img) }}', {{ $realization->id }})">
                                @endforeach
                            </div>
                        @endif
                    </div>

                    <div class="realisation-description">
                        {{ $realization->name }}<br>
                        {{ $realization->description }}
                    </div>

                    <div class="realisation-lieu">
                        Lieu : {{ $realization->additionalInfos ?? 'Lieu inconnu' }}
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script>
        function switchMainImage(imageUrl, realizationId) {
            const mainImg = document.getElementById(`main-img-${realizationId}`);
            if (mainImg) {
                mainImg.style.opacity = 0;
                setTimeout(() => {
                    mainImg.src = imageUrl;
                    mainImg.onload = () => mainImg.style.opacity = 1;
                }, 150);
            }
        }
    </script>
</section>
