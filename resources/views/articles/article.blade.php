@extends('base')

@section('content')

    <section class="article-hero">
        <div class="article-container">
            <div class="article-meta">
                <div class="meta-item">
                    <i class="fas fa-calendar"></i>
                    <span>15 Mars 2024</span>
                </div>
                <div class="meta-item">
                    <i class="fas fa-clock"></i>
                    <span>Lecture : 8 min</span>
                </div>
                <div class="meta-item">
                    <i class="fas fa-map-marker-alt"></i>
                    <span>Paris 15ème</span>
                </div>
                <div class="meta-item">
                    <i class="fas fa-building"></i>
                    <span>Centre Médical</span>
                </div>
            </div>
            <h1>Installation complète d'un système IpBX</h1>
            <p class="hero-subtitle">Déploiement d'une solution de téléphonie moderne pour le Centre Médical Saint-Antoine avec 45 postes, serveur redondant et intégration complète.</p>
        </div>
    </section>

    <!-- Main Content -->
    <main class="main-content">
        <div class="article-container">
            <div class="content-wrapper">
                
                <!-- Project Stats -->
                <div class="project-stats">
                    <div class="stat-item">
                        <div class="stat-number">45</div>
                        <div class="stat-label">Postes installés</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">2</div>
                        <div class="stat-label">Serveurs IpBX</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">3</div>
                        <div class="stat-label">Jours d'installation</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">100%</div>
                        <div class="stat-label">Satisfaction client</div>
                    </div>
                </div>

                <!-- Tags -->
                <div class="tags">
                    <span class="tag">IpBX</span>
                    <span class="tag">Installation</span>
                    <span class="tag green">Médical</span>
                    <span class="tag">Redondance</span>
                    <span class="tag green">45 Postes</span>
                </div>

                <!-- Article Content -->
                <div class="article-content">
                    <div class="article-text">
                        <h2>Contexte du projet</h2>
                        <p>Le Centre Médical Saint-Antoine nous a contactés pour moderniser entièrement leur infrastructure de téléphonie. Leur ancien système analogique ne répondait plus aux besoins d'un établissement médical moderne avec ses 45 praticiens répartis sur 3 étages.</p>

                        <div class="highlight-box">
                            <strong>Défi principal :</strong> Assurer une continuité de service absolue pendant la transition, avec zéro interruption des communications d'urgence.
                        </div>

                        <h3>Analyse des besoins</h3>
                        <p>Après une étude approfondie des flux de communication, nous avons identifié plusieurs points critiques :</p>
                        <ul style="margin-left: 2rem; margin-bottom: 1.5rem;">
                            <li>Nécessité d'une redondance complète pour les urgences</li>
                            <li>Intégration avec le système de gestion patient existant</li>
                            <li>Possibilité de transferts automatiques selon les spécialités</li>
                            <li>Enregistrement légal des communications importantes</li>
                        </ul>

                        <h2>Solution déployée</h2>
                        <p>Nous avons opté pour un système IpBX redondant avec deux serveurs principaux et un système de basculement automatique. L'architecture comprend :</p>

                        <h3>Infrastructure serveur</h3>
                        <p>Deux serveurs Dell PowerEdge configurés en cluster actif/passif, hébergés dans la baie technique sécurisée du centre. Le serveur principal gère l'ensemble des communications tandis que le secondaire assure la reprise en moins de 30 secondes en cas de défaillance.</p>

                        <h3>Réseau et connectivité</h3>
                        <p>Mise en place d'un réseau dédié VLAN pour la VoIP, séparé du réseau informatique principal. Connexion fibre redondante avec deux opérateurs différents pour garantir la continuité de service.</p>
                    </div>
                </div>

                <!-- Photo Gallery -->
                <div class="photo-gallery">
                    <h2 class="gallery-title">Galerie du projet</h2>
                    <div class="gallery-grid">
                        <div class="gallery-item" onclick="openModal('https://images.unsplash.com/photo-1558494949-ef010cbdcc31?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80', 'Serveurs IpBX installés dans la baie technique')">
                            <img src="https://images.unsplash.com/photo-1558494949-ef010cbdcc31?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="Serveurs IpBX">
                            <div class="gallery-overlay">
                                <h4>Serveurs IpBX</h4>
                                <p>Configuration en cluster actif/passif</p>
                            </div>
                        </div>
                        <div class="gallery-item" onclick="openModal('https://images.unsplash.com/photo-1573164713714-d95e436ab8d6?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80', 'Baie de brassage avec switch PoE+')">
                            <img src="https://images.unsplash.com/photo-1573164713714-d95e436ab8d6?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="Baie de brassage">
                            <div class="gallery-overlay">
                                <h4>Baie de brassage</h4>
                                <p>Switch PoE+ pour alimentation téléphones</p>
                            </div>
                        </div>
                        <div class="gallery-item" onclick="openModal('https://images.unsplash.com/photo-1560472354-b33ff0c44a43?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80', 'Poste téléphonique dans un bureau médical')">
                            <img src="https://images.unsplash.com/photo-1560472354-b33ff0c44a43?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="Poste téléphonique">
                            <div class="gallery-overlay">
                                <h4>Poste médecin</h4>
                                <p>Téléphone IP avec touches programmables</p>
                            </div>
                        </div>
                        <div class="gallery-item" onclick="openModal('https://images.unsplash.com/photo-1551808525-051a83e50f65?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80', 'Configuration du système depuis l\'interface web')">
                            <img src="https://images.unsplash.com/photo-1551808525-051a83e50f65?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="Configuration système">
                            <div class="gallery-overlay">
                                <h4>Configuration</h4>
                                <p>Interface web d'administration</p>
                            </div>
                        </div>
                        <div class="gallery-item" onclick="openModal('https://images.unsplash.com/photo-1504384308090-c894fdcc538d?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80', 'Formation du personnel à l\'utilisation du nouveau système')">
                            <img src="https://images.unsplash.com/photo-1504384308090-c894fdcc538d?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="Formation personnel">
                            <div class="gallery-overlay">
                                <h4>Formation</h4>
                                <p>Accompagnement du personnel médical</p>
                            </div>
                        </div>
                        <div class="gallery-item" onclick="openModal('https://images.unsplash.com/photo-1486312338219-ce68e2c6c64e?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80', 'Tests de fonctionnement et validation')">
                            <img src="https://images.unsplash.com/photo-1486312338219-ce68e2c6c64e?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="Tests système">
                            <div class="gallery-overlay">
                                <h4>Tests & Validation</h4>
                                <p>Vérification complète du système</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Before/After Comparison -->
                <div class="comparison-section">
                    <h2 class="comparison-title">Avant / Après : Réorganisation de la baie technique</h2>
                    <div class="comparison-container">
                        <div class="comparison-item before">
                            <div class="comparison-header">
                                <i class="fas fa-times-circle"></i> Avant intervention
                            </div>
                            <div class="comparison-image">
                                <img src="https://images.unsplash.com/photo-1585504198199-20277593b94f?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" alt="Baie technique avant">
                            </div>
                            <div style="padding: 1rem;">
                                <p><strong>Problèmes identifiés :</strong></p>
                                <ul style="margin-left: 1.5rem; margin-top: 0.5rem;">
                                    <li>Câblage désordonné</li>
                                    <li>Équipements obsolètes</li>
                                    <li>Pas de redondance</li>
                                    <li>Maintenance difficile</li>
                                </ul>
                            </div>
                        </div>
                        <div class="comparison-item after">
                            <div class="comparison-header">
                                <i class="fas fa-check-circle"></i> Après intervention
                            </div>
                            <div class="comparison-image">
                                <img src="https://images.unsplash.com/photo-1573164713714-d95e436ab8d6?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" alt="Baie technique après">
                            </div>
                            <div style="padding: 1rem;">
                                <p><strong>Améliorations apportées :</strong></p>
                                <ul style="margin-left: 1.5rem; margin-top: 0.5rem;">
                                    <li>Câblage structuré et étiquetté</li>
                                    <li>Équipements de dernière génération</li>
                                    <li>Redondance complète</li>
                                    <li>Accès facilité pour la maintenance</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div style="text-align: center; margin-top: 2rem;">
                        <p style="font-style: italic; color: #059669;"><strong>Résultat :</strong> Réduction de 80% du temps de maintenance et amélioration de la fiabilité du système.</p>
                    </div>
                </div>

                <!-- More Article Content -->
                <div class="article-content">
                    <div class="article-text">
                        <h2>Résultats et bénéfices</h2>
                        <p>Après 3 mois d'utilisation, les résultats dépassent les attentes initiales. Le centre médical a constaté une amélioration significative de sa communication interne et externe.</p>

                        <h3>Gains opérationnels</h3>
                        <p>La mise en place du système IpBX a permis une réduction de 40% des appels perdus et une amélioration de 60% de la satisfaction patient concernant l'accueil téléphonique. Les transferts automatiques selon les spécialités ont considérablement fluidifié l'orientation des patients.</p>

                        <h3>Économies réalisées</h3>
                        <p>Le passage à la VoIP a généré des économies importantes sur les communications, particulièrement pour les appels inter-sites. Le coût total de possession (TCO) est inférieur de 35% à l'ancien système sur 5 ans.</p>

                        <div class="highlight-box">
                            <strong>Témoignage client :</strong> "L'installation s'est déroulée sans aucune interruption de service. L'équipe technique a été remarquable de professionnalisme et d'efficacité." - Dr. Martin, Directeur médical
                        </div>
                    </div>
                </div>

                <!-- Author Section -->
                <div class="author-section">
                    <div class="author-card">
                        <div class="author-avatar">JD</div>
                        <div class="author-info">
                            <h3>Jean Dupont</h3>
                            <div class="author-role">Ingénieur Télécoms Senior</div>
                            <div class="author-bio">
                                Spécialisé dans les solutions de téléphonie d'entreprise depuis 12 ans, Jean accompagne nos clients dans leurs projets de transformation numérique. Expert certifié en systèmes IpBX et solutions cloud, il a supervisé plus de 200 installations dans le secteur médical et tertiaire.
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>

    <!-- Modal -->
    <div id="imageModal" class="modal">
        <span class="close" onclick="closeModal()">&times;</span>
        <div class="modal-content">
            <img class="modal-image" id="modalImage">
            <div class="modal-info">
                <h3 id="modalTitle"></h3>
                <p id="modalDescription"></p>
            </div>
        </div>
    </div>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            line-height: 1.6;
            color: #2c3e50;
            background: #f8fafc;
        }

        /* Hero Section */
        .article-hero {
            background: linear-gradient(rgba(30, 58, 138, 0.9), rgba(59, 130, 246, 0.9)),
                        url('https://images.unsplash.com/photo-1558494949-ef010cbdcc31?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 80px 0 60px;
            position: relative;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: repeating-linear-gradient(
                45deg,
                transparent,
                transparent 100px,
                rgba(255,255,255,0.03) 101px,
                rgba(255,255,255,0.03) 102px
            );
        }

        .article-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            position: relative;
            z-index: 2;
        }

        .article-meta {
            display: flex;
            align-items: center;
            gap: 2rem;
            margin-bottom: 2rem;
            flex-wrap: wrap;
        }

        .meta-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            opacity: 0.9;
        }

        .hero h1 {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 1rem;
            line-height: 1.2;
        }

        .hero-subtitle {
            font-size: 1.3rem;
            opacity: 0.9;
            max-width: 800px;
        }

        /* Main Content */
        .main-content {
            background: white;
            margin-top: -40px;
            border-radius: 20px 20px 0 0;
            position: relative;
            z-index: 3;
            box-shadow: 0 -10px 40px rgba(0,0,0,0.1);
        }

        .content-wrapper {
            padding: 60px 0;
        }

        /* Article Content */
        .article-content {
            max-width: 800px;
            margin: 0 auto 4rem;
            padding: 0 20px;
        }

        .article-text {
            font-size: 1.1rem;
            line-height: 1.8;
            color: #374151;
        }

        .article-text h2 {
            color: #1e3a8a;
            font-size: 2rem;
            margin: 2rem 0 1rem;
            font-weight: 600;
        }

        .article-text h3 {
            color: #059669;
            font-size: 1.5rem;
            margin: 1.5rem 0 1rem;
            font-weight: 600;
        }

        .article-text p {
            margin-bottom: 1.5rem;
        }

        .highlight-box {
            background: linear-gradient(135deg, #eff6ff, #dbeafe);
            border-left: 4px solid #1e3a8a;
            padding: 1.5rem;
            margin: 2rem 0;
            border-radius: 8px;
        }

        /* Photo Gallery */
        .photo-gallery {
            margin: 4rem 0;
        }

        .gallery-title {
            text-align: center;
            font-size: 2.5rem;
            color: #1e3a8a;
            margin-bottom: 3rem;
            font-weight: 600;
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 3rem;
        }

        .gallery-item {
            position: relative;
            border-radius: 15px;
            overflow: hidden;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }

        .gallery-item:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 15px 35px rgba(0,0,0,0.2);
        }

        .gallery-item img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .gallery-item:hover img {
            transform: scale(1.1);
        }

        .gallery-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(transparent, rgba(0,0,0,0.8));
            color: white;
            padding: 1rem;
            transform: translateY(100%);
            transition: transform 0.3s ease;
        }

        .gallery-item:hover .gallery-overlay {
            transform: translateY(0);
        }

        /* Before/After Comparison */
        .comparison-section {
            margin: 4rem 0;
            background: linear-gradient(135deg, #f0fdf4, #dcfce7);
            padding: 3rem;
            border-radius: 20px;
        }

        .comparison-title {
            text-align: center;
            font-size: 2.5rem;
            color: #059669;
            margin-bottom: 3rem;
            font-weight: 600;
        }

        .comparison-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .comparison-item {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }

        .comparison-item:hover {
            transform: scale(1.02);
        }

        .comparison-header {
            padding: 1rem;
            text-align: center;
            font-weight: 600;
            font-size: 1.2rem;
        }

        .before .comparison-header {
            background: #fee2e2;
            color: #dc2626;
        }

        .after .comparison-header {
            background: #dcfce7;
            color: #16a34a;
        }

        .comparison-image {
            height: 250px;
            position: relative;
            overflow: hidden;
        }

        .comparison-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .comparison-item:hover .comparison-image img {
            transform: scale(1.05);
        }

        /* Modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.9);
            backdrop-filter: blur(5px);
        }

        .modal-content {
            position: relative;
            margin: 5% auto;
            max-width: 90%;
            max-height: 80%;
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 25px 50px rgba(0,0,0,0.3);
            animation: modalFadeIn 0.3s ease;
        }

        @keyframes modalFadeIn {
            from { opacity: 0; transform: scale(0.8); }
            to { opacity: 1; transform: scale(1); }
        }

        .modal-image {
            width: 100%;
            height: auto;
            display: block;
        }

        .modal-info {
            padding: 1.5rem;
            background: white;
        }

        .close {
            position: absolute;
            top: 15px;
            right: 20px;
            color: white;
            font-size: 2rem;
            font-weight: bold;
            cursor: pointer;
            z-index: 1001;
            background: rgba(0,0,0,0.5);
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background 0.3s ease;
        }

        .close:hover {
            background: rgba(0,0,0,0.8);
        }

        /* Author Info */
        .author-section {
            background: linear-gradient(135deg, #eff6ff, #dbeafe);
            padding: 3rem;
            border-radius: 20px;
            margin: 4rem 0;
        }

        .author-card {
            display: flex;
            align-items: center;
            gap: 2rem;
            background: white;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        .author-avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: linear-gradient(135deg, #1e3a8a, #3b82f6);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 2rem;
            font-weight: bold;
        }

        .author-info h3 {
            color: #1e3a8a;
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
        }

        .author-role {
            color: #059669;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .author-bio {
            color: #6b7280;
            line-height: 1.6;
        }

        /* Tags */
        .tags {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
            margin: 2rem 0;
        }

        .tag {
            background: #1e3a8a;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 500;
        }

        .tag.green {
            background: #059669;
        }

        /* Stats */
        .project-stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 1.5rem;
            margin: 3rem 0;
        }

        .stat-item {
            background: white;
            padding: 1.5rem;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }

        .stat-item:hover {
            transform: translateY(-5px);
        }

        .stat-number {
            font-size: 2rem;
            font-weight: 700;
            color: #1e3a8a;
            margin-bottom: 0.5rem;
        }

        .stat-label {
            color: #6b7280;
            font-weight: 500;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2rem;
            }

            .hero-subtitle {
                font-size: 1.1rem;
            }

            .article-meta {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }

            .author-card {
                flex-direction: column;
                text-align: center;
            }

            .gallery-grid {
                grid-template-columns: 1fr;
            }

            .comparison-container {
                grid-template-columns: 1fr;
            }

            .modal-content {
                margin: 10% auto;
                max-width: 95%;
            }
        }
    </style>
    <script>
        // Gallery Modal Functions
        function openModal(imageSrc, description) {
            const modal = document.getElementById('imageModal');
            const modalImg = document.getElementById('modalImage');
            const modalTitle = document.getElementById('modalTitle');
            const modalDesc = document.getElementById('modalDescription');
            
            modal.style.display = 'block';
            modalImg.src = imageSrc;
            modalTitle.textContent = description.split(' - ')[0] || description;
            modalDesc.textContent = description;
            
            // Prevent body scroll
            document.body.style.overflow = 'hidden';
        }

        function closeModal() {
            const modal = document.getElementById('imageModal');
            modal.style.display = 'none';
            document.body.style.overflow = 'auto';
        }

        // Close modal when clicking outside
        window.onclick = function(event) {
            const modal = document.getElementById('imageModal');
            if (event.target === modal) {
                closeModal();
            }
        }

        // Keyboard navigation
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                closeModal();
            }
        });

        // Smooth scroll for internal links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Add loading animation for images
        document.querySelectorAll('img').forEach(img => {
            img.addEventListener('load', function() {
                this.style.opacity = '1';
            });
            
            img.style.opacity = '0';
            img.style.transition = 'opacity 0.3s ease';
        });

        // Intersection Observer for animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.animationPlayState = 'running';
                    entry.target.classList.add('visible');
                }
            });
        }, observerOptions);

        // Observe elements for animation
        document.querySelectorAll('.gallery-item, .stat-item, .comparison-item').forEach(el => {
            observer.observe(el);
        });

        // Add click analytics (optional)
        document.querySelectorAll('.gallery-item').forEach((item, index) => {
            item.addEventListener('click', () => {
                console.log(`Gallery image ${index + 1} viewed`);
            });
        });
    </script>
@endsection