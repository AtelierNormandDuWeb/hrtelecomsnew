<section class="hero">
    <ul class='slider'>
      {{-- @foreach ($herosliders as $heroslider)
        <li class='item-img box1' style="background-image: url('{{ asset('storage/' . $heroslider->imageUrl) }}')">
            <div class='content'>
                <h2 class='title'>{{ $heroslider->title }}</h2>
                <p class='description'>{{ $heroslider->description }}</p>
                <button class="cta-button">{{ $heroslider->button }}</button>
            </div>
        </li>
        @endforeach --}}
        <li class='item-img' style="background-image: url('{{ asset('images/1.jpg') }}')">
        <div class='content'>
          <h2 class='title'>"Votre téléphonie, partout avec vous."</h2>
          <p class='description'>
            Grâce à notre solution 100% cloud, restez connecté à vos clients où que vous soyez, sans matériel complexe ni contrainte.
          </p>
          <button>Découvrir la liberté</button>
        </div>
      </li>
  
      <li class='item-img' style="background-image: url('{{ asset('images/about-1.jpg') }}')">

        <div class='content'>
          <h2 class='title'>"Un standard sans câbles, sans limites."</h2>
          <p class='description'>
            Transformez votre entreprise avec une téléphonie fluide et évolutive, sans installation physique. Facilité et agilité au quotidien.
          </p>
          <button>En savoir plus</button>
        </div>
      </li>
  
      <li class='item-img' style="background-image: url('{{ asset('images/about-2.jpg') }}')">
        <div class='content'>
          <h2 class='title'>"Ne manquez plus aucun appel."</h2>
          <p class='description'>
            Vos clients peuvent toujours vous joindre, que vous soyez au bureau, en télétravail ou en déplacement. Fini les appels perdus !
          </p>
          <button>Voir nos solutions</button>
        </div>
      </li>

        <li class='item-img' style="background-image: url('{{ asset('images/contact-image1.jpg') }}')">
        <div class='content'>
          <h2 class='title'>"Installation rapide, usage immédiat."</h2>
          <p class='description'>
            Notre équipe installe votre standard cloud en un temps record. Vous êtes opérationnel en quelques heures, sans coupure.
          </p>
          <button>Planifier une démo</button>
        </div>
      </li>
  
      <li class='item-img' style="background-image: url('{{ asset('images/contact-image2.jpg') }}')">
        <div class='content'>
          <h2 class='title'>"Économies et performance assurées."</h2>
          <p class='description'>
            Réduisez vos coûts de téléphonie tout en augmentant votre efficacité. Investissez dans l'avenir sans investir dans du matériel.
          </p>
          <button>Calculez vos économies</button>
        </div>
      </li>

        <li class='item-img' style="background-image: url('{{ asset('images/guide5.jpg') }}')">
        <div class='content'>
          <h2 class='title'>"Un accompagnement humain et réactif."</h2>
          <p class='description'>
            Un problème, une question ? Nos experts sont disponibles pour vous accompagner à chaque étape de votre projet.
          </p>
          <button>Nous contacter</button>
        </div>
      </li>
    </ul>

    <nav class='nav'>
        <ion-icon class='btn prev' name="arrow-back-outline"></ion-icon>
        <ion-icon class='btn next' name="arrow-forward-outline"></ion-icon>
    </nav>
</section>
