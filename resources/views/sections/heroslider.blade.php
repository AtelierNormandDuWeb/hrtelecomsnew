<section class="hero">
    <ul class='slider'>
      @foreach ($herosliders as $heroslider)
        <li class='item-img box1' style="background-image: url('{{ asset('storage/' . $heroslider->imageUrl) }}')">
            <div class='content'>
                <h2 class='title'>{{ $heroslider->title }}</h2>
                <p class='description'>{{ $heroslider->description }}</p>
                <button class="cta-button">{{ $heroslider->button }}</button>
            </div>
        </li>
        @endforeach
    </ul>

    <nav class='nav'>
        <ion-icon class='btn prev' name="arrow-back-outline"></ion-icon>
        <ion-icon class='btn next' name="arrow-forward-outline"></ion-icon>
    </nav>
</section>
